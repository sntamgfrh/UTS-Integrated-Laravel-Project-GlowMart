<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Supplier;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PembelianController extends Controller
{
    /**
     * Menampilkan daftar transaksi Barang Masuk.
     */
    public function index()
    {
        $pembelians = Pembelian::with('supplier', 'user')
            ->latest()
            ->paginate(10);

        return view('pembelian.index', compact('pembelians'));
    }

    /**
     * Menampilkan formulir Barang Masuk.
     */
    public function create()
    {
        $suppliers = Supplier::orderBy('nama_supplier')->get();
        $produks = Produk::orderBy('nama_produk')->get();

        return view('pembelian.create', compact('suppliers', 'produks'));
    }

    /**
     * Menyimpan transaksi dan menambahkan stok produk.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => [
                'required',
                'exists:suppliers,id',
            ],
            'tanggal_pembelian' => [
                'required',
                'date',
            ],
            'catatan' => [
                'nullable',
                'string',
                'max:1000',
            ],
            'produk_id' => [
                'required',
                'array',
                'min:1',
            ],
            'produk_id.*' => [
                'required',
                'integer',
                'distinct',
                'exists:produks,id',
            ],
            'jumlah' => [
                'required',
                'array',
                'min:1',
            ],
            'jumlah.*' => [
                'required',
                'integer',
                'min:1',
            ],
            'harga_beli' => [
                'required',
                'array',
                'min:1',
            ],
            'harga_beli.*' => [
                'required',
                'numeric',
                'gt:0',
            ],
        ]);

        $jumlahProduk = count($validated['produk_id']);

        if (
            count($validated['jumlah']) !== $jumlahProduk ||
            count($validated['harga_beli']) !== $jumlahProduk
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'produk_id' => 'Data produk, jumlah, dan harga harus lengkap.',
                ]);
        }

        DB::transaction(function () use ($validated) {
            $pembelian = Pembelian::create([
                'supplier_id' => $validated['supplier_id'],
                'user_id' => auth()->id(),
                'kode_pembelian' => 'PB-' .
                    now()->format('YmdHis') . '-' .
                    Str::upper(Str::random(4)),
                'tanggal_pembelian' => $validated['tanggal_pembelian'],
                'total_harga' => 0,
                'status' => 'selesai',
                'catatan' => $validated['catatan'] ?? null,
            ]);

            $total = 0;

            foreach ($validated['produk_id'] as $index => $produkId) {
                $produk = Produk::whereKey($produkId)
                    ->lockForUpdate()
                    ->firstOrFail();

                $jumlah = (int) $validated['jumlah'][$index];
                $hargaBeli = (float) $validated['harga_beli'][$index];
                $subtotal = round($jumlah * $hargaBeli, 2);

                $pembelian->detailPembelians()->create([
                    'produk_id' => $produk->id,
                    'jumlah' => $jumlah,
                    'harga_beli' => $hargaBeli,
                    'subtotal' => $subtotal,
                ]);

                // Tambahkan stok dalam transaksi database.
                $produk->increment('stok', $jumlah);

                $total += $subtotal;
            }

            // Simpan total berdasarkan perhitungan server.
            $pembelian->update([
                'total_harga' => $total,
            ]);
        });

        return redirect()
            ->route('pembelian.index')
            ->with(
                'success',
                'Barang Masuk berhasil disimpan dan stok produk telah ditambahkan.'
            );
    }

    /**
     * Menampilkan detail transaksi Barang Masuk.
     */
    public function show(Pembelian $pembelian)
    {
        $pembelian->load(
            'supplier',
            'user',
            'detailPembelians.produk'
        );

        return view('pembelian.show', compact('pembelian'));
    }
}
