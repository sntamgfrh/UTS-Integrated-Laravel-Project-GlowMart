<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang Masuk - Inventory Sales</title>

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
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 230px;
            height: 100vh;
            padding: 28px 18px;
            background: linear-gradient(180deg, #F5F5E9, #E8EDD9, #CBD5B2);
            border-right: 1px solid #E0E7D4;
            color: #354335;
            overflow-y: auto;
        }

        .brand {
            text-align: center;
            font-size: 23px;
            font-weight: bold;
            color: #435641;
            margin-bottom: 8px;
        }

        .brand-subtitle {
            text-align: center;
            font-size: 11px;
            color: #718064;
            margin-bottom: 35px;
        }

        .menu-title {
            font-size: 11px;
            font-weight: bold;
            color: #849078;
            letter-spacing: 1px;
            margin: 22px 10px 12px;
            text-transform: uppercase;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #53634B;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 7px;
            font-size: 13px;
            transition: .2s;
        }

        .menu a:hover {
            background: rgba(255, 255, 255, .65);
        }

        .menu a.active {
            background: linear-gradient(135deg, #82966A, #61745B, #435641);
            color: white;
            box-shadow: 0 4px 10px #43564125;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .logout-form {
            margin-top: 25px;
        }

        .logout-button {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #D5DDC7;
            border-radius: 10px;
            background: rgba(255,255,255,.5);
            color: #59694F;
            font-size: 13px;
            font-weight: bold;
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
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            background: white;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            padding: 18px 22px;
            margin-bottom: 25px;
        }

        .topbar h1 {
            font-size: 21px;
            color: #354335;
            margin-bottom: 6px;
        }

        .topbar p {
            color: #87917D;
            font-size: 12px;
        }

        .user-info {
            color: #61745B;
            font-size: 13px;
            font-weight: bold;
        }

        .banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 25px;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            background: linear-gradient(120deg, #E8EDD9, #F5F5E9, #FFFFFF);
            margin-bottom: 25px;
        }

        .banner-label {
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.5px;
            color: #82966A;
            margin-bottom: 8px;
        }

        .banner h2 {
            font-size: 23px;
            color: #435641;
            margin-bottom: 8px;
        }

        .banner p {
            font-size: 13px;
            line-height: 1.6;
            color: #718064;
        }

        .banner-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 65px;
            height: 65px;
            border-radius: 18px;
            background: linear-gradient(135deg, #82966A, #435641);
            color: white;
            font-size: 29px;
        }

        .panel {
            background: white;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 4px 15px #43564108;
        }

        .panel-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            border-bottom: 1px solid #EDF0E7;
            padding-bottom: 17px;
            margin-bottom: 22px;
        }

        .panel-heading h3 {
            font-size: 17px;
            color: #435641;
        }

        .panel-heading p {
            color: #87917D;
            font-size: 12px;
            margin-top: 6px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .info-item {
            background: #FAFBF7;
            border: 1px solid #EDF0E7;
            border-radius: 11px;
            padding: 17px;
            min-width: 0;
        }

        .info-label {
            color: #87917D;
            font-size: 12px;
            margin-bottom: 9px;
        }

        .info-value {
            color: #354335;
            font-size: 14px;
            font-weight: bold;
            overflow-wrap: anywhere;
            line-height: 1.6;
        }

        .badge {
            display: inline-block;
            background: #E8EDD9;
            color: #536A45;
            border: 1px solid #D5DDC7;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
        }

        th {
            background: #F1F4E9;
            color: #53634B;
            font-size: 12px;
            font-weight: bold;
            text-align: left;
            padding: 15px 13px;
            border-bottom: 1px solid #E0E7D4;
            white-space: nowrap;
        }

        td {
            color: #53604D;
            font-size: 13px;
            padding: 15px 13px;
            border-bottom: 1px solid #EDF0E7;
        }

        tbody tr:hover {
            background: #FAFBF7;
        }

        .number {
            text-align: center;
        }

        .price {
            white-space: nowrap;
        }

        .empty {
            text-align: center;
            color: #87917D;
            padding: 30px;
        }

        .total-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            background: linear-gradient(120deg, #F1F4E9, #FAFBF7);
            border: 1px solid #E0E7D4;
            border-radius: 12px;
            padding: 20px;
            margin-top: 22px;
        }

        .total-label {
            font-size: 13px;
            color: #718064;
        }

        .total-value {
            font-size: 23px;
            font-weight: bold;
            color: #435641;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 18px;
            border: none;
            border-radius: 9px;
            background: linear-gradient(135deg, #82966A, #61745B, #435641);
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
        }

        .btn:hover {
            opacity: .9;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #E8EDD9;
            color: #53634B;
            border: 1px solid #D5DDC7;
        }

        @media(max-width: 900px) {
            .main {
                padding: 22px;
            }

            .banner h2 {
                font-size: 20px;
            }
        }

        @media(max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                padding: 20px 15px;
            }

            .brand-subtitle {
                margin-bottom: 20px;
            }

            .menu-title {
                margin-top: 15px;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .topbar {
                padding: 17px;
            }

            .banner {
                padding: 20px;
            }

            .banner-icon {
                width: 50px;
                height: 50px;
                font-size: 23px;
            }

            .panel {
                padding: 18px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .total-value {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

@php
    $user = auth()->user();
@endphp

<aside class="sidebar">
    <div class="brand">Inventory Sales</div>
    <div class="brand-subtitle">Inventory &amp; Sales Management</div>

    <nav class="menu">
        <div class="menu-title">Menu Utama</div>

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="menu-icon">⌂</span>
            Dashboard
        </a>

        <a href="{{ route('produk.index') }}"
           class="{{ request()->routeIs('produk.*') ? 'active' : '' }}">
            <span class="menu-icon">▣</span>
            Produk
        </a>

        <a href="{{ route('kategori.index') }}"
           class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">
            <span class="menu-icon">▤</span>
            Kategori
        </a>

        <a href="{{ route('supplier.index') }}"
           class="{{ request()->routeIs('supplier.*') ? 'active' : '' }}">
            <span class="menu-icon">▧</span>
            Supplier
        </a>

        <div class="menu-title">Transaksi</div>

        <a href="{{ route('pembelian.index') }}"
           class="{{ request()->routeIs('pembelian.*') ? 'active' : '' }}">
            <span class="menu-icon">↓</span>
            Barang Masuk
        </a>

        <a href="{{ route('barang-keluar.index') }}"
           class="{{ request()->routeIs('barang-keluar.*') ? 'active' : '' }}">
            <span class="menu-icon">↑</span>
            Barang Keluar
        </a>

        <a href="{{ route('transaksi-penjualan.index') }}"
           class="{{ request()->routeIs('transaksi-penjualan.*') ? 'active' : '' }}">
            <span class="menu-icon">▣</span>
            Penjualan
        </a>

         <a href="{{ route('pesanan.index') }}"
               class="menu-link">
                <span class="menu-icon">▧</span>
                <span>Pesanan</span>
            </a>

        <div class="menu-title">Laporan</div>

        <a href="{{ route('laporan.index') }}"
           class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}">
            <span class="menu-icon">▥</span>
            Laporan
        </a>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-button">
                Keluar dari Sistem
            </button>
        </form>
    </nav>
</aside>

<main class="main">

    <header class="topbar">
        <div>
            <h1>Detail Barang Masuk</h1>
            <p>Informasi lengkap transaksi barang masuk.</p>
        </div>

        <div class="user-info">
            {{ $user->name ?? 'Pengguna' }}
        </div>
    </header>

    <section class="banner">
        <div>
            <div class="banner-label">DETAIL TRANSAKSI INVENTARIS</div>
            <h2>Informasi Barang Masuk</h2>
            <p>
                Periksa data pembelian, supplier, dan daftar produk
                yang masuk ke inventaris.
            </p>
        </div>

        <div class="banner-icon">↓</div>
    </section>

    <section class="panel">
        <div class="panel-heading">
            <div>
                <h3>Informasi Transaksi</h3>
                <p>Ringkasan data pembelian barang.</p>
            </div>

            <span class="badge">
                {{ ucfirst($pembelian->status ?? 'Tercatat') }}
            </span>
        </div>

        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Kode Pembelian</div>
                <div class="info-value">
                    {{ $pembelian->kode_pembelian ?? '-' }}
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">Tanggal Pembelian</div>
                <div class="info-value">
                    {{ $pembelian->tanggal_pembelian
                        ? \Carbon\Carbon::parse($pembelian->tanggal_pembelian)->format('d/m/Y')
                        : '-' }}
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">Supplier</div>
                <div class="info-value">
                    {{ $pembelian->supplier->nama_supplier ?? '-' }}
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">Dicatat Oleh</div>
                <div class="info-value">
                    {{ $pembelian->user->name ?? 'Pengguna tidak tersedia' }}
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">Status Transaksi</div>
                <div class="info-value">
                    <span class="badge">
                        {{ ucfirst($pembelian->status ?? 'Tercatat') }}
                    </span>
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">Catatan</div>
                <div class="info-value">
                    {{ $pembelian->catatan ?: '-' }}
                </div>
            </div>
        </div>
    </section>

    <section class="panel">
        <div class="panel-heading">
            <div>
                <h3>Daftar Produk yang Masuk</h3>
                <p>Rincian produk dan biaya pembelian.</p>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th class="number">No.</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th class="number">Jumlah</th>
                        <th>Harga Beli</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($pembelian->detailPembelians as $detail)
                        <tr>
                            <td class="number">{{ $loop->iteration }}</td>

                            <td>
                                {{ $detail->produk->kode_produk ?? '-' }}
                            </td>

                            <td>
                                {{ $detail->produk->nama_produk ?? 'Produk tidak tersedia' }}
                            </td>

                            <td class="number">
                                {{ number_format((float) $detail->jumlah, 0, ',', '.') }}
                            </td>

                            <td class="price">
                                Rp{{ number_format((float) $detail->harga_beli, 0, ',', '.') }}
                            </td>

                            <td class="price">
                                Rp{{ number_format((float) $detail->subtotal, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">
                                Belum ada detail produk pada transaksi ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="total-box">
            <div class="total-label">Total Pembelian</div>

            <div class="total-value">
                Rp{{ number_format((float) $pembelian->total_harga, 0, ',', '.') }}
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">
                Kembali ke Barang Masuk
            </a>
        </div>
    </section>

</main>

</body>
</html>
