<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class RiwayatPesananController extends Controller
{
    public function index(Request $request)
    {
        $pesanans = Pesanan::where('user_id', auth()->id())
            ->when($request->filled('cari'), function ($query) use ($request) {
                $query->where('kode_pesanan', 'like', '%' . $request->cari . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pembeli.riwayat-pesanan', compact('pesanans'));
    }

    public function show(Pesanan $pesanan)
    {
        abort_unless(
            (int) $pesanan->user_id === (int) auth()->id(),
            403
        );

        $pesanan->load('detailPesanan.produk');

        return view('pembeli.detail-pesanan', compact('pesanan'));
    }
}
