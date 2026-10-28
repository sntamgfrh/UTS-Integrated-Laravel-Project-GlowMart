<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Masuk - GlowMart</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #F7F8F1;
            color: #354335;
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
            margin-top: 25px;
        }

        .logout-button {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 12px;
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
            padding: 30px;
            min-height: 100vh;
            min-width: 0;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            background: #FFFFFF;
            padding: 22px 25px;
            border-radius: 15px;
            border: 1px solid #E0E7D4;
            margin-bottom: 25px;
        }

        .topbar h1 {
            color: #435641;
            font-size: 27px;
            margin-bottom: 6px;
        }

        .topbar p {
            color: #61745B;
            font-size: 14px;
            line-height: 1.6;
        }

        .user-info {
            color: #435641;
            background: #F5F5E9;
            padding: 11px 15px;
            border-radius: 10px;
            font-size: 13px;
        }

        .incoming-banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 23px;
            margin-bottom: 22px;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            background: linear-gradient(120deg, #E8EDD9, #FFFFFF);
        }

        .incoming-label {
            display: inline-block;
            padding: 6px 10px;
            margin-bottom: 10px;
            border-radius: 7px;
            background: #F5F5E9;
            color: #61745B;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .incoming-banner h2 {
            margin-bottom: 8px;
            color: #435641;
            font-size: 19px;
        }

        .incoming-banner p {
            max-width: 570px;
            color: #61745B;
            font-size: 13px;
            line-height: 1.8;
        }

        .incoming-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            border-radius: 15px;
            background: #82966A;
            color: #FFFFFF;
            font-size: 29px;
            font-weight: bold;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-height: 42px;
            padding: 11px 16px;
            background: linear-gradient(135deg, #82966A, #61745B);
            color: #FFFFFF;
            text-decoration: none;
            border: none;
            border-radius: 9px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            white-space: nowrap;
        }

        .btn:hover {
            background: linear-gradient(135deg, #71865C, #435641);
            transform: translateY(-1px);
        }

        .btn-secondary,
        .btn-detail {
            background: #E8EDD9;
            color: #435641;
        }

        .btn-secondary:hover,
        .btn-detail:hover {
            background: #CBD5B2;
            color: #435641;
        }

        .alert {
            background: #E8F3E3;
            color: #435641;
            border: 1px solid #CBDDC0;
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.6;
        }

        .alert-error {
            background: #FCE8E6;
            color: #873D37;
            border-color: #F2D0CB;
        }

        .alert ul {
            padding-left: 20px;
            margin-top: 8px;
        }

        .panel {
            background: #FFFFFF;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(67, 86, 65, 0.05);
            padding: 25px;
            min-width: 0;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .panel-header h2 {
            color: #435641;
            font-size: 21px;
        }

        .panel-subtitle {
            margin-top: 6px;
            color: #61745B;
            font-size: 13px;
            line-height: 1.7;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #E0E7D4;
            border-radius: 10px;
        }

        table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #E6EBDD;
            font-size: 13px;
            vertical-align: middle;
        }

        th {
            background: #E8EDD9;
            color: #435641;
            font-weight: bold;
            white-space: nowrap;
        }

        td {
            color: #354335;
        }

        tbody tr:hover {
            background: #F7F8F1;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .kode {
            color: #435641;
            font-weight: bold;
            white-space: nowrap;
        }

        .harga {
            color: #526B49;
            font-weight: bold;
            white-space: nowrap;
        }

        .badge {
            display: inline-block;
            background: #E8EDD9;
            color: #526B49;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .empty {
            text-align: center;
            color: #61745B;
            padding: 35px 15px;
            line-height: 1.8;
        }

        .pagination {
            margin-top: 20px;
            overflow-x: auto;
        }

        .pagination nav > div:first-child {
            font-size: 12px;
            color: #61745B;
        }

        .pagination a,
        .pagination span[aria-current="page"] span {
            color: #435641;
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
                padding: 20px 14px;
            }

            .topbar {
                padding: 18px;
            }

            .topbar h1 {
                font-size: 23px;
            }

            .incoming-banner {
                padding: 17px;
            }

            .incoming-banner h2 {
                font-size: 16px;
            }

            .incoming-icon {
                width: 46px;
                height: 46px;
                font-size: 22px;
            }

            .panel {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

    @php
        $user = auth()->user();
        $isAdmin = $user && $user->isAdmin();
    @endphp

    <aside class="sidebar">
        <div class="brand">
            Inventory Sales
            <span>Inventory &amp; Sales Management</span>
        </div>

        <div class="menu-title">Menu Utama</div>

        <nav>
            @if($isAdmin)
                <a href="{{ route('dashboard') }}"
                   class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="menu-icon">▦</span>
                    <span>Dashboard</span>
                </a>
            @else
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

            @if($isAdmin)
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

            @if($isAdmin)
                <a href="{{ route('laporan.index') }}"
                   class="menu-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                    <span class="menu-icon">▥</span>
                    <span>Laporan</span>
                </a>
            @else
                <a href="{{ route('staff.laporan') }}"
                   class="menu-link {{ request()->routeIs('staff.laporan') ? 'active' : '' }}">
                    <span class="menu-icon">▥</span>
                    <span>Laporan</span>
                </a>
            @endif

            <div class="menu-title">Akun</div>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">
                    <span class="menu-icon">↪</span>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <h1>Barang Masuk</h1>
                <p>Kelola pembelian dan pantau penambahan stok produk.</p>
            </div>

            <div class="user-info">
                {{ $user->name ?? 'Pengguna' }}
            </div>
        </header>

        <section class="incoming-banner">
            <div>
                <span class="incoming-label">INVENTARIS</span>
                <h2>Catat Stok Masuk dengan Mudah</h2>
                <p>
                    Pantau pembelian dari supplier, tanggal penerimaan,
                    dan nilai barang yang masuk ke persediaan.
                </p>
            </div>

            <div class="incoming-icon">↓</div>
        </section>

        @if(session('success'))
            <div class="alert">
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
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="panel">
            <div class="panel-header">
                <div>
                    <h2>Riwayat Barang Masuk</h2>
                    <p class="panel-subtitle">
                        Daftar pembelian produk dari supplier.
                    </p>
                </div>

                <a href="{{ route('pembelian.create') }}" class="btn">
                    + Tambah Barang Masuk
                </a>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Pembelian</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pembelians as $pembelian)
                            <tr>
                                <td>
                                    {{ method_exists($pembelians, 'firstItem')
                                        ? $pembelians->firstItem() + $loop->index
                                        : $loop->iteration }}
                                </td>

                                <td class="kode">
                                    {{ $pembelian->kode_pembelian }}
                                </td>

                                <td>
                                    {{ $pembelian->tanggal_pembelian
                                        ? \Illuminate\Support\Carbon::parse($pembelian->tanggal_pembelian)->format('d/m/Y')
                                        : '-' }}
                                </td>

                                <td>
                                    {{ $pembelian->supplier->nama_supplier ?? '-' }}
                                </td>

                                <td class="harga">
                                    Rp{{ number_format((float) $pembelian->total_harga, 0, ',', '.') }}
                                </td>

                                <td>
                                    <span class="badge">
                                        {{ ucfirst($pembelian->status ?? 'Belum ada status') }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('pembelian.show', $pembelian) }}"
                                       class="btn btn-detail">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty">
                                    Belum ada transaksi barang masuk.
                                    <br>
                                    Klik Tambah Barang Masuk untuk mencatat pembelian.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($pembelians, 'links') && $pembelians->hasPages())
                <div class="pagination">
                    {{ $pembelians->links() }}
                </div>
            @endif
        </section>
    </main>

</body>
</html>
