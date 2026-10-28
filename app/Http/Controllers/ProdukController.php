<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    // Menampilkan daftar produk dan pesanan yang sedang diproses
    public function index(Request $request)
    {
        // Mengambil data produk
        $query = Produk::with('kategori');

        // Fitur pencarian produk
        if ($request->filled('cari')) {
            $cari = $request->cari;

            $query->where(function ($q) use ($cari) {
                $q->where('kode_produk', 'like', "%{$cari}%")
                  ->orWhere('nama_produk', 'like', "%{$cari}%")
                  ->orWhere('merek', 'like', "%{$cari}%");
            });
        }

        $produks = $query->latest()
            ->paginate(10)
            ->withQueryString();

        // Mengambil data kategori
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        // Mengambil pesanan yang sedang diproses
        $pesananDalamProses = DB::table('pesanans')
            ->where('status', 'Diproses')
            ->orderByDesc('id')
            ->get();

        return view('produk.index', compact(
            'produks',
            'kategoris',
            'pesananDalamProses'
        ));
    }

    // Menampilkan formulir tambah produk
    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('produk.create', compact('kategoris'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'kode_produk' => 'required|string|max:30|unique:produks,kode_produk',
            'nama_produk' => 'required|string|max:150',
            'merek' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        Produk::create($data);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan formulir edit produk
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('produk.edit', compact('produk', 'kategoris'));
    }

    // Menyimpan perubahan produk
    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'kode_produk' => 'required|string|max:30|unique:produks,kode_produk,' . $produk->id,
            'nama_produk' => 'required|string|max:150',
            'merek' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $produk->update($data);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk
    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();

            return redirect()
                ->route('produk.index')
                ->with('success', 'Produk berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()
                ->route('produk.index')
                ->with('error', 'Produk tidak bisa dihapus karena masih digunakan oleh data lain.');
        }
    }
}
