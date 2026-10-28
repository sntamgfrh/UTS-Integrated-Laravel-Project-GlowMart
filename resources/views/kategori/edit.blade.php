<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori - GlowMart</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #F7F8F1, #F5F5E9, #EDF1E3);
            color: #354335;
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
            transition: 0.25s;
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
        }

        .logout-button {
            width: 100%;
            border: none;
            background: transparent;
            text-align: left;
            cursor: pointer;
        }

        .main {
            margin-left: 230px;
            padding: 30px;
            min-width: 0;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: #FFFFFF;
            border: 1px solid #E0E7D4;
            border-radius: 16px;
            padding: 22px 25px;
            margin-bottom: 28px;
            box-shadow: 0 5px 18px #4356410A;
        }

        .topbar h1 {
            color: #354335;
            font-size: 27px;
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 13px;
            color: #61745B;
            line-height: 1.6;
        }

        .user {
            background: #F5F5E9;
            border: 1px solid #E0E7D4;
            color: #435641;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 13px;
            white-space: nowrap;
        }

        .alert {
            margin-bottom: 18px;
            padding: 13px 16px;
            border-radius: 12px;
            font-size: 13px;
            line-height: 1.6;
        }

        .success {
            color: #315B36;
            background: #E8F3E3;
            border: 1px solid #CBDDC0;
        }

        .alert-error {
            color: #873D37;
            background: #FCE8E6;
            border: 1px solid #F2D0CB;
        }

        .panel {
            background: #FFFFFF;
            border: 1px solid #E0E7D4;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 5px 18px #4356410A;
            max-width: 900px;
        }

        .panel-header {
            margin-bottom: 25px;
            padding-bottom: 18px;
            border-bottom: 1px solid #EDF1E3;
        }

        .panel-header h2 {
            font-size: 19px;
            color: #354335;
            margin-bottom: 7px;
        }

        .panel-header p {
            font-size: 12px;
            color: #82917B;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            font-size: 13px;
            font-weight: bold;
            color: #435641;
        }

        .form-control {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #D5DFC3;
            border-radius: 9px;
            background: #FFFFFF;
            color: #354335;
            font-size: 13px;
            outline: none;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #82966A;
            box-shadow: 0 0 0 3px #82966A20;
        }

        .help-text {
            margin-top: 8px;
            font-size: 11px;
            color: #82917B;
            line-height: 1.6;
        }

        .form-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            padding-top: 8px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border: none;
            border-radius: 9px;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #82966A, #61745B, #435641);
            color: #FFFFFF;
        }

        .btn-primary:hover {
            box-shadow: 0 5px 12px #61745B40;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #F5F5E9;
            border: 1px solid #E0E7D4;
            color: #61745B;
        }

        .btn-secondary:hover {
            background: #E8EDD9;
        }

        .footer {
            text-align: center;
            padding: 25px 10px;
            color: #82917B;
            font-size: 11px;
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
                padding: 16px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .user {
                white-space: normal;
            }

            .panel {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        Inventory Sales
        <span>Inventory &amp; Sales Management</span>
    </div>

    <div class="menu-title">Menu Utama</div>

    <nav>
        @if(auth()->check() && auth()->user()->isAdmin())
            <a href="{{ route('dashboard') }}"
               class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="menu-icon">▦</span>
                <span>Dashboard</span>
            </a>
        @elseif(auth()->check())
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

        @if(auth()->check() && auth()->user()->isAdmin())
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

        @if(auth()->check() && auth()->user()->isAdmin())
            <a href="{{ route('laporan.index') }}"
               class="menu-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                <span class="menu-icon">▥</span>
                <span>Laporan</span>
            </a>
        @endif

        <div class="menu-title">Akun</div>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="menu-link logout-button">
                <span class="menu-icon">↪</span>
                <span>Logout</span>
            </button>
        </form>
    </nav>
</aside>

<main class="main">

    <header class="topbar">
        <div>
            <h1>Edit Kategori</h1>
            <p class="subtitle">
                Perbarui informasi kategori produk GlowMart.
            </p>
        </div>

        <div class="user">
            {{ auth()->user()->name ?? 'Pengguna' }}
        </div>
    </header>

    @if(session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <section class="panel">

        <div class="panel-header">
            <h2>Informasi Kategori</h2>
            <p>
                Ubah nama kategori pada formulir berikut, lalu simpan perubahan.
            </p>
        </div>

        <form action="{{ route('kategori.update', $kategori->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>

                <input
                    type="text"
                    id="nama_kategori"
                    name="nama_kategori"
                    class="form-control"
                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                    placeholder="Masukkan nama kategori"
                    maxlength="255"
                    required
                    autofocus
                >

                <p class="help-text">
                    Gunakan nama yang jelas agar produk mudah dikelompokkan.
                </p>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('kategori.index') }}"
                   class="btn btn-secondary">
                    Kembali ke Kategori
                </a>
            </div>

        </form>

    </section>

    <footer class="footer">
        &copy; {{ date('Y') }} GlowMart
    </footer>

</main>

</body>
</html>
