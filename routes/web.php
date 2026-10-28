<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RiwayatPesananController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiPenjualanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesananDiprosesController;

// Halaman utama
Route::get('/', function () {
    return redirect()->route('login');
});

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login.process');

// Semua halaman memerlukan login
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Dashboard dan Laporan Staff
    Route::middleware('role:staff')->group(function () {

        Route::get('/staff/dashboard', [StaffDashboardController::class, 'index'])
            ->name('staff.dashboard');

        Route::get('/staff/laporan', [LaporanController::class, 'staff'])
            ->name('staff.laporan');
    });

    // Dashboard dan pengelolaan Admin
    Route::middleware('role:admin')->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Laporan Admin
        Route::get('/laporan', [LaporanController::class, 'index'])
            ->name('laporan.index');

        // Manajemen User
        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::post('/users', [UserController::class, 'store'])
            ->name('users.store');

        Route::put('/users/{user}', [UserController::class, 'update'])
            ->name('users.update');

        Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');

        // Kategori
        Route::get('/kategori', [KategoriController::class, 'index'])
            ->name('kategori.index');

        Route::get('/kategori/tambah', [KategoriController::class, 'create'])
            ->name('kategori.create');

        Route::post('/kategori', [KategoriController::class, 'store'])
            ->name('kategori.store');

        Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])
            ->name('kategori.edit');

        Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])
            ->name('kategori.update');

        Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])
            ->name('kategori.destroy');

        // Supplier
        Route::get('/supplier', [SupplierController::class, 'index'])
            ->name('supplier.index');

        Route::get('/supplier/tambah', [SupplierController::class, 'create'])
            ->name('supplier.create');

        Route::post('/supplier', [SupplierController::class, 'store'])
            ->name('supplier.store');

        Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit'])
            ->name('supplier.edit');

        Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])
            ->name('supplier.update');

        Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])
            ->name('supplier.destroy');

        // Pengelolaan Produk Admin
        Route::get('/produk/tambah', [ProdukController::class, 'create'])
            ->name('produk.create');

        Route::post('/produk', [ProdukController::class, 'store'])
            ->name('produk.store');

        Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])
            ->name('produk.edit');

        Route::put('/produk/{produk}', [ProdukController::class, 'update'])
            ->name('produk.update');

        Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])
            ->name('produk.destroy');

        // Pesanan Diproses
        Route::get('/pesanan-diproses', [PesananDiprosesController::class, 'index'])
            ->name('pesanan-diproses.index');

        Route::get('/pesanan-diproses/tambah', [PesananDiprosesController::class, 'create'])
            ->name('pesanan-diproses.create');

        Route::post('/pesanan-diproses', [PesananDiprosesController::class, 'store'])
            ->name('pesanan-diproses.store');

        Route::get('/pesanan-diproses/detail/{sumber}/{id}', [PesananDiprosesController::class, 'detail'])
            ->where([
                'sumber' => 'asli|manual',
                'id' => '[0-9]+',
            ])
            ->name('pesanan-diproses.detail');

        Route::patch('/pesanan-diproses/{id}/status', [PesananDiprosesController::class, 'updateStatusAsli'])
            ->whereNumber('id')
            ->name('pesanan-diproses.status-asli');

        Route::get('/pesanan-diproses/{pesananDiproses}/edit', [PesananDiprosesController::class, 'edit'])
            ->whereNumber('pesananDiproses')
            ->name('pesanan-diproses.edit');

        Route::put('/pesanan-diproses/{pesananDiproses}', [PesananDiprosesController::class, 'update'])
            ->whereNumber('pesananDiproses')
            ->name('pesanan-diproses.update');

        Route::delete('/pesanan-diproses/{pesananDiproses}', [PesananDiprosesController::class, 'destroy'])
            ->whereNumber('pesananDiproses')
            ->name('pesanan-diproses.destroy');
    });

    // Fitur Admin dan Staff
    Route::middleware('role:admin,staff')->group(function () {

        // Daftar Produk
        Route::get('/produk', [ProdukController::class, 'index'])
            ->name('produk.index');

        // Pesanan
        Route::get('/pesanan', [PesananController::class, 'index'])
            ->name('pesanan.index');

        Route::get('/pesanan/{pesanan}', [PesananController::class, 'show'])
            ->whereNumber('pesanan')
            ->name('pesanan.show');

        Route::patch('/pesanan/{pesanan}/status', [PesananController::class, 'updateStatus'])
            ->whereNumber('pesanan')
            ->name('pesanan.update-status');

        // Transaksi Penjualan
        Route::get('/transaksi-penjualan', [TransaksiPenjualanController::class, 'index'])
            ->name('transaksi-penjualan.index');

        Route::get('/transaksi-penjualan/tambah', [TransaksiPenjualanController::class, 'create'])
            ->name('transaksi-penjualan.create');

        Route::post('/transaksi-penjualan', [TransaksiPenjualanController::class, 'store'])
            ->name('transaksi-penjualan.store');

        Route::get('/transaksi-penjualan/{transaksiPenjualan}', [TransaksiPenjualanController::class, 'show'])
            ->name('transaksi-penjualan.show');

        // Pembelian / Barang Masuk
        Route::get('/pembelian', [PembelianController::class, 'index'])
            ->name('pembelian.index');

        Route::get('/pembelian/create', [PembelianController::class, 'create'])
            ->name('pembelian.create');

        Route::post('/pembelian', [PembelianController::class, 'store'])
            ->name('pembelian.store');

        Route::get('/pembelian/{pembelian}', [PembelianController::class, 'show'])
            ->name('pembelian.show');

        // Barang Keluar
        Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])
            ->name('barang-keluar.index');

        Route::get('/barang-keluar/tambah', [BarangKeluarController::class, 'create'])
            ->name('barang-keluar.create');

        Route::post('/barang-keluar', [BarangKeluarController::class, 'store'])
            ->name('barang-keluar.store');
    });

    // Halaman Pembeli
    Route::middleware('role:pembeli')->group(function () {

        // Dashboard Pembeli
        Route::get('/pembeli', [PembeliController::class, 'index'])
            ->name('pembeli.index');

        // Keranjang
        Route::get('/pembeli/keranjang', [KeranjangController::class, 'index'])
            ->name('pembeli.keranjang');

        Route::post('/pembeli/keranjang/{produk}', [KeranjangController::class, 'store'])
            ->name('pembeli.keranjang.store');

        Route::delete('/pembeli/keranjang/{keranjang}', [KeranjangController::class, 'destroy'])
            ->name('pembeli.keranjang.destroy');

        // Checkout
        Route::get('/pembeli/checkout', [CheckoutController::class, 'index'])
            ->name('pembeli.checkout');

        Route::post('/pembeli/checkout', [CheckoutController::class, 'store'])
            ->name('pembeli.checkout.store');

        // Riwayat Pesanan
        Route::get('/pembeli/riwayat-pesanan', [RiwayatPesananController::class, 'index'])
            ->name('pembeli.riwayat-pesanan');

        Route::get('/pembeli/riwayat-pesanan/{pesanan}', [RiwayatPesananController::class, 'show'])
            ->name('pembeli.detail-pesanan');
    });
});
 