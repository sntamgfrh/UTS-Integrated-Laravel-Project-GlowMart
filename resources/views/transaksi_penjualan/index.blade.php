<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Penjualan - Inventory Sales</title>

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
            padding: 28px;
            min-width: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .eyebrow {
            color: #82966A;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .header h1 {
            font-size: 29px;
            margin-bottom: 8px;
            color: #435641;
        }

        .header p {
            color: #78856F;
            font-size: 13px;
            line-height: 1.7;
        }

        .transaction-banner {
            background: linear-gradient(120deg, #E4EBDD, #F9FAF5);
            border: 1px solid #D5E0CD;
            border-radius: 16px;
            padding: 23px;
            margin-bottom: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
        }

        .transaction-banner h2 {
            color: #435641;
            font-size: 19px;
            margin-bottom: 8px;
        }

        .transaction-banner p {
            color: #78856F;
            font-size: 12px;
            line-height: 1.8;
            max-width: 570px;
        }

        .transaction-label {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 7px;
            background: #E8EDD9;
            color: #526B49;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .transaction-banner-icon {
            width: 60px;
            height: 60px;
            border-radius: 17px;
            background: #526B49;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            font-weight: bold;
            flex-shrink: 0;
            box-shadow: 0 7px 15px rgba(67, 86, 65, .14);
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #526B49;
            color: white;
            text-decoration: none;
            border: none;
            padding: 13px 17px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
        }

        .button:hover {
            background: #354B34;
            transform: translateY(-2px);
        }

        .button-secondary {
            background: #E8EDD9;
            color: #435641;
        }

        .button-secondary:hover {
            background: #CBD5B2;
        }

        .alert {
            background: #E6F0DF;
            color: #435641;
            border: 1px solid #C8D9BB;
            border-radius: 10px;
            padding: 13px 16px;
            margin-bottom: 18px;
            font-size: 13px;
            line-height: 1.6;
        }

        .alert-error {
            background: #FBE8E5;
            color: #8A3D35;
            border-color: #F0C9C2;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 22px;
            padding: 15px;
            background: white;
            border: 1px solid #E0E7D4;
            border-radius: 13px;
        }

        .search-box input {
            flex: 1;
            width: 280px;
            min-width: 180px;
            max-width: 580px;
            height: 44px;
            padding: 0 14px;
            border: 1px solid #D5DEC9;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
            background: white;
            color: #435641;
        }

        .search-box input:focus {
            border-color: #82966A;
            box-shadow: 0 0 0 3px rgba(130, 150, 106, .13);
        }

        .panel {
            background: white;
            border: 1px solid #E0E7D4;
            border-radius: 16px;
            box-shadow: 0 5px 18px rgba(67, 86, 65, .05);
            padding: 22px;
            min-width: 0;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 19px;
        }

        .panel h2 {
            font-size: 18px;
            color: #435641;
        }

        .panel-subtitle {
            margin-top: 6px;
            color: #899481;
            font-size: 12px;
            line-height: 1.6;
        }

        .record-count {
            background: #EDF1E3;
            color: #526B49;
            border-radius: 9px;
            padding: 9px 12px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #E8EDE1;
            font-size: 12px;
            vertical-align: middle;
        }

        th {
            background: #E8EDD9;
            color: #435641;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .3px;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #FAFBF7;
        }

        .kode {
            color: #435641;
            font-weight: bold;
            white-space: nowrap;
        }

        .badge {
            display: inline-block;
            background: #E7EEDC;
            color: #526B49;
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 11px;
            margin: 2px;
            border: none;
            border-radius: 8px;
            background: #E8EDD9;
            color: #435641;
            font-weight: bold;
            text-decoration: none;
            font-size: 12px;
            white-space: nowrap;
            cursor: pointer;
            transition: .2s;
        }

        .action:hover {
            background: #CBD5B2;
        }

        .empty {
            text-align: center;
            color: #899481;
            padding: 45px 15px;
            line-height: 1.8;
        }

        .pagination {
            margin-top: 20px;
            overflow-x: auto;
        }

        .pagination nav > div:first-child {
            font-size: 12px;
            color: #78856F;
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

            .header h1 {
                font-size: 24px;
            }

            .header .button {
                width: 100%;
            }

            .transaction-banner {
                padding: 17px;
            }

            .transaction-banner h2 {
                font-size: 16px;
            }

            .transaction-banner-icon {
                width: 46px;
                height: 46px;
                font-size: 20px;
            }

            .search-box input {
                flex-basis: 100%;
                width: 100%;
                max-width: 100%;
            }

            .search-box .button {
                flex: 1;
            }

            .panel {
                padding: 15px;
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

    <nav class="menu">
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
    </nav>

    <div class="menu-title">Akun</div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-button">
            <span class="menu-icon">↪</span>
            <span>Logout</span>
        </button>
    </form>
</aside>

<main class="main">

    <header class="header">
        <div>
            <div class="eyebrow">Penjualan / Riwayat Transaksi</div>
            <h1>Transaksi Penjualan</h1>
            <p>Kelola dan pantau riwayat penjualan Inventory Sales.</p>
        </div>

        <a href="{{ route('transaksi-penjualan.create') }}" class="button">
            + Tambah Transaksi
        </a>
    </header>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <strong>Terjadi kesalahan:</strong>
            <ul style="margin: 8px 0 0 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="transaction-banner">
        <div>
            <span class="transaction-label">TRANSAKSI PENJUALAN</span>
            <h2>Kelola Penjualan dengan Mudah</h2>
            <p>
                Pantau pelanggan, nilai transaksi, metode pembayaran,
                dan status setiap penjualan dalam satu halaman.
            </p>
        </div>

        <div class="transaction-banner-icon">Rp</div>
    </section>

    <form action="{{ route('transaksi-penjualan.index') }}"
          method="GET"
          class="search-box">

        <input
            type="text"
            name="cari"
            placeholder="Cari kode transaksi atau nama pelanggan..."
            value="{{ $cari ?? '' }}"
        >

        <button type="submit" class="button">Cari</button>

        <a href="{{ route('transaksi-penjualan.index') }}"
           class="button button-secondary">
            Reset
        </a>
    </form>

    <section class="panel">

        <div class="panel-header">
            <div>
                <h2>Riwayat Transaksi</h2>
                <p class="panel-subtitle">
                    Daftar penjualan, pelanggan, pembayaran, dan status transaksi.
                </p>
            </div>

            <span class="record-count">
                {{ number_format($transaksis->total(), 0, ',', '.') }} transaksi
            </span>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Total Harga</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($transaksis as $transaksi)
                        <tr>
                            <td>
                                {{ $transaksis->firstItem() + $loop->index }}
                            </td>

                            <td class="kode">
                                {{ $transaksi->kode_transaksi }}
                            </td>

                            <td>
                                {{ $transaksi->tanggal_transaksi
                                    ? \Illuminate\Support\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y')
                                    : '-' }}
                            </td>

                            <td>
                                {{ $transaksi->nama_pelanggan ?: 'Umum' }}
                            </td>

                            <td class="kode">
                                Rp {{ number_format((float) $transaksi->total_harga, 0, ',', '.') }}
                            </td>

                            <td>
                                {{ $transaksi->metode_pembayaran }}
                            </td>

                            <td>
                                <span class="badge">
                                    {{ $transaksi->status }}
                                </span>
                            </td>

                            <td>
                                <a class="action"
                                   href="{{ route('transaksi-penjualan.show', $transaksi->id) }}">
                                    Lihat Detail
                                </a>

                                <button type="button"
                                        class="action print-button"
                                        onclick="window.open('{{ route('transaksi-penjualan.show', $transaksi->id) }}?print=1', '_blank')">
                                    Print
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty">
                                Belum ada data transaksi penjualan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($transaksis->hasPages())
            <div class="pagination">
                {{ $transaksis->withQueryString()->links() }}
            </div>
        @endif

    </section>

</main>

</body>
</html>
