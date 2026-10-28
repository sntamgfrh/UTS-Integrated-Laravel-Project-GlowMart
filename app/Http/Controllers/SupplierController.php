<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Menampilkan daftar supplier dan fitur pencarian
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        $suppliers = Supplier::query()
            ->when($cari, function ($query) use ($cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('kode_supplier', 'like', '%' . $cari . '%')
                      ->orWhere('nama_supplier', 'like', '%' . $cari . '%')
                      ->orWhere('telepon', 'like', '%' . $cari . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('supplier.index', compact('suppliers', 'cari'));
    }

    // Menampilkan form tambah supplier
    public function create()
    {
        return view('supplier.create');
    }

    // Menyimpan supplier baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_supplier' => [
                'required',
                'string',
                'max:255',
                'unique:suppliers,kode_supplier',
            ],
            'nama_supplier' => 'required|string|max:255',
            'nama_kontak' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email|max:255',
        ], [
            'kode_supplier.required' => 'Kode supplier wajib diisi.',
            'kode_supplier.unique' => 'Kode supplier sudah digunakan.',
            'nama_supplier.required' => 'Nama supplier wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        Supplier::create($data);

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Supplier berhasil ditambahkan!');
    }

    // Menampilkan form edit supplier
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    // Memperbarui data supplier
    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'kode_supplier' => [
                'required',
                'string',
                'max:255',
                'unique:suppliers,kode_supplier,' . $supplier->id,
            ],
            'nama_supplier' => 'required|string|max:255',
            'nama_kontak' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email|max:255',
        ], [
            'kode_supplier.required' => 'Kode supplier wajib diisi.',
            'kode_supplier.unique' => 'Kode supplier sudah digunakan.',
            'nama_supplier.required' => 'Nama supplier wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        $supplier->update($data);

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Supplier berhasil diperbarui!');
    }

    // Menghapus supplier
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()
            ->route('supplier.index')
            ->with('success', 'Supplier berhasil dihapus!');
    }
}
