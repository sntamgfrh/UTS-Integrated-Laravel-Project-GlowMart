<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\TransaksiPenjualan;
use App\Models\Pembelian;
use App\Models\BarangKeluar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StaffDashboardController extends Controller
{
    public function index()
    {
        // INVENTARIS: menggunakan sumber data yang sama dengan Admin
        $totalProduk = Produk::count();
        $totalStok = (int) Produk::sum('stok');
        $stokRendah = Produk::where('stok', '<=', 5)->count();

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
            $totalTransaksi = DB::table('transaksi_penjualans')->count();

            if (Schema::hasColumn('transaksi_penjualans', 'total_harga')) {
                $totalPenjualan = DB::table('transaksi_penjualans')
                    ->sum('total_harga');
            }

            $query = DB::table('transaksi_penjualans');

            if (Schema::hasColumn('transaksi_penjualans', 'created_at')) {
                $query->orderByDesc('created_at');
            } elseif (Schema::hasColumn('transaksi_penjualans', 'id')) {
                $query->orderByDesc('id');
            }

            $transaksiTerbaru = $query->limit(5)->get();
        }

        // PEMBELIAN
        $totalPembelian = 0;
        $nilaiPembelian = 0;
        $pembelianTerbaru = collect();

        if (Schema::hasTable('pembelians')) {
            $totalPembelian = DB::table('pembelians')->count();

            if (Schema::hasColumn('pembelians', 'total_harga')) {
                $nilaiPembelian = DB::table('pembelians')->sum('total_harga');
            } elseif (Schema::hasColumn('pembelians', 'total')) {
                $nilaiPembelian = DB::table('pembelians')->sum('total');
            }

            $query = DB::table('pembelians');

            if (Schema::hasColumn('pembelians', 'created_at')) {
                $query->orderByDesc('created_at');
            } elseif (Schema::hasColumn('pembelians', 'id')) {
                $query->orderByDesc('id');
            }

            $pembelianTerbaru = $query->limit(5)->get();
        }

        // BARANG KELUAR
        $totalBarangKeluar = Schema::hasTable('barang_keluars')
            ? DB::table('barang_keluars')->count()
            : 0;

        $barangKeluarTerbaru = collect();

        if (Schema::hasTable('barang_keluars')) {
            $query = DB::table('barang_keluars');

            if (Schema::hasColumn('barang_keluars', 'created_at')) {
                $query->orderByDesc('created_at');
            } elseif (Schema::hasColumn('barang_keluars', 'id')) {
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
            $totalPesanan = DB::table('pesanans')->count();

            if (Schema::hasColumn('pesanans', 'status')) {
                $pesananDiproses = DB::table('pesanans')
                    ->where('status', 'Diproses')
                    ->count();

                $query = DB::table('pesanans')
                    ->where('status', 'Diproses');

                if (Schema::hasColumn('pesanans', 'created_at')) {
                    $query->orderByDesc('created_at');
                } elseif (Schema::hasColumn('pesanans', 'id')) {
                    $query->orderByDesc('id');
                }

                $pesananDalamProses = $query->limit(5)->get();
            }

            $query = DB::table('pesanans');

            if (Schema::hasColumn('pesanans', 'created_at')) {
                $query->orderByDesc('created_at');
            } elseif (Schema::hasColumn('pesanans', 'id')) {
                $query->orderByDesc('id');
            }

            $pesananTerbaru = $query->limit(5)->get();
        }

        return view('staff.dashboard', compact(
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
