<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::with(['produk', 'user'])
            ->latest()
            ->paginate(10);

        return view('barang-keluar.index', compact('barangKeluars'));
    }

    public function create()
    {
        $produks = Produk::orderBy('nama_produk')->get();

        return view('barang-keluar.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_id' => ['required', 'integer', 'exists:produks,id'],
            'tanggal_keluar' => ['required', 'date'],
            'jumlah' => ['required', 'integer', 'min:1'],
            'alasan' => [
                'required',
                Rule::in([
                    'Rusak',
                    'Kedaluwarsa',
                    'Hilang',
                    'Pemakaian Internal',
                    'Lainnya',
                ]),
            ],
            'catatan' => ['nullable', 'string', 'max:1000'],
        ]);

        DB::transaction(function () use ($validated) {
            $produk = Produk::whereKey($validated['produk_id'])
                ->lockForUpdate()
                ->firstOrFail();

            $jumlah = (int) $validated['jumlah'];

            if ($produk->stok < $jumlah) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'jumlah' => 'Stok tidak mencukupi. Stok tersedia: '
                        . $produk->stok . ' unit.',
                ]);
            }

            BarangKeluar::create([
                'produk_id' => $produk->id,
                'user_id' => auth()->id(),
                'kode_barang_keluar' => 'BK-'
                    . now()->format('YmdHis')
                    . '-' . Str::upper(Str::random(4)),
                'tanggal_keluar' => $validated['tanggal_keluar'],
                'jumlah' => $jumlah,
                'alasan' => $validated['alasan'],
                'catatan' => $validated['catatan'] ?? null,
            ]);

            $produk->decrement('stok', $jumlah);
        });

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Barang Keluar berhasil dicatat dan stok telah diperbarui.');
    }
}
