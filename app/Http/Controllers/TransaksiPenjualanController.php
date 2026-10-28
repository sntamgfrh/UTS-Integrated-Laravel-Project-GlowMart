<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Produk;
use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class TransaksiPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        $transaksis = TransaksiPenjualan::query()
            ->when($cari, function ($query, $cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('kode_transaksi', 'like', "%{$cari}%")
                        ->orWhere('nama_pelanggan', 'like', "%{$cari}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('transaksi_penjualan.index', compact('transaksis', 'cari'));
    }

    public function create()
    {
        $produks = Produk::orderBy('nama_produk')->get();

        return view('transaksi_penjualan.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tanggal_transaksi' => ['required', 'date'],
            'nama_pelanggan' => ['nullable', 'string', 'max:255'],
            'jumlah_bayar' => ['required', 'numeric', 'min:0'],
            'metode_pembayaran' => [
                'required',
                'in:Tunai,Transfer,E-Wallet,QRIS',
            ],
            'catatan' => ['nullable', 'string'],
            'produk_id' => ['required', 'array', 'min:1'],
            'produk_id.*' => [
                'required',
                'integer',
                'distinct',
                'exists:produks,id',
            ],
            'jumlah' => ['required', 'array'],
            'jumlah.*' => ['required', 'integer', 'min:1'],
        ]);

        if (count($data['produk_id']) !== count($data['jumlah'])) {
            throw ValidationException::withMessages([
                'jumlah' => 'Data produk dan jumlah tidak sesuai.',
            ]);
        }

        $transaksi = DB::transaction(function () use ($data) {
            $produks = Produk::whereIn('id', $data['produk_id'])
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            $total = 0;
            $detail = [];

            foreach ($data['produk_id'] as $index => $produkId) {
                $produk = $produks->get($produkId);
                $jumlah = (int) $data['jumlah'][$index];

                if (!$produk) {
                    throw ValidationException::withMessages([
                        'produk_id' => 'Produk tidak ditemukan.',
                    ]);
                }

                if ($jumlah > (int) $produk->stok) {
                    throw ValidationException::withMessages([
                        'jumlah' => "Stok {$produk->nama_produk} tidak mencukupi.",
                    ]);
                }

                $harga = (float) $produk->harga;
                $subtotal = round($harga * $jumlah, 2);
                $total += $subtotal;

                $detail[] = [
                    'produk' => $produk,
                    'jumlah' => $jumlah,
                    'harga' => $harga,
                    'subtotal' => $subtotal,
                ];
            }

            // Ambil nilai pembayaran persis seperti yang dikirim formulir.
            // Input harus berisi angka saja, contoh: 50000.
            $bayar = (float) $data['jumlah_bayar'];

            if ($bayar < $total) {
                throw ValidationException::withMessages([
                    'jumlah_bayar' =>
                        'Jumlah pembayaran kurang dari total transaksi.',
                ]);
            }

            $transaksi = TransaksiPenjualan::create([
                'kode_transaksi' => 'TRX-' . now()->format('YmdHis')
                    . '-' . strtoupper(bin2hex(random_bytes(2))),
                'tanggal_transaksi' => $data['tanggal_transaksi'],
                'nama_pelanggan' => $data['nama_pelanggan'] ?? null,
                'total_harga' => $total,
                'jumlah_bayar' => $bayar,
                'kembalian' => round($bayar - $total, 2),
                'metode_pembayaran' => $data['metode_pembayaran'],
                'status' => 'Selesai',
                'catatan' => $data['catatan'] ?? null,
            ]);

            foreach ($detail as $item) {
                $transaksi->detailTransaksi()->create([
                    'produk_id' => $item['produk']->id,
                    'jumlah' => $item['jumlah'],
                    'harga_satuan' => $item['harga'],
                    'subtotal' => $item['subtotal'],
                ]);

                $item['produk']->decrement('stok', $item['jumlah']);

                BarangKeluar::create([
                    'produk_id' => $item['produk']->id,
                    'transaksi_penjualan_id' => $transaksi->id,
                    'user_id' => auth()->id(),
                    'kode_barang_keluar' => 'BK-'
                        . now()->format('YmdHis')
                        . '-'
                        . Str::upper(Str::random(4)),
                    'tanggal_keluar' => $data['tanggal_transaksi'],
                    'jumlah' => $item['jumlah'],
                    'alasan' => 'Penjualan',
                    'catatan' => 'Otomatis dari transaksi '
                        . $transaksi->kode_transaksi,
                ]);
            }

            return $transaksi;
        });

        return redirect()
            ->route('transaksi-penjualan.index')
            ->with('success', 'Transaksi penjualan berhasil disimpan!');
    }

    public function show(TransaksiPenjualan $transaksiPenjualan)
    {
        $transaksiPenjualan->load('detailTransaksi.produk');

        return view('transaksi_penjualan.show', compact('transaksiPenjualan'));
    }
}
