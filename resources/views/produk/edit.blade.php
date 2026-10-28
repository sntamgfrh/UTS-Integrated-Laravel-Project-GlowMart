<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Inventory Sales</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #F4F5ED;
            color: #435641;
            min-height: 100vh;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 16px;
            overflow-y: auto;
            background: linear-gradient(180deg, #F5F5E9, #E8EDD9, #CBD5B2);
            border-right: 1px solid #E0E7D4;
            z-index: 100;
        }

        .brand {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            color: #435641;
            margin: 5px 0 35px;
        }

        .brand span {
            display: block;
            font-size: 12px;
            font-weight: normal;
            margin-top: 7px;
            color: #61745B;
        }

        .menu-title {
            margin: 22px 12px 10px;
            font-size: 11px;
            font-weight: bold;
            color: #61745B;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .menu {
            display: flex;
            flex-direction: column;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            margin-bottom: 7px;
            border-radius: 10px;
            text-decoration: none;
            color: #435641;
            font-size: 14px;
            font-weight: normal;
            transition: .25s;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }

        .menu-link:hover {
            background: #FFFFFF;
            transform: translateX(3px);
        }

        .menu-link.active {
            background: linear-gradient(135deg, #82966A, #61745B, #435641);
            color: #FFFFFF;
            box-shadow: 0 5px 12px #61745B30;
            font-weight: bold;
        }

        .logout-form {
            margin: 0;
            padding: 0;
        }

        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            margin-bottom: 7px;
            border: none;
            border-radius: 10px;
            background: transparent;
            color: #435641;
            font-size: 14px;
            text-align: left;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #FFFFFF;
        }

        .main {
            margin-left: 230px;
            width: calc(100% - 230px);
            min-height: 100vh;
            padding: 30px;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .eyebrow {
            color: #82966A;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 9px;
        }

        .page-header h1 {
            font-size: 28px;
            color: #435641;
            margin-bottom: 9px;
        }

        .page-header p {
            color: #78856F;
            font-size: 13px;
            line-height: 1.7;
        }

        .banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 23px;
            margin-bottom: 22px;
            border: 1px solid #D5E0CD;
            border-radius: 16px;
            background: linear-gradient(120deg, #E4EBDD, #FAFBF6);
        }

        .banner h2 {
            font-size: 19px;
            margin-bottom: 8px;
        }

        .banner p {
            color: #78856F;
            font-size: 12px;
            line-height: 1.8;
        }

        .banner-icon {
            width: 56px;
            height: 56px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            background: #526B49;
            color: white;
            font-size: 25px;
        }

        .container {
            max-width: 850px;
            padding: 28px;
            background: #FFFFFF;
            border: 1px solid #E0E7D4;
            border-radius: 16px;
            box-shadow: 0 5px 18px rgba(67, 86, 65, .05);
        }

        .form-heading {
            padding-bottom: 18px;
            margin-bottom: 20px;
            border-bottom: 1px solid #E8EDE1;
        }

        .form-heading h2 {
            font-size: 18px;
            margin-bottom: 7px;
        }

        .form-heading p {
            font-size: 12px;
            color: #899481;
            line-height: 1.7;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0 20px;
        }

        .form-group {
            margin-bottom: 17px;
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #52644B;
            font-size: 12px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #D5DEC9;
            border-radius: 9px;
            background: #FFFFFF;
            color: #435641;
            font-size: 13px;
            outline: none;
            transition: .2s;
        }

        input, select {
            min-height: 43px;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #82966A;
            box-shadow: 0 0 0 3px rgba(130, 150, 106, .13);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
            line-height: 1.6;
        }

        .error-box {
            padding: 14px 16px;
            margin-bottom: 20px;
            border: 1px solid #E8C6BE;
            border-radius: 10px;
            background: #FBEEEA;
            color: #8A3D35;
            font-size: 13px;
            line-height: 1.8;
        }

        .error-box ul {
            padding-left: 20px;
            margin-top: 5px;
        }

        .input-error {
            border-color: #C66B5D;
        }

        .error-text {
            margin-top: 5px;
            color: #B44C40;
            font-size: 11px;
        }

        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding-top: 20px;
            margin-top: 8px;
            border-top: 1px solid #E8EDE1;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 43px;
            padding: 12px 18px;
            border: none;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #82966A, #526B49);
            color: #FFFFFF;
            box-shadow: 0 4px 10px rgba(67, 86, 65, .12);
        }

        .btn-primary:hover {
            background: #435641;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #EDF1E3;
            color: #435641;
        }

        .btn-secondary:hover {
            background: #DCE5D0;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
                width: calc(100% - 200px);
                padding: 22px 18px;
            }

            .container {
                padding: 22px;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                padding: 18px 14px;
            }

            .brand {
                margin-bottom: 16px;
            }

            .menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .menu-link {
                padding: 10px 8px;
                font-size: 12px;
            }

            .main {
                margin-left: 0;
                width: 100%;
                padding: 20px 14px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .banner {
                padding: 17px;
            }

            .banner h2 {
                font-size: 16px;
            }

            .banner-icon {
                width: 45px;
                height: 45px;
                font-size: 20px;
            }

            .container {
                padding: 17px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .buttons .btn {
                flex: 1;
            }
        }
    </style>
</head>

<body>
@php
    $user = auth()->user();
@endphp

<aside class="sidebar">
    <div class="brand">
        Inventory Sales
        <span>Inventory &amp; Sales Management</span>
    </div>

    <div class="menu-title">Menu Utama</div>

    <nav class="menu">
        @if($user && $user->isAdmin())
            <a href="{{ route('dashboard') }}"
               class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="menu-icon">▦</span>
                <span>Dashboard</span>
            </a>
        @elseif($user && $user->isStaff())
            <a href="{{ route('staff.dashboard') }}"
               class="menu-link {{ request()->routeIs('staff.dashboard') ? 'active' : '' }}">
                <span class="menu-icon">▦</span>
                <span>Dashboard</span>
            </a>
        @endif

        <a href="{{ route('produk.index') }}"
           class="menu-link {{ request()->routeIs('produk.*') ? 'active' : '' }}">
            <span class="menu-icon">▣</span>
            <span>Data Produk</span>
        </a>

        @if($user && $user->isAdmin())
            <a href="{{ route('kategori.index') }}"
               class="menu-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                <span class="menu-icon">◇</span>
                <span>Kategori</span>
            </a>

            <a href="{{ route('supplier.index') }}"
               class="menu-link {{ request()->routeIs('supplier.*') ? 'active' : '' }}">
                <span class="menu-icon">♧</span>
                <span>Supplier</span>
            </a>
        @endif

        <a href="{{ route('pembelian.index') }}"
           class="menu-link {{ request()->routeIs('pembelian.*') ? 'active' : '' }}">
            <span class="menu-icon">↓</span>
            <span>Barang Masuk</span>
        </a>

        <a href="{{ route('barang-keluar.index') }}"
           class="menu-link {{ request()->routeIs('barang-keluar.*') ? 'active' : '' }}">
            <span class="menu-icon">↑</span>
            <span>Barang Keluar</span>
        </a>

        <a href="{{ route('transaksi-penjualan.index') }}"
           class="menu-link {{ request()->routeIs('transaksi-penjualan.*') ? 'active' : '' }}">
            <span class="menu-icon">▤</span>
            <span>Transaksi Penjualan</span>
        </a>

        <a href="{{ route('pesanan.index') }}"
           class="menu-link {{ request()->routeIs('pesanan.*') ? 'active' : '' }}">
            <span class="menu-icon">▧</span>
            <span>Pesanan</span>
        </a>

        @if($user && $user->isAdmin())
            <a href="{{ route('laporan.index') }}"
               class="menu-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                <span class="menu-icon">▥</span>
                <span>Laporan</span>
            </a>
        @endif

        <div class="menu-title">Akun</div>
    </nav>

    {{-- Form logout harus berdiri sendiri, tidak membungkus form edit produk --}}
    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-button">
            <span class="menu-icon">↪</span>
            <span>Logout</span>
        </button>
    </form>
</aside>

<main class="main">
    <header class="page-header">
        <div class="eyebrow">Manajemen Inventaris</div>
        <h1>Edit Produk</h1>
        <p>Perbarui informasi produk melalui formulir di bawah ini.</p>
    </header>

    <section class="banner">
        <div>
            <h2>Perbarui Data Produk</h2>
            <p>
                Pastikan kode, nama, kategori, harga, dan stok produk
                sudah sesuai sebelum menyimpan perubahan.
            </p>
        </div>

        <div class="banner-icon">▣</div>
    </section>

    <section class="container">
        <div class="form-heading">
            <h2>Informasi Produk</h2>
            <p>
                Produk yang sedang diedit:
                <strong>{{ $produk->nama_produk }}</strong>
            </p>
        </div>

        @if ($errors->any())
            <div class="error-box">
                <strong>Periksa kembali data berikut:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select
                        name="kategori_id"
                        id="kategori_id"
                        class="@error('kategori_id') input-error @enderror"
                        required
                    >
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kategori)
                            <option
                                value="{{ $kategori->id }}"
                                {{ old('kategori_id', $produk->kategori_id) == $kategori->id ? 'selected' : '' }}
                            >
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kode_produk">Kode Produk</label>
                    <input
                        type="text"
                        id="kode_produk"
                        name="kode_produk"
                        value="{{ old('kode_produk', $produk->kode_produk) }}"
                        class="@error('kode_produk') input-error @enderror"
                        required
                    >
                    @error('kode_produk')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input
                        type="text"
                        id="nama_produk"
                        name="nama_produk"
                        value="{{ old('nama_produk', $produk->nama_produk) }}"
                        class="@error('nama_produk') input-error @enderror"
                        required
                    >
                    @error('nama_produk')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="merek">Merek</label>
                    <input
                        type="text"
                        id="merek"
                        name="merek"
                        value="{{ old('merek', $produk->merek) }}"
                        class="@error('merek') input-error @enderror"
                        required
                    >
                    @error('merek')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group full">
                    <label for="deskripsi">Deskripsi Produk</label>
                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        class="@error('deskripsi') input-error @enderror"
                    >{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga">Harga (Rp)</label>
                    <input
                        type="number"
                        id="harga"
                        name="harga"
                        min="0"
                        step="0.01"
                        value="{{ old('harga', $produk->harga) }}"
                        class="@error('harga') input-error @enderror"
                        required
                    >
                    @error('harga')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stok">Stok Produk</label>
                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        min="0"
                        value="{{ old('stok', $produk->stok) }}"
                        class="@error('stok') input-error @enderror"
                        required
                    >
                    @error('stok')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="buttons">
                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                    Kembali ke Produk
                </a>
            </div>
        </form>
    </section>
</main>
</body>
</html>
