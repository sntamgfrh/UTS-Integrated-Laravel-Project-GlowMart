<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjangs = Keranjang::with('produk')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('pembeli.keranjang', compact('keranjangs'));
    }

    public function store(Request $request, Produk $produk)
    {
        $request->validate([
            'jumlah' => ['required', 'integer', 'min:1'],
        ]);

        if ($produk->stok < $request->jumlah) {
            return back()->withErrors([
                'jumlah' => 'Jumlah melebihi stok yang tersedia.',
            ]);
        }

        $keranjang = Keranjang::where('user_id', auth()->id())
            ->where('produk_id', $produk->id)
            ->first();

        $jumlahBaru = ($keranjang?->jumlah ?? 0)
            + (int) $request->jumlah;

        if ($jumlahBaru > $produk->stok) {
            return back()->withErrors([
                'jumlah' => 'Total jumlah produk melebihi stok.',
            ]);
        }

        Keranjang::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'produk_id' => $produk->id,
            ],
            [
                'jumlah' => $jumlahBaru,
            ]
        );

        return redirect()
            ->route('pembeli.keranjang')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function destroy(Keranjang $keranjang)
    {
        abort_unless(
            (int) $keranjang->user_id === (int) auth()->id(),
            403
        );

        $keranjang->delete();

        return redirect()
            ->route('pembeli.keranjang')
            ->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
