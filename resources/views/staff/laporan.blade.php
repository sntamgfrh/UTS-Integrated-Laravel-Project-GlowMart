<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - Inventory Sales</title>

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
            min-width: 0;
            padding: 28px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 23px;
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
            color: #435641;
            font-size: 29px;
            margin-bottom: 8px;
        }

        .header p {
            color: #78856F;
            font-size: 13px;
            line-height: 1.7;
        }

        .report-banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 24px;
            margin-bottom: 22px;
            border: 1px solid #D5E0CD;
            border-radius: 16px;
            background: linear-gradient(120deg, #E4EBDD, #FAFBF6);
        }

        .report-label {
            display: inline-block;
            padding: 6px 10px;
            margin-bottom: 10px;
            border-radius: 7px;
            background: #F5F5E9;
            color: #526B49;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .report-banner h2 {
            color: #435641;
            font-size: 20px;
            margin-bottom: 8px;
        }

        .report-banner p {
            color: #78856F;
            font-size: 12px;
            line-height: 1.8;
            max-width: 600px;
        }

        .report-icon {
            width: 62px;
            height: 62px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 17px;
            background: #526B49;
            color: white;
            font-size: 28px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 12px 16px;
            border: none;
            border-radius: 9px;
            background: #526B49;
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
        }

        .btn:hover {
            background: #354B34;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #E8EDD9;
            color: #435641;
        }

        .btn-secondary:hover {
            background: #CBD5B2;
        }

        .btn-print {
            background: #82966A;
            color: white;
        }

        .btn-print:hover {
            background: #61745B;
        }

        .filter {
            background: white;
            padding: 22px;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(67, 86, 65, .04);
            margin-bottom: 22px;
        }

        .filter h2 {
            font-size: 17px;
            margin-bottom: 17px;
        }

        .filter form {
            display: flex;
            flex-wrap: wrap;
            align-items: end;
            gap: 13px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .field label {
            color: #596653;
            font-size: 12px;
            font-weight: bold;
        }

        input[type="date"] {
            min-height: 43px;
            padding: 10px 12px;
            border: 1px solid #D5DEC9;
            border-radius: 9px;
            background: white;
            color: #435641;
            outline: none;
        }

        input[type="date"]:focus {
            border-color: #82966A;
            box-shadow: 0 0 0 3px rgba(130, 150, 106, .13);
        }

        .alert {
            padding: 13px 16px;
            margin-bottom: 18px;
            border: 1px solid #C8D9BB;
            border-radius: 10px;
            background: #E6F0DF;
            color: #435641;
            font-size: 13px;
            line-height: 1.7;
        }

        .alert-error {
            border-color: #F0C9C2;
            background: #FBE8E5;
            color: #8A3D35;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .summary-card {
            position: relative;
            overflow: hidden;
            background: white;
            border: 1px solid #E0E7D4;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 5px 16px rgba(67, 86, 65, .04);
        }

        .summary-card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: #82966A;
        }

        .summary-card:nth-child(2)::before {
            background: #526B49;
        }

        .summary-card:nth-child(3)::before {
            background: #A3B18A;
        }

        .summary-card:nth-child(4)::before {
            background: #61745B;
        }

        .summary-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            margin-bottom: 13px;
            border-radius: 10px;
            background: #EDF1E3;
            color: #526B49;
            font-size: 18px;
        }

        .summary-card p {
            color: #78856F;
            font-size: 12px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .summary-card h2 {
            color: #435641;
            font-size: 21px;
            overflow-wrap: anywhere;
        }

        .panel {
            background: white;
            padding: 22px;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(67, 86, 65, .04);
            margin-bottom: 22px;
            min-width: 0;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .panel-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .panel-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 12px;
            background: #E8EDD9;
            color: #526B49;
            font-size: 20px;
        }

        .panel h2 {
            color: #435641;
            font-size: 17px;
        }

        .panel-subtitle {
            margin-top: 5px;
            color: #899481;
            font-size: 12px;
            line-height: 1.6;
        }

        .record-count {
            padding: 8px 11px;
            border-radius: 8px;
            background: #EDF1E3;
            color: #526B49;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
        }

        th, td {
            padding: 13px 12px;
            border-bottom: 1px solid #E8EDE1;
            text-align: left;
            font-size: 12px;
            vertical-align: middle;
        }

        th {
            background: #EDF1E3;
            color: #435641;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #FAFBF6;
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
            padding: 6px 10px;
            border-radius: 8px;
            background: #E6EEDC;
            color: #526B49;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .empty {
            padding: 35px 15px;
            color: #899481;
            text-align: center;
            line-height: 1.8;
        }

        @media (max-width: 1100px) {
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

            .report-banner {
                padding: 17px;
            }

            .report-banner h2 {
                font-size: 17px;
            }

            .report-icon {
                width: 46px;
                height: 46px;
                font-size: 22px;
            }

            .summary {
                grid-template-columns: 1fr;
            }

            .summary-card {
                padding: 17px;
            }

            .filter, .panel {
                padding: 16px;
            }

            .filter form {
                align-items: stretch;
            }

            .field {
                width: 100%;
            }

            input[type="date"] {
                width: 100%;
            }

            .filter .btn {
                flex: 1;
            }
        }

        @media print {
            body {
                background: white;
                color: black;
            }

            .sidebar, .filter, .no-print {
                display: none !important;
            }

            .main {
                width: 100%;
                margin: 0;
                padding: 0;
            }

            .header {
                margin-bottom: 12px;
            }

            .header h1, .header p, .eyebrow {
                color: black;
            }

            .report-banner {
                background: white;
                border: 1px solid #ccc;
                padding: 15px;
            }

            .report-banner h2, .report-banner p {
                color: black;
            }

            .report-icon {
                background: white;
                color: black;
                border: 1px solid #ccc;
                box-shadow: none;
            }

            .summary {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .summary-card, .panel {
                box-shadow: none;
                border: 1px solid #ccc;
                break-inside: avoid;
            }

            .table-wrap {
                overflow: visible;
            }

            table {
                min-width: 0;
                width: 100%;
            }

            th, td {
                padding: 7px 5px;
                font-size: 9px;
                color: black;
            }

            th {
                background: #eee !important;
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .panel {
                break-inside: auto;
            }

            tr {
                break-inside: avoid;
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
    <a href="{{ route('staff.dashboard') }}"
       class="menu-link {{ request()->routeIs('staff.dashboard') ? 'active' : '' }}">
        <span class="menu-icon">▦</span>
        <span>Dashboard</span>
    </a>

    <a href="{{ route('produk.index') }}"
       class="menu-link {{ request()->routeIs('produk.*') ? 'active' : '' }}">
        <span class="menu-icon">▣</span>
        <span>Data Produk</span>
    </a>

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

    <a href="{{ route('staff.laporan') }}"
       class="menu-link {{ request()->routeIs('staff.laporan') ? 'active' : '' }}">
        <span class="menu-icon">▥</span>
        <span>Laporan</span>
    </a>
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
            <div class="eyebrow">Analisis / Ringkasan Bisnis</div>
            <h1>Laporan Inventory Sales</h1>
            <p>Laporan barang masuk, barang keluar, dan transaksi penjualan berdasarkan periode.</p>
        </div>

        <button type="button" onclick="window.print()" class="btn btn-print no-print">
            Cetak Laporan
        </button>
    </header>

    <section class="report-banner">
        <div>
            <span class="report-label">LAPORAN INVENTARIS &amp; PENJUALAN</span>
            <h2>Pantau Performa Bisnis</h2>
            <p>
                Lihat ringkasan barang masuk, barang keluar, penjualan, dan jumlah transaksi
                sesuai rentang tanggal yang dipilih.
            </p>
        </div>
        <div class="report-icon">▥</div>
    </section>

    <section class="filter no-print">
        <h2>Filter Periode Laporan</h2>

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Terjadi kesalahan:</strong>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="GET" action="{{ route('staff.laporan') }}">
            <div class="field">
                <label for="tanggal_mulai">Dari tanggal</label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                       value="{{ $tanggalMulai }}">
            </div>

            <div class="field">
                <label for="tanggal_akhir">Sampai tanggal</label>
                <input type="date" id="tanggal_akhir" name="tanggal_akhir"
                       value="{{ $tanggalAkhir }}">
            </div>

            <button type="submit" class="btn">Tampilkan</button>
            <a href="{{ route('staff.laporan') }}" class="btn btn-secondary">Reset</a>
        </form>
    </section>

    <section class="summary">
        <div class="summary-card">
            <div class="summary-icon">↓</div>
            <p>Total Nilai Barang Masuk</p>
            <h2>Rp {{ number_format($totalPembelian, 0, ',', '.') }}</h2>
        </div>

        <div class="summary-card">
            <div class="summary-icon">↑</div>
            <p>Total Jumlah Barang Keluar</p>
            <h2>{{ number_format($totalJumlahBarangKeluar, 0, ',', '.') }} unit</h2>
        </div>

        <div class="summary-card">
            <div class="summary-icon">▣</div>
            <p>Total Nilai Penjualan</p>
            <h2>Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</h2>
        </div>

        <div class="summary-card">
            <div class="summary-icon">▤</div>
            <p>Jumlah Transaksi Penjualan</p>
            <h2>{{ $penjualans->count() }} transaksi</h2>
        </div>
    </section>

    <section class="panel">
        <div class="panel-header">
            <div class="panel-title">
                <div class="panel-icon">↓</div>
                <div>
                    <h2>Laporan Barang Masuk</h2>
                    <p class="panel-subtitle">Riwayat pembelian produk dari supplier.</p>
                </div>
            </div>
            <span class="record-count">{{ $pembelians->count() }} data</span>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Pembelian</th>
                        <th>Tanggal</th>
                        <th>Supplier</th>
                        <th>Petugas</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembelians as $pembelian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="kode">{{ $pembelian->kode_pembelian }}</td>
                            <td>
                                {{ $pembelian->tanggal_pembelian
                                    ? \Illuminate\Support\Carbon::parse($pembelian->tanggal_pembelian)->format('d-m-Y')
                                    : '-' }}
                            </td>
                            <td>{{ $pembelian->supplier->nama_supplier ?? '-' }}</td>
                            <td>{{ $pembelian->user->name ?? '-' }}</td>
                            <td class="harga">
                                Rp {{ number_format((float) $pembelian->total_harga, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">Belum ada data barang masuk pada periode ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <section class="panel">
        <div class="panel-header">
            <div class="panel-title">
                <div class="panel-icon">↑</div>
                <div>
                    <h2>Laporan Barang Keluar</h2>
                    <p class="panel-subtitle">Riwayat pengeluaran stok, termasuk dari penjualan.</p>
                </div>
            </div>
            <span class="record-count">{{ $barangKeluars->count() }} data</span>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang Keluar</th>
                        <th>Tanggal</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Alasan</th>
                        <th>Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangKeluars as $barangKeluar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="kode">{{ $barangKeluar->kode_barang_keluar ?? '-' }}</td>
                            <td>
                                {{ $barangKeluar->tanggal_keluar
                                    ? \Illuminate\Support\Carbon::parse($barangKeluar->tanggal_keluar)->format('d-m-Y')
                                    : '-' }}
                            </td>
                            <td>{{ $barangKeluar->produk->nama_produk ?? '-' }}</td>
                            <td>{{ $barangKeluar->jumlah }}</td>
                            <td>
                                <span class="badge">{{ $barangKeluar->alasan ?? '-' }}</span>
                            </td>
                            <td>{{ $barangKeluar->user->name ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">Belum ada data barang keluar pada periode ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <section class="panel">
        <div class="panel-header">
            <div class="panel-title">
                <div class="panel-icon">▤</div>
                <div>
                    <h2>Laporan Transaksi Penjualan</h2>
                    <p class="panel-subtitle">Riwayat penjualan dan metode pembayaran pelanggan.</p>
                </div>
            </div>
            <span class="record-count">{{ $penjualans->count() }} data</span>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penjualans as $penjualan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="kode">{{ $penjualan->kode_transaksi }}</td>
                            <td>
                                {{ $penjualan->tanggal_transaksi
                                    ? \Illuminate\Support\Carbon::parse($penjualan->tanggal_transaksi)->format('d-m-Y')
                                    : '-' }}
                            </td>
                            <td>{{ $penjualan->nama_pelanggan ?: 'Umum' }}</td>
                            <td>{{ $penjualan->metode_pembayaran ?? '-' }}</td>
                            <td>
                                <span class="badge">{{ ucfirst($penjualan->status ?? '-') }}</span>
                            </td>
                            <td class="harga">
                                Rp {{ number_format((float) $penjualan->total_harga, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">Belum ada data penjualan pada periode ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>
</body>
</html>
