<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier - Inventory Sales</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: #F5F5E9;
            color: #435641;
        }

        .sidebar {
            width: 230px;
            min-height: 100vh;
            padding: 25px 15px;
            background: linear-gradient(180deg, #DCE8D5, #A8C5A0);
            flex-shrink: 0;
        }

        .brand {
            text-align: center;
            font-size: 21px;
            font-weight: bold;
            margin-bottom: 35px;
            color: #435641;
        }

        .menu-title {
            font-size: 11px;
            font-weight: bold;
            color: #61745B;
            margin: 20px 10px 10px;
            text-transform: uppercase;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            margin-bottom: 6px;
            border-radius: 9px;
            text-decoration: none;
            color: #435641;
            font-size: 14px;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: linear-gradient(135deg, #6F966B, #557B52);
            color: white;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 16px;
        }

        .logout-form {
            margin-top: 25px;
        }

        .logout-button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 9px;
            background: #435641;
            color: white;
            cursor: pointer;
            font-size: 14px;
            text-align: left;
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 35px;
        }

        .topbar {
            margin-bottom: 25px;
        }

        .topbar h1 {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .topbar p {
            color: #75836E;
            font-size: 14px;
        }

        .card {
            max-width: 850px;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(67, 86, 65, 0.08);
        }

        .card h2 {
            font-size: 20px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #CBD5B2;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            color: #435641;
            background: #fff;
        }

        input:focus,
        textarea:focus {
            border-color: #6F966B;
            box-shadow: 0 0 0 3px rgba(111, 150, 107, 0.12);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .error-box {
            background: #FCE8E6;
            color: #A93226;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error-box ul {
            padding-left: 20px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-save {
            background: #6F966B;
            color: white;
        }

        .btn-save:hover {
            background: #557B52;
        }

        .btn-back {
            background: #E8EDD9;
            color: #435641;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
            }

            .main {
                padding: 20px;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="brand">Inventory Sales</div>

        <div class="menu-title">Menu Utama</div>

        <a href="{{ route('dashboard') }}">
            <span class="menu-icon">⌂</span>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('produk.index') }}">
            <span class="menu-icon">▦</span>
            <span>Data Produk</span>
        </a>

        <a href="{{ route('kategori.index') }}">
            <span class="menu-icon">▤</span>
            <span>Data Kategori</span>
        </a>

        <a href="{{ route('supplier.index') }}" class="active">
            <span class="menu-icon">♧</span>
            <span>Data Supplier</span>
        </a>

        <a href="{{ route('pembelian.index') }}">
            <span class="menu-icon">⇩</span>
            <span>Barang Masuk</span>
        </a>

        <a href="{{ route('barang-keluar.index') }}">
            <span class="menu-icon">⇧</span>
            <span>Barang Keluar</span>
        </a>

        <a href="{{ route('transaksi-penjualan.index') }}">
            <span class="menu-icon">▣</span>
            <span>Transaksi Penjualan</span>
        </a>

        <a href="{{ route('pesanan.index') }}">
            <span class="menu-icon">▧</span>
            <span>Pesanan</span>
        </a>

        <a href="{{ route('laporan.index') }}">
            <span class="menu-icon">▥</span>
            <span>Laporan</span>
        </a>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-button">Keluar</button>
        </form>
    </aside>

    <main class="main">
        <div class="topbar">
            <h1>Edit Supplier</h1>
            <p>Perbarui informasi supplier pada sistem Inventory Sales.</p>
        </div>

        <div class="card">
            <h2>Form Edit Supplier</h2>

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('supplier.update', $supplier->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="kode_supplier">Kode Supplier</label>
                    <input
                        type="text"
                        id="kode_supplier"
                        name="kode_supplier"
                        value="{{ old('kode_supplier', $supplier->kode_supplier) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier</label>
                    <input
                        type="text"
                        id="nama_supplier"
                        name="nama_supplier"
                        value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="nama_kontak">Nama Kontak</label>
                    <input
                        type="text"
                        id="nama_kontak"
                        name="nama_kontak"
                        value="{{ old('nama_kontak', $supplier->nama_kontak) }}"
                    >
                </div>

                <div class="form-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input
                        type="text"
                        id="telepon"
                        name="telepon"
                        value="{{ old('telepon', $supplier->telepon) }}"
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $supplier->email) }}"
                    >
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                    >{{ old('alamat', $supplier->alamat) }}</textarea>
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-save">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('supplier.index') }}" class="btn btn-back">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
