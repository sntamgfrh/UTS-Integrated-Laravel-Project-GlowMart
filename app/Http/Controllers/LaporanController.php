<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Pembelian;
use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Laporan khusus Admin.
     */
    public function index(Request $request)
    {
        return $this->tampilkanLaporan($request, 'laporan.index');
    }

    /**
     * Laporan khusus Staff.
     */
    public function staff(Request $request)
    {
        return $this->tampilkanLaporan($request, 'staff.laporan');
    }

    /**
     * Mengambil data laporan berdasarkan periode tanggal.
     */
    private function tampilkanLaporan(Request $request, string $view)
    {
        $request->validate([
            'tanggal_mulai' => ['nullable', 'date'],
            'tanggal_akhir' => [
                'nullable',
                'date',
                'after_or_equal:tanggal_mulai',
            ],
        ]);

        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalAkhir = $request->input('tanggal_akhir');

        // Laporan barang masuk
        $pembelianQuery = Pembelian::with(['supplier', 'user'])
            ->orderByDesc('tanggal_pembelian');

        if ($tanggalMulai) {
            $pembelianQuery->whereDate(
                'tanggal_pembelian',
                '>=',
                $tanggalMulai
            );
        }

        if ($tanggalAkhir) {
            $pembelianQuery->whereDate(
                'tanggal_pembelian',
                '<=',
                $tanggalAkhir
            );
        }

        $pembelians = $pembelianQuery->get();

        // Laporan barang keluar
        $barangKeluarQuery = BarangKeluar::with(['produk', 'user'])
            ->orderByDesc('tanggal_keluar');

        if ($tanggalMulai) {
            $barangKeluarQuery->whereDate(
                'tanggal_keluar',
                '>=',
                $tanggalMulai
            );
        }

        if ($tanggalAkhir) {
            $barangKeluarQuery->whereDate(
                'tanggal_keluar',
                '<=',
                $tanggalAkhir
            );
        }

        $barangKeluars = $barangKeluarQuery->get();

        // Laporan transaksi penjualan
        $penjualanQuery = TransaksiPenjualan::query()
            ->orderByDesc('tanggal_transaksi');

        if ($tanggalMulai) {
            $penjualanQuery->whereDate(
                'tanggal_transaksi',
                '>=',
                $tanggalMulai
            );
        }

        if ($tanggalAkhir) {
            $penjualanQuery->whereDate(
                'tanggal_transaksi',
                '<=',
                $tanggalAkhir
            );
        }

        $penjualans = $penjualanQuery->get();

        // Ringkasan laporan
        $totalPembelian = $pembelians->sum(
            fn ($item) => (float) $item->total_harga
        );

        $totalPenjualan = $penjualans->sum(
            fn ($item) => (float) $item->total_harga
        );

        $totalJumlahBarangKeluar = $barangKeluars->sum(
            fn ($item) => (int) $item->jumlah
        );

        return view($view, compact(
            'pembelians',
            'barangKeluars',
            'penjualans',
            'tanggalMulai',
            'tanggalAkhir',
            'totalPembelian',
            'totalPenjualan',
            'totalJumlahBarangKeluar'
        ));
    }
}
