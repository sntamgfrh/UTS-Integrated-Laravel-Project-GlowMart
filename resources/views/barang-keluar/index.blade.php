<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Keluar - Inventory Sales</title>

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
            min-width: 0;
            padding: 28px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
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
        }

        .header p {
            color: #78856F;
            font-size: 13px;
            line-height: 1.7;
            max-width: 650px;
        }

        .btn {
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

        .btn:hover {
            background: #354B34;
            transform: translateY(-2px);
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .summary-card {
            background: white;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 14px rgba(67, 86, 65, .04);
        }

        .summary-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 17px;
        }

        .summary-label {
            color: #78856F;
            font-size: 12px;
            font-weight: 600;
        }

        .summary-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background: #EDF1E3;
            border-radius: 11px;
            font-size: 19px;
        }

        .summary-number {
            font-size: 27px;
            font-weight: bold;
            color: #435641;
        }

        .summary-note {
            margin-top: 7px;
            color: #899481;
            font-size: 11px;
            line-height: 1.6;
        }

        .notice {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px 18px;
            background: #E9EFE0;
            border: 1px solid #D5E0C9;
            border-left: 4px solid #82966A;
            border-radius: 12px;
            margin-bottom: 22px;
            font-size: 12px;
            line-height: 1.8;
        }

        .notice-icon {
            font-size: 21px;
        }

        .notice strong {
            display: block;
            margin-bottom: 4px;
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
            min-width: 1050px;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #E8EDE1;
            font-size: 12px;
        }

        th {
            background: #F3F5ED;
            color: #52644B;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .3px;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #FAFBF7;
        }

        td {
            color: #596653;
            vertical-align: middle;
        }

        .kode {
            color: #435641;
            font-weight: bold;
            white-space: nowrap;
        }

        .product-name {
            font-weight: bold;
            color: #435641;
            margin-bottom: 5px;
        }

        .muted {
            font-size: 11px;
            color: #899481;
        }

        .quantity {
            display: inline-block;
            background: #E7EEDC;
            color: #526B49;
            padding: 7px 10px;
            border-radius: 8px;
            font-weight: bold;
            white-space: nowrap;
        }

        .reason {
            display: inline-block;
            padding: 7px 9px;
            border-radius: 7px;
            background: #F8EAD6;
            color: #8A622E;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .reason-sales {
            background: #E1EBDD;
            color: #3D6740;
        }

        .source-code {
            display: inline-block;
            background: #F0F2E9;
            padding: 7px 9px;
            border-radius: 7px;
            font-size: 11px;
            color: #526B49;
            font-weight: bold;
            white-space: nowrap;
        }

        .source-manual {
            color: #8A622E;
            font-size: 11px;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            color: #899481;
            padding: 45px 15px;
            line-height: 1.8;
        }

        .empty-icon {
            display: block;
            font-size: 34px;
            margin-bottom: 12px;
        }

        .pagination {
            margin-top: 20px;
            overflow-x: auto;
        }

        .pagination nav > div:first-child {
            font-size: 12px;
            color: #78856F;
        }

        @media (max-width: 1050px) {
            .summary {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
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

            .brand {
                font-size: 21px;
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

            .summary {
                grid-template-columns: 1fr;
                gap: 11px;
            }

            .summary-card {
                padding: 17px;
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
    $totalCatatan = $barangKeluars->total();
    $totalUnitHalaman = $barangKeluars->getCollection()->sum('jumlah');
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

        <a href="{{ route('pesanan-diproses.index') }}"
           class="menu-link {{ request()->routeIs('pesanan-diproses.*') ? 'active' : '' }}">
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
            <div class="eyebrow">Kontrol Stok / Pengeluaran Barang</div>
            <h1>Riwayat Barang Keluar</h1>
            <p>
                Pantau pergerakan stok keluar karena penjualan, barang rusak,
                kedaluwarsa, hilang, maupun pemakaian internal.
            </p>
        </div>

        <a href="{{ route('barang-keluar.create') }}" class="btn">
            + Catat Pengeluaran Stok
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

    <section class="summary">
        <div class="summary-card">
            <div class="summary-top">
                <span class="summary-label">Total catatan keluar</span>
                <span class="summary-icon">▤</span>
            </div>
            <div class="summary-number">
                {{ number_format($totalCatatan, 0, ',', '.') }}
            </div>
            <p class="summary-note">
                Seluruh catatan pada semua halaman riwayat.
            </p>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <span class="summary-label">Unit keluar di halaman ini</span>
                <span class="summary-icon">↑</span>
            </div>
            <div class="summary-number">
                {{ number_format($totalUnitHalaman, 0, ',', '.') }}
            </div>
            <p class="summary-note">
                Total unit dari catatan yang sedang ditampilkan.
            </p>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <span class="summary-label">Pencatatan stok</span>
                <span class="summary-icon">✓</span>
            </div>
            <div class="summary-number" style="font-size: 21px;">
                Aktif
            </div>
            <p class="summary-note">
                Riwayat pengeluaran stok produk.
            </p>
        </div>
    </section>

    <div class="notice">
        <span class="notice-icon">i</span>
        <div>
            <strong>Fokus: Pergerakan Stok Keluar</strong>
            Halaman ini mencatat jumlah stok yang keluar dari persediaan.
            Penjualan yang berhasil dapat dicatat otomatis, sedangkan barang
            rusak, kedaluwarsa, hilang, dan pemakaian internal dicatat melalui
            formulir pengeluaran stok.
        </div>
    </div>

    <section class="panel">
        <div class="panel-header">
            <div>
                <h2>Riwayat Pergerakan Stok</h2>
                <p class="panel-subtitle">
                    Periksa kode keluar, produk, jumlah, alasan, sumber transaksi,
                    dan petugas yang mencatat.
                </p>
            </div>

            <span class="record-count">
                {{ number_format($totalCatatan, 0, ',', '.') }} catatan
            </span>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Keluar</th>
                        <th>Tanggal Keluar</th>
                        <th>Informasi Produk</th>
                        <th>Jumlah Keluar</th>
                        <th>Alasan</th>
                        <th>Sumber / Kode Transaksi</th>
                        <th>Petugas</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($barangKeluars as $barangKeluar)
                        <tr>
                            <td>
                                {{ $barangKeluars->firstItem() + $loop->index }}
                            </td>

                            <td class="kode">
                                {{ $barangKeluar->kode_barang_keluar }}
                            </td>

                            <td>
                                {{ $barangKeluar->tanggal_keluar
                                    ? $barangKeluar->tanggal_keluar->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>
                                <div class="product-name">
                                    {{ $barangKeluar->produk->nama_produk ?? 'Produk tidak ditemukan' }}
                                </div>
                                <div class="muted">
                                    SKU: {{ $barangKeluar->produk->kode_produk ?? '-' }}
                                </div>
                            </td>

                            <td>
                                <span class="quantity">
                                    {{ number_format($barangKeluar->jumlah, 0, ',', '.') }} unit
                                </span>
                            </td>

                            <td>
                                <span class="reason {{ $barangKeluar->alasan === 'Penjualan' ? 'reason-sales' : '' }}">
                                    {{ $barangKeluar->alasan }}
                                </span>
                            </td>

                            <td>
                                @if($barangKeluar->transaksi_penjualan_id)
                                    <span class="source-code">
                                        {{ $barangKeluar->transaksiPenjualan->kode_transaksi
                                            ?? 'ID #' . $barangKeluar->transaksi_penjualan_id }}
                                    </span>
                                @else
                                    <span class="source-manual">
                                        Pengeluaran manual
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $barangKeluar->user->name ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty">
                                <span class="empty-icon">-</span>
                                <strong>Belum ada riwayat Barang Keluar</strong>
                                <br>
                                Riwayat akan muncul setelah pengeluaran stok
                                berhasil dicatat atau transaksi penjualan
                                terintegrasi dengan pencatatan Barang Keluar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($barangKeluars->hasPages())
            <div class="pagination">
                {{ $barangKeluars->links() }}
            </div>
        @endif
    </section>

</main>

</body>
</html>
