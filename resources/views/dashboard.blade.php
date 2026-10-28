<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - GlowMart</title>

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

        .layout {
            display: flex;
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
            flex-shrink: 0;
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
            flex: 1;
            min-width: 0;
            margin-left: 230px;
            padding: 30px;
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
            flex-wrap: wrap;
        }

        .topbar h1 {
            color: #354335;
            font-size: 27px;
            margin-bottom: 8px;
        }

        .muted {
            color: #61745B;
            font-size: 13px;
            line-height: 1.6;
        }

        .profile {
            background: #F5F5E9;
            border: 1px solid #E0E7D4;
            color: #435641;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 13px;
            white-space: nowrap;
        }

        .welcome {
            background: linear-gradient(135deg, #82966A, #61745B, #435641);
            color: #FFFFFF;
            padding: 25px;
            border-radius: 17px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px #61745B20;
        }

        .welcome h2 {
            font-size: 23px;
            margin-bottom: 9px;
        }

        .welcome p {
            color: #F0F4E9;
            font-size: 14px;
            line-height: 1.6;
        }

        .section-heading {
            font-size: 18px;
            color: #354335;
            margin: 27px 0 15px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
        }

        .stat {
            background: #FFFFFF;
            padding: 20px;
            border-radius: 14px;
            border: 1px solid #E0E7D4;
            box-shadow: 0 5px 18px #4356410A;
            min-width: 0;
        }

        .stat-label {
            color: #61745B;
            font-size: 13px;
            margin-bottom: 13px;
        }

        .stat-value {
            color: #354335;
            font-size: 26px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .stat-note {
            font-size: 12px;
            color: #82917B;
            margin-top: 10px;
            line-height: 1.5;
        }

        .stat-line {
            height: 4px;
            border-radius: 5px;
            background: #E8EDD9;
            margin-top: 16px;
        }

        .stat-line span {
            display: block;
            height: 100%;
            width: 65%;
            border-radius: 5px;
            background: #82966A;
        }

        .quick-links {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 13px;
        }

        .quick-link {
            display: block;
            background: #FFFFFF;
            border: 1px solid #E0E7D4;
            border-radius: 12px;
            padding: 17px;
            color: #435641;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .quick-link:hover {
            border-color: #82966A;
            background: #FAFBF6;
            transform: translateY(-2px);
        }

        .quick-link small {
            display: block;
            font-weight: normal;
            color: #82917B;
            margin-top: 8px;
            line-height: 1.5;
        }

        .two-columns {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin-top: 22px;
        }

        .panel {
            background: #FFFFFF;
            border: 1px solid #E0E7D4;
            border-radius: 16px;
            padding: 24px;
            min-width: 0;
            box-shadow: 0 5px 18px #4356410A;
            margin-bottom: 0;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .panel-header h3 {
            font-size: 16px;
            color: #354335;
        }

        .panel-header a {
            color: #61745B;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
        }

        .panel-header a:hover {
            color: #435641;
            text-decoration: underline;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #E0E7D4;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
            white-space: nowrap;
        }

        th {
            text-align: left;
            padding: 15px 13px;
            background: #F5F5E9;
            color: #435641;
            font-weight: bold;
        }

        td {
            padding: 14px 13px;
            color: #435641;
            border-bottom: 1px solid #EDF1E3;
            vertical-align: middle;
        }

        tbody tr {
            background: #FFFFFF;
            transition: background 0.2s;
        }

        tbody tr:hover {
            background: #FAFBF6;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            background: #E8EDD9;
            color: #435641;
            font-size: 11px;
            font-weight: bold;
        }

        .badge.warning {
            background: #FFF0D8;
            color: #A56B12;
        }

        .badge.danger {
            background: #FCE8E6;
            color: #873D37;
        }

        .empty {
            padding: 30px;
            text-align: center;
            color: #82917B;
            font-size: 13px;
        }

        .footer {
            text-align: center;
            color: #82917B;
            font-size: 11px;
            margin-top: 30px;
            padding: 25px 10px;
        }

        @media (max-width: 1150px) {
            .stats,
            .quick-links {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .two-columns {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .layout {
                display: block;
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
                padding: 25px 16px;
            }

            .main {
                margin-left: 0;
                padding: 16px;
            }

            .topbar,
            .panel-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .profile {
                white-space: normal;
            }

            .stats,
            .quick-links {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .stat {
                padding: 15px;
            }

            .stat-value {
                font-size: 21px;
            }

            .welcome {
                padding: 20px;
            }

            .topbar {
                padding: 18px;
            }

            .panel {
                padding: 16px;
            }
        }

        @media (max-width: 390px) {
            .stats,
            .quick-links {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
<div class="layout">

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

            <div class="menu-title">Transaksi</div>

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

            @if(Route::has('pesanan.index'))
                <a href="{{ route('pesanan.index') }}"
                   class="menu-link {{ request()->routeIs('pesanan.*') ? 'active' : '' }}">
                    <span class="menu-icon">▧</span>
                    <span>Pesanan</span>
                </a>
            @elseif(Route::has('pesanan-diproses.index'))
                <a href="{{ route('pesanan-diproses.index') }}"
                   class="menu-link {{ request()->routeIs('pesanan-diproses.*') ? 'active' : '' }}">
                    <span class="menu-icon">▧</span>
                    <span>Pesanan</span>
                </a>
            @endif

            <div class="menu-title">Lainnya</div>

            @if(auth()->check() && auth()->user()->isAdmin() && Route::has('laporan.index'))
                <a href="{{ route('laporan.index') }}"
                   class="menu-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                    <span class="menu-icon">▥</span>
                    <span>Laporan</span>
                </a>
            @endif

            <div class="menu-title">Akun</div>

            @if(Route::has('logout'))
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="menu-link logout-button">
                        <span class="menu-icon">↪</span>
                        <span>Logout</span>
                    </button>
                </form>
            @endif
        </nav>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <h1>Dashboard</h1>
                <p class="muted">Ringkasan aktivitas dan pengelolaan GlowMart</p>
            </div>

            <div class="profile">
                {{ auth()->user()->name ?? 'Pengguna' }}
            </div>
        </header>

        <section class="welcome">
            <h2>Selamat datang di GlowMart</h2>
            <p>
                Pantau stok, produk, supplier, pembelian, penjualan,
                dan pesanan pelanggan melalui satu halaman.
            </p>
        </section>

        <h2 class="section-heading">Ringkasan Inventaris</h2>

        <section class="stats">
            <div class="stat">
                <div class="stat-label">Total Produk</div>
                <div class="stat-value">{{ number_format($totalProduk ?? 0, 0, ',', '.') }}</div>
                <div class="stat-note">Produk terdaftar</div>
                <div class="stat-line"><span></span></div>
            </div>

            <div class="stat">
                <div class="stat-label">Total Stok</div>
                <div class="stat-value">{{ number_format($totalStok ?? 0, 0, ',', '.') }}</div>
                <div class="stat-note">Jumlah stok seluruh produk</div>
                <div class="stat-line"><span style="width:80%"></span></div>
            </div>

            <div class="stat">
                <div class="stat-label">Stok Menipis</div>
                <div class="stat-value">{{ number_format($stokRendah ?? 0, 0, ',', '.') }}</div>
                <div class="stat-note">Produk dengan stok maksimal 5</div>
                <div class="stat-line"><span style="width:35%;background:#e9a23b"></span></div>
            </div>

            <div class="stat">
                <div class="stat-label">Total Kategori</div>
                <div class="stat-value">{{ number_format($totalKategori ?? 0, 0, ',', '.') }}</div>
                <div class="stat-note">Kategori produk tersedia</div>
                <div class="stat-line"><span style="width:55%"></span></div>
            </div>

            <div class="stat">
                <div class="stat-label">Total Supplier</div>
                <div class="stat-value">{{ number_format($totalSupplier ?? 0, 0, ',', '.') }}</div>
                <div class="stat-note">Supplier terdaftar</div>
            </div>
        </section>

        <h2 class="section-heading">Ringkasan Transaksi</h2>

        <section class="stats">
            <div class="stat">
                <div class="stat-label">Transaksi Penjualan</div>
                <div class="stat-value">{{ number_format($totalTransaksi ?? 0, 0, ',', '.') }}</div>
                <div class="stat-note">Jumlah transaksi tercatat</div>
            </div>

            <div class="stat">
                <div class="stat-label">Nilai Penjualan</div>
                <div class="stat-value" style="font-size:21px">
                    Rp {{ number_format($totalPenjualan ?? 0, 0, ',', '.') }}
                </div>
                <div class="stat-note">Akumulasi penjualan</div>
            </div>

            <div class="stat">
                <div class="stat-label">Total Pembelian</div>
                <div class="stat-value">{{ number_format($totalPembelian ?? 0, 0, ',', '.') }}</div>
                <div class="stat-note">Transaksi pembelian barang</div>
            </div>

            <div class="stat">
                <div class="stat-label">Nilai Pembelian</div>
                <div class="stat-value" style="font-size:21px">
                    Rp {{ number_format($nilaiPembelian ?? 0, 0, ',', '.') }}
                </div>
                <div class="stat-note">Akumulasi pembelian</div>
            </div>

            <div class="stat">
                <div class="stat-label">Barang Keluar</div>
                <div class="stat-value">{{ number_format($totalBarangKeluar ?? 0, 0, ',', '.') }}</div>
                <div class="stat-note">Catatan barang keluar</div>
            </div>
        </section>

        <h2 class="section-heading">Ringkasan Pesanan</h2>

        <section class="stats">
            <div class="stat">
                <div class="stat-label">Total Pesanan</div>
                <div class="stat-value">{{ number_format($totalPesanan ?? 0, 0, ',', '.') }}</div>
                <div class="stat-note">Seluruh pesanan terdaftar</div>
            </div>

            <div class="stat">
                <div class="stat-label">Pesanan Diproses</div>
                <div class="stat-value">{{ number_format($pesananDiproses ?? 0, 0, ',', '.') }}</div>
                <div class="stat-note">Pesanan berstatus Diproses</div>
            </div>
        </section>

        <h2 class="section-heading">Akses Cepat</h2>

        <section class="quick-links">

            {{-- MANAJEMEN USER: HANYA UNTUK ADMIN --}}
            @if(auth()->check() && auth()->user()->isAdmin() && Route::has('users.index'))
                <a class="quick-link" href="{{ route('users.index') }}">
                    Manajemen User
                    <small>Kelola akun Admin dan Staff</small>
                </a>
            @endif

            @if(Route::has('produk.index'))
                <a class="quick-link" href="{{ route('produk.index') }}">
                    Data Produk
                    <small>Kelola data dan stok produk</small>
                </a>
            @endif

            @if(auth()->check() && auth()->user()->isAdmin() && Route::has('kategori.index'))
                <a class="quick-link" href="{{ route('kategori.index') }}">
                    Kategori
                    <small>Kelola kelompok produk</small>
                </a>
            @endif

            @if(auth()->check() && auth()->user()->isAdmin() && Route::has('supplier.index'))
                <a class="quick-link" href="{{ route('supplier.index') }}">
                    Supplier
                    <small>Kelola data pemasok</small>
                </a>
            @endif

            @if(Route::has('pembelian.index'))
                <a class="quick-link" href="{{ route('pembelian.index') }}">
                    Pembelian
                    <small>Catat pembelian barang</small>
                </a>
            @endif

            @if(Route::has('barang-keluar.index'))
                <a class="quick-link" href="{{ route('barang-keluar.index') }}">
                    Barang Keluar
                    <small>Pantau stok yang keluar</small>
                </a>
            @endif

            @if(Route::has('transaksi-penjualan.index'))
                <a class="quick-link" href="{{ route('transaksi-penjualan.index') }}">
                    Penjualan
                    <small>Kelola transaksi penjualan</small>
                </a>
            @endif

            @if(Route::has('pesanan.index'))
                <a class="quick-link" href="{{ route('pesanan.index') }}">
                    Pesanan
                    <small>Pantau pesanan pelanggan</small>
                </a>
            @elseif(Route::has('pesanan-diproses.index'))
                <a class="quick-link" href="{{ route('pesanan-diproses.index') }}">
                    Pesanan
                    <small>Pantau pesanan pelanggan</small>
                </a>
            @endif

            @if(auth()->check() && auth()->user()->isAdmin() && Route::has('laporan.index'))
                <a class="quick-link" href="{{ route('laporan.index') }}">
                    Laporan
                    <small>Lihat laporan usaha</small>
                </a>
            @endif
        </section>

        <h2 class="section-heading">Peringatan Stok Menipis</h2>

        <section class="panel">
            <div class="panel-header">
                <h3>Produk yang Perlu Segera Ditambah</h3>
                @if(Route::has('produk.index'))
                    <a href="{{ route('produk.index') }}">Kelola produk</a>
                @endif
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kode Produk</th>
                            <th>Stok Tersisa</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(($produkStokMenipis ?? collect()) as $produk)
                            <tr>
                                <td>{{ $produk->nama_produk ?? '-' }}</td>
                                <td>{{ $produk->kode_produk ?? '-' }}</td>
                                <td>{{ $produk->stok ?? 0 }}</td>
                                <td>
                                    @if(($produk->stok ?? 0) <= 0)
                                        <span class="badge danger">Stok Habis</span>
                                    @else
                                        <span class="badge warning">Stok Menipis</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty">
                                    Tidak ada produk dengan stok menipis.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <div class="two-columns">

            <section class="panel">
                <div class="panel-header">
                    <h3>Produk Terbaru</h3>
                    @if(Route::has('produk.index'))
                        <a href="{{ route('produk.index') }}">Lihat semua</a>
                    @endif
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($produkTerbaru ?? collect()) as $produk)
                                <tr>
                                    <td>{{ $produk->nama_produk ?? '-' }}</td>
                                    <td>{{ $produk->kategori->nama_kategori ?? $produk->kategori->nama ?? '-' }}</td>
                                    <td>
                                        @if(($produk->stok ?? 0) <= 5)
                                            <span class="badge warning">{{ $produk->stok ?? 0 }}</span>
                                        @else
                                            <span class="badge">{{ $produk->stok ?? 0 }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="empty">Belum ada data produk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="panel">
                <div class="panel-header">
                    <h3>Transaksi Penjualan Terbaru</h3>
                    @if(Route::has('transaksi-penjualan.index'))
                        <a href="{{ route('transaksi-penjualan.index') }}">Lihat semua</a>
                    @endif
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($transaksiTerbaru ?? collect()) as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->kode_transaksi ?? '-' }}</td>
                                    <td>{{ $transaksi->nama_pelanggan ?? '-' }}</td>
                                    <td>
                                        Rp {{ number_format((float)($transaksi->total_harga ?? 0), 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="empty">Belum ada transaksi penjualan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="panel">
                <div class="panel-header">
                    <h3>Pesanan Dalam Proses</h3>
                    @if(Route::has('pesanan.index'))
                        <a href="{{ route('pesanan.index') }}">Lihat semua</a>
                    @elseif(Route::has('pesanan-diproses.index'))
                        <a href="{{ route('pesanan-diproses.index') }}">Lihat semua</a>
                    @endif
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($pesananDalamProses ?? collect()) as $pesanan)
                                <tr>
                                    <td>{{ $pesanan->kode_pesanan ?? '-' }}</td>
                                    <td>{{ $pesanan->nama_penerima ?? $pesanan->nama_pelanggan ?? '-' }}</td>
                                    <td>
                                        <span class="badge warning">
                                            {{ $pesanan->status ?? 'Diproses' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="empty">
                                        Tidak ada pesanan dalam proses.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="panel">
                <div class="panel-header">
                    <h3>Pesanan Terbaru</h3>
                    @if(Route::has('pesanan.index'))
                        <a href="{{ route('pesanan.index') }}">Lihat semua</a>
                    @elseif(Route::has('pesanan-diproses.index'))
                        <a href="{{ route('pesanan-diproses.index') }}">Lihat semua</a>
                    @endif
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($pesananTerbaru ?? collect()) as $pesanan)
                                <tr>
                                    <td>{{ $pesanan->kode_pesanan ?? '-' }}</td>
                                    <td>{{ $pesanan->nama_penerima ?? $pesanan->nama_pelanggan ?? '-' }}</td>
                                    <td><span class="badge">{{ $pesanan->status ?? '-' }}</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="empty">Belum ada pesanan terbaru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="panel">
                <div class="panel-header">
                    <h3>Pembelian Barang Terbaru</h3>
                    @if(Route::has('pembelian.index'))
                        <a href="{{ route('pembelian.index') }}">Lihat semua</a>
                    @endif
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode / ID</th>
                                <th>Tanggal</th>
                                <th>Supplier</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($pembelianTerbaru ?? collect()) as $pembelian)
                                <tr>
                                    <td>{{ $pembelian->kode_pembelian ?? $pembelian->id ?? '-' }}</td>
                                    <td>{{ $pembelian->tanggal_pembelian ?? $pembelian->created_at ?? '-' }}</td>
                                    <td>{{ $pembelian->nama_supplier ?? $pembelian->supplier ?? '-' }}</td>
                                    <td>
                                        Rp {{ number_format((float)($pembelian->total_harga ?? $pembelian->total ?? 0), 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty">
                                        Belum ada data pembelian.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="panel">
                <div class="panel-header">
                    <h3>Barang Keluar Terbaru</h3>
                    @if(Route::has('barang-keluar.index'))
                        <a href="{{ route('barang-keluar.index') }}">Lihat semua</a>
                    @endif
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode / ID</th>
                                <th>Tanggal</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($barangKeluarTerbaru ?? collect()) as $barang)
                                <tr>
                                    <td>{{ $barang->kode_barang_keluar ?? $barang->id ?? '-' }}</td>
                                    <td>{{ $barang->tanggal_keluar ?? $barang->created_at ?? '-' }}</td>
                                    <td>{{ $barang->nama_produk ?? '-' }}</td>
                                    <td>{{ $barang->jumlah ?? $barang->jumlah_keluar ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty">
                                        Belum ada data barang keluar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

        </div>

        <footer class="footer">
            &copy; {{ date('Y') }} GlowMart
        </footer>

    </main>
</div>
</body>
</html>
