<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesanan::with('user')->latest();

        if ($request->filled('cari')) {
            $cari = $request->cari;

            $query->where(function ($q) use ($cari) {
                $q->where('kode_pesanan', 'like', "%{$cari}%")
                    ->orWhere('nama_penerima', 'like', "%{$cari}%");
            });
        }

        $pesanans = $query->paginate(10)->withQueryString();

        return view('pesanan.index', compact('pesanans'));
    }

    public function show(Pesanan $pesanan)
    {
        $pesanan->load([
            'user',
            'detailPesanan.produk',
        ]);

        return view('pesanan.detail', compact('pesanan'));
    }

    public function updateStatus(Request $request, Pesanan $pesanan)
    {
        $data = $request->validate([
            'status' => [
                'required',
                'in:Menunggu Pembayaran,Menunggu,Diproses,Dikirim,Selesai,Dibatalkan',
            ],
        ]);

        $pesanan->update([
            'status' => $data['status'],
        ]);

        return redirect()
            ->route('pesanan.show', $pesanan->id)
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
