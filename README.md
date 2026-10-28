# GlowMart — Sistem Manajemen Toko Skincare

## 1. Deskripsi Project
GlowMart adalah aplikasi web berbasis Laravel untuk membantu pengelolaan toko skincare, mulai dari data kategori, produk, supplier, pembelian stok, hingga transaksi penjualan.

## 2. Fitur Aplikasi
- Login dan logout
- Dashboard
- Manajemen kategori
- Manajemen produk
- Manajemen supplier
- Transaksi pembelian
- Transaksi penjualan
- Pengelolaan pesanan dan keranjang
- Database MySQL/MariaDB

*Catatan: sesuaikan daftar fitur dengan fitur yang sudah aktif dan berhasil diuji.*

## 3. Teknologi
- Laravel
- PHP
- MySQL/MariaDB
- Blade
- Composer

## 4. Persyaratan
Pastikan sudah tersedia:
- PHP
- Composer
- MySQL/MariaDB melalui XAMPP
- Web browser

## 5. Instalasi Project

Masuk ke folder project:

```bash
cd C:\xampp\htdocs\GlowMart
```

Instal dependensi:

```bash
composer install
```

Siapkan file environment jika belum tersedia:

```bash
copy .env.example .env
php artisan key:generate
```

## 6. Konfigurasi Database

Buat database bernama `glowmart_db` melalui phpMyAdmin. Atur file `.env` sesuai konfigurasi lokal:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=glowmart_db
DB_USERNAME=root
DB_PASSWORD=
```

Jangan mengunggah file `.env` ke GitHub.

## 7. Migration dan Seeder

Untuk membuat tabel dan menjalankan seeder yang tersedia:

```bash
php artisan migrate --seed
```

**Peringatan:** jangan menjalankan `php artisan migrate:fresh` pada database yang berisi data penting karena tabel akan dihapus dan dibuat ulang.

## 8. Menjalankan Aplikasi

Jalankan perintah:

```bash
php artisan serve
```

Buka alamat berikut di browser:

`http://127.0.0.1:8000`

Pastikan MySQL/MariaDB berjalan sebelum membuka aplikasi.

## 9. Database dan ERD

Database utama: `glowmart_db`.

ERD menjelaskan entitas utama, primary key (PK), foreign key (FK), dan relasi antartabel GlowMart. Sertakan diagram ERD bersama berkas pengumpulan UTS.

## 10. Akun Demo

 akun demo yang sudah dibuat dan diuji.

- Admin: `[admin@glowmart.test]``[AdminGlowMart123!]`
- Staff: `[staf@glowmart.test]``[StafGlowMart123!]`
- Pembeli: `[pembeli@glowmart.tes]``[PembeliGlowMart123!]`

Jangan mencantumkan password pribadi atau rahasia.

## 11. . Demo Aplikasi


Demonstrasi aplikasi GlowMart dilakukan dengan menunjukkan fitur-fitur utama berikut:

Login dan autentikasi — menunjukkan proses login menggunakan akun demo.

Dashboard — menunjukkan ringkasan data produk, stok, dan kategori.

Manajemen kategori — menunjukkan proses menambah dan melihat kategori.

Manajemen produk — menunjukkan proses tambah, edit, hapus, dan pencarian produk.

Manajemen supplier — menunjukkan pengelolaan data pemasok.

Transaksi pembelian — menunjukkan proses pembelian barang dan perubahan stok.

Transaksi penjualan — menunjukkan proses penjualan dan perubahan stok.

Database — menunjukkan tabel dan relasi data yang digunakan aplikasi.

## 12. Informasi Pengembang

- Nama mahasiswa: `sinta magfirah`
- Nim: `250180043`
- Mata kuliah: Web Programming 2
- Nama project: GlowMart
