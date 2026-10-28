<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    public function index()
    {
        $keranjangs = Keranjang::with('produk')
            ->where('user_id', auth()->id())
            ->get();

        if ($keranjangs->isEmpty()) {
            return redirect()->route('pembeli.keranjang')
                ->with('error', 'Keranjang masih kosong.');
        }

        return view('pembeli.checkout', compact('keranjangs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_penerima' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:2000'],
            'no_telepon' => ['required', 'string', 'max:20'],
            'metode_pembayaran' => [
                'required',
                'in:Transfer,E-Wallet,QRIS,COD',
            ],
            'catatan' => ['nullable', 'string', 'max:1000'],
        ]);

        DB::transaction(function () use ($data) {
            $keranjangs = Keranjang::where('user_id', auth()->id())
                ->lockForUpdate()
                ->get();

            if ($keranjangs->isEmpty()) {
                throw ValidationException::withMessages([
                    'keranjang' => 'Keranjang masih kosong.',
                ]);
            }

            $total = 0;
            $items = [];

            foreach ($keranjangs as $item) {
                $produk = Produk::whereKey($item->produk_id)
                    ->lockForUpdate()
                    ->first();

                if (!$produk) {
                    throw ValidationException::withMessages([
                        'keranjang' => 'Ada produk yang sudah tidak tersedia.',
                    ]);
                }

                if ($item->jumlah < 1 || $item->jumlah > $produk->stok) {
                    throw ValidationException::withMessages([
                        'keranjang' => 'Stok produk ' .
                            $produk->nama_produk .
                            ' tidak mencukupi.',
                    ]);
                }

                $harga = (float) $produk->harga;
                $subtotal = $harga * $item->jumlah;
                $total += $subtotal;

                $items[] = [
                    'produk' => $produk,
                    'jumlah' => $item->jumlah,
                    'harga' => $harga,
                    'subtotal' => $subtotal,
                ];
            }

            $pesanan = Pesanan::create([
                'kode_pesanan' => 'GM-' . strtoupper(Str::random(10)),
                'user_id' => auth()->id(),
                'nama_penerima' => $data['nama_penerima'],
                'alamat' => $data['alamat'],
                'no_telepon' => $data['no_telepon'],
                'metode_pembayaran' => $data['metode_pembayaran'],
                'total_harga' => $total,
                'status' => 'Menunggu Pembayaran',
                'catatan' => $data['catatan'] ?? null,
            ]);

            foreach ($items as $item) {
                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $item['produk']->id,
                    'jumlah' => $item['jumlah'],
                    'harga_satuan' => $item['harga'],
                    'subtotal' => $item['subtotal'],
                ]);

                $item['produk']->decrement('stok', $item['jumlah']);
            }

            Keranjang::where('user_id', auth()->id())->delete();
        });

        return redirect()->route('pembeli.index')
            ->with('success', 'Pesanan berhasil dibuat.');
    }
}
