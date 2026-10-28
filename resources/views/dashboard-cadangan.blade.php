<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventory Sales</title>

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
            font-size: 14px;
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

        .cards {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .card {
            background: #FFFFFF;
            border: 1px solid #E0E7D4;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 5px 18px #4356410A;
            transition: 0.25s;
            min-width: 0;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 9px 22px #43564118;
        }

        .card-icon {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #EDF1E3;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 17px;
        }

        .card-label {
            font-size: 13px;
            color: #61745B;
            margin-bottom: 12px;
        }

        .card-number {
            font-size: 28px;
            font-weight: bold;
            color: #435641;
            overflow-wrap: anywhere;
        }

        .card-note {
            margin-top: 9px;
            font-size: 11px;
            color: #82966A;
        }

        .panel {
            background: #FFFFFF;
            border: 1px solid #E0E7D4;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 28px;
            box-shadow: 0 5px 18px #4356410A;
            min-width: 0;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .panel-header h2 {
            font-size: 19px;
            color: #354335;
        }

        .panel-header p {
            margin-top: 7px;
            font-size: 12px;
            color: #82917B;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #82966A, #61745B, #435641);
            color: #FFFFFF;
            text-decoration: none;
            padding: 11px 16px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: bold;
            transition: 0.2s;
            white-space: nowrap;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            box-shadow: 0 5px 12px #61745B40;
            transform: translateY(-2px);
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            background: #F5F5E9;
            color: #435641;
            font-size: 12px;
            font-weight: bold;
            text-align: left;
            padding: 15px 13px;
            white-space: nowrap;
        }

        td {
            padding: 15px 13px;
            font-size: 12px;
            color: #435641;
            border-bottom: 1px solid #EDF1E3;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #FAFBF6;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .badge-stock,
        .badge-status {
            display: inline-block;
            background: #E3EFDA;
            color: #435F36;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .badge-low {
            display: inline-block;
            background: #FFF0D6;
            color: #946319;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #82917B;
        }

        .footer {
            text-align: center;
            padding: 25px 10px;
            color: #82917B;
            font-size: 11px;
        }

        @media (max-width: 1200px) {
            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
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

            .cards {
                grid-template-columns: 1fr;
            }

            .topbar,
            .panel-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .user {
                white-space: normal;
            }

            .panel {
                padding: 16px;
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

        <a href="{{ route('pesanan-diproses.index') }}"
           class="menu-link {{ request()->routeIs('pesanan-diproses.*') ? 'active' : '' }}">
            <span class="menu-icon">▧</span>
            <span>Pesanan Diproses</span>
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
            <h1>Dashboard</h1>
            <p class="subtitle">
                Selamat datang di Inventory Sales Management System.
            </p>
        </div>

        <div class="user">
            {{ auth()->user()->name ?? 'Pengguna' }}
        </div>
    </header>

    <!-- Statistik produk -->
    <section class="cards">
        <div class="card">
            <div class="card-icon">PR</div>
            <div class="card-label">Total Produk</div>
            <div class="card-number">
                {{ number_format($totalProduk ?? 0, 0, ',', '.') }}
            </div>
            <div class="card-note">Produk terdaftar</div>
        </div>

        <div class="card">
            <div class="card-icon">ST</div>
            <div class="card-label">Total Stok</div>
            <div class="card-number">
                {{ number_format($totalStok ?? 0, 0, ',', '.') }}
            </div>
            <div class="card-note">Seluruh stok produk</div>
        </div>

        <div class="card">
            <div class="card-icon">!</div>
            <div class="card-label">Stok Rendah</div>
            <div class="card-number">
                {{ number_format($stokRendah ?? 0, 0, ',', '.') }}
            </div>
            <div class="card-note">Stok 5 atau kurang</div>
        </div>

        <div class="card">
            <div class="card-icon">KT</div>
            <div class="card-label">Total Kategori</div>
            <div class="card-number">
                {{ number_format($totalKategori ?? 0, 0, ',', '.') }}
            </div>
            <div class="card-note">Kategori produk</div>
        </div>
    </section>

    <!-- Statistik penjualan dan pembelian -->
    <section class="cards">
        <div class="card">
            <div class="card-icon">TJ</div>
            <div class="card-label">Total Transaksi Penjualan</div>
            <div class="card-number">
                {{ number_format($totalTransaksi ?? 0, 0, ',', '.') }}
            </div>
            <div class="card-note">Transaksi tercatat</div>
        </div>

        <div class="card">
            <div class="card-icon">Rp</div>
            <div class="card-label">Nilai Penjualan</div>
            <div class="card-number" style="font-size:24px">
                Rp {{ number_format($totalPenjualan ?? 0, 0, ',', '.') }}
            </div>
            <div class="card-note">Total nilai penjualan</div>
        </div>

        <div class="card">
            <div class="card-icon">PB</div>
            <div class="card-label">Total Pembelian</div>
            <div class="card-number">
                {{ number_format($totalPembelian ?? 0, 0, ',', '.') }}
            </div>
            <div class="card-note">Pembelian tercatat</div>
        </div>

        <div class="card">
            <div class="card-icon">Rp</div>
            <div class="card-label">Nilai Pembelian</div>
            <div class="card-number" style="font-size:24px">
                Rp {{ number_format($nilaiPembelian ?? 0, 0, ',', '.') }}
            </div>
            <div class="card-note">Total nilai pembelian</div>
        </div>

        <div class="card">
            <div class="card-icon">PS</div>
            <div class="card-label">Pesanan Pembeli</div>
            <div class="card-number">
                {{ number_format($totalPesanan ?? 0, 0, ',', '.') }}
            </div>
            <div class="card-note">Semua pesanan tercatat</div>
        </div>

        <div class="card">
            <div class="card-icon">DP</div>
            <div class="card-label">Pesanan Diproses</div>
            <div class="card-number">
                {{ number_format($pesananDiproses ?? 0, 0, ',', '.') }}
            </div>
            <div class="card-note">Berstatus Diproses</div>
        </div>
    </section>

    <!-- Transaksi penjualan terbaru -->
    <section class="panel">
        <div class="panel-header">
            <div>
                <h2>Transaksi Penjualan Terbaru</h2>
                <p>Lima transaksi penjualan terakhir.</p>
            </div>

            <a href="{{ route('transaksi-penjualan.index') }}" class="btn">
                Lihat Transaksi
            </a>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Metode Pembayaran</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (($transaksiTerbaru ?? collect()) as $transaksi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaksi->kode_transaksi }}</td>
                            <td>
                                {{ $transaksi->tanggal_transaksi
                                    ? \Illuminate\Support\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y')
                                    : '-' }}
                            </td>
                            <td>{{ $transaksi->nama_pelanggan ?: '-' }}</td>
                            <td>{{ $transaksi->metode_pembayaran ?: '-' }}</td>
                            <td>
                                Rp {{ number_format((float) $transaksi->total_harga, 0, ',', '.') }}
                            </td>
                            <td>
                                <span class="badge-status">
                                    {{ $transaksi->status ?: '-' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                Belum ada transaksi penjualan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Pesanan pembeli yang sedang diproses -->
    <section class="panel">
        <div class="panel-header">
            <div>
                <h2>Pesanan Pembeli Sedang Diproses</h2>
                <p>
                    Total {{ $pesananDiproses ?? 0 }} pesanan berstatus Diproses.
                </p>
            </div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Pesanan</th>
                        <th>Nama Penerima</th>
                        <th>No. Telepon</th>
                        <th>Metode Pembayaran</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (($pesananDalamProses ?? collect()) as $pesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->kode_pesanan }}</td>
                            <td>{{ $pesanan->nama_penerima ?: '-' }}</td>
                            <td>{{ $pesanan->no_telepon ?: '-' }}</td>
                            <td>{{ $pesanan->metode_pembayaran ?: '-' }}</td>
                            <td>
                                Rp {{ number_format((float) $pesanan->total_harga, 0, ',', '.') }}
                            </td>
                            <td>
                                <span class="badge-status">
                                    {{ $pesanan->status ?: '-' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                Tidak ada pesanan pembeli yang sedang diproses.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Pesanan pembeli terbaru -->
    <section class="panel">
        <div class="panel-header">
            <div>
                <h2>Pesanan Pembeli Terbaru</h2>
                <p>Lima pesanan pembeli terakhir yang masuk.</p>
            </div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Pesanan</th>
                        <th>Nama Penerima</th>
                        <th>No. Telepon</th>
                        <th>Metode Pembayaran</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (($pesananTerbaru ?? collect()) as $pesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->kode_pesanan }}</td>
                            <td>{{ $pesanan->nama_penerima ?: '-' }}</td>
                            <td>{{ $pesanan->no_telepon ?: '-' }}</td>
                            <td>{{ $pesanan->metode_pembayaran ?: '-' }}</td>
                            <td>
                                Rp {{ number_format((float) $pesanan->total_harga, 0, ',', '.') }}
                            </td>
                            <td>
                                <span class="badge-status">
                                    {{ $pesanan->status ?: '-' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                Belum ada pesanan pembeli.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Produk terbaru -->
    <section class="panel">
        <div class="panel-header">
            <div>
                <h2>Produk Terbaru</h2>
                <p>Daftar produk yang terakhir ditambahkan.</p>
            </div>

            <a href="{{ route('produk.index') }}" class="btn">
                Lihat Semua Produk
            </a>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (($produkTerbaru ?? collect()) as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $produk->kode_produk }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>
                                {{ $produk->kategori->nama_kategori
                                    ?? $produk->kategori->nama
                                    ?? '-' }}
                            </td>
                            <td>
                                Rp {{ number_format((float) $produk->harga, 0, ',', '.') }}
                            </td>
                            <td>
                                @if ($produk->stok <= 5)
                                    <span class="badge-low">
                                        {{ $produk->stok }} - Stok Rendah
                                    </span>
                                @else
                                    <span class="badge-stock">
                                        {{ $produk->stok }} tersedia
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">
                                Belum ada produk yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <footer class="footer">
        &copy; {{ date('Y') }} Inventory Sales Management System
    </footer>

</main>

</body>
</html>
