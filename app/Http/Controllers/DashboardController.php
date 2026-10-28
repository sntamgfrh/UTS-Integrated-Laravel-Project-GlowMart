<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        // INVENTARIS
        $totalProduk = Produk::count();
        $totalStok = (int) Produk::sum('stok');

        $stokRendah = Produk::where('stok', '<=', 5)->count();

        // Daftar produk yang stoknya menipis
        $produkStokMenipis = Produk::with('kategori')
            ->where('stok', '<=', 5)
            ->orderBy('stok')
            ->limit(10)
            ->get();

        $totalKategori = Schema::hasTable('kategoris')
            ? DB::table('kategoris')->count()
            : 0;

        $totalSupplier = Schema::hasTable('suppliers')
            ? DB::table('suppliers')->count()
            : 0;

        $produkTerbaru = Produk::with('kategori')
            ->latest()
            ->limit(5)
            ->get();

        // PENJUALAN
        $totalTransaksi = 0;
        $totalPenjualan = 0;
        $transaksiTerbaru = collect();

        if (Schema::hasTable('transaksi_penjualans')) {
            $tabel = 'transaksi_penjualans';

            $totalTransaksi = DB::table($tabel)->count();

            if (Schema::hasColumn($tabel, 'total_harga')) {
                $totalPenjualan = DB::table($tabel)
                    ->sum('total_harga');
            }

            $query = DB::table($tabel);

            if (Schema::hasColumn($tabel, 'created_at')) {
                $query->orderByDesc('created_at');
            } elseif (Schema::hasColumn($tabel, 'id')) {
                $query->orderByDesc('id');
            }

            $transaksiTerbaru = $query->limit(5)->get();
        }

        // PEMBELIAN
        $totalPembelian = 0;
        $nilaiPembelian = 0;
        $pembelianTerbaru = collect();

        if (Schema::hasTable('pembelians')) {
            $tabel = 'pembelians';

            $totalPembelian = DB::table($tabel)->count();

            if (Schema::hasColumn($tabel, 'total_harga')) {
                $nilaiPembelian = DB::table($tabel)
                    ->sum('total_harga');
            } elseif (Schema::hasColumn($tabel, 'total')) {
                $nilaiPembelian = DB::table($tabel)
                    ->sum('total');
            }

            $query = DB::table($tabel);

            if (Schema::hasColumn($tabel, 'created_at')) {
                $query->orderByDesc('created_at');
            } elseif (Schema::hasColumn($tabel, 'id')) {
                $query->orderByDesc('id');
            }

            $pembelianTerbaru = $query->limit(5)->get();
        }

        // BARANG KELUAR
        $totalBarangKeluar = 0;
        $barangKeluarTerbaru = collect();

        if (Schema::hasTable('barang_keluars')) {
            $tabel = 'barang_keluars';

            $totalBarangKeluar = DB::table($tabel)->count();

            $query = DB::table($tabel);

            if (Schema::hasColumn($tabel, 'created_at')) {
                $query->orderByDesc('created_at');
            } elseif (Schema::hasColumn($tabel, 'id')) {
                $query->orderByDesc('id');
            }

            $barangKeluarTerbaru = $query->limit(5)->get();
        }

        // PESANAN
        $totalPesanan = 0;
        $pesananDiproses = 0;
        $pesananDalamProses = collect();
        $pesananTerbaru = collect();

        if (Schema::hasTable('pesanans')) {
            $tabel = 'pesanans';

            $totalPesanan = DB::table($tabel)->count();

            if (Schema::hasColumn($tabel, 'status')) {
                $pesananDiproses = DB::table($tabel)
                    ->where('status', 'Diproses')
                    ->count();

                $queryProses = DB::table($tabel)
                    ->where('status', 'Diproses');

                if (Schema::hasColumn($tabel, 'created_at')) {
                    $queryProses->orderByDesc('created_at');
                } elseif (Schema::hasColumn($tabel, 'id')) {
                    $queryProses->orderByDesc('id');
                }

                $pesananDalamProses = $queryProses
                    ->limit(5)
                    ->get();
            }

            $queryTerbaru = DB::table($tabel);

            if (Schema::hasColumn($tabel, 'created_at')) {
                $queryTerbaru->orderByDesc('created_at');
            } elseif (Schema::hasColumn($tabel, 'id')) {
                $queryTerbaru->orderByDesc('id');
            }

            $pesananTerbaru = $queryTerbaru->limit(5)->get();
        }

        return view('dashboard', compact(
            'totalProduk',
            'totalStok',
            'stokRendah',
            'produkStokMenipis',
            'totalKategori',
            'totalSupplier',
            'produkTerbaru',
            'totalTransaksi',
            'totalPenjualan',
            'transaksiTerbaru',
            'totalPembelian',
            'nilaiPembelian',
            'pembelianTerbaru',
            'totalBarangKeluar',
            'barangKeluarTerbaru',
            'totalPesanan',
            'pesananDiproses',
            'pesananDalamProses',
            'pesananTerbaru'
        ));
    }
}
