<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - GlowMart</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #F7F8F1, #F5F5E9, #EDF1E3);
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
            border-radius: 16px;
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
        }

        .user-info {
            color: #435641;
            background: #F5F5E9;
            padding: 11px 15px;
            border-radius: 10px;
            font-size: 13px;
        }

        .alert {
            margin-bottom: 20px;
            padding: 14px 18px;
            border-radius: 10px;
            font-size: 14px;
        }

        .success {
            background: #E8F3E3;
            color: #435641;
            border: 1px solid #CBDDC0;
        }

        .alert-error {
            background: #FCE8E6;
            color: #873D37;
            border: 1px solid #F2D0CB;
        }

        .alert ul {
            margin: 8px 0 0 20px;
        }

        .panel {
            background: #FFFFFF;
            padding: 24px;
            border: 1px solid #E0E7D4;
            border-radius: 16px;
            box-shadow: 0 5px 18px rgba(67, 86, 65, 0.05);
            margin-bottom: 25px;
        }

        .panel-top {
            margin-bottom: 22px;
        }

        .panel-top h2 {
            color: #435641;
            font-size: 19px;
            margin-bottom: 7px;
        }

        .panel-top p {
            color: #61745B;
            font-size: 13px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            color: #435641;
            font-size: 13px;
            font-weight: bold;
        }

        .required {
            color: #B94A48;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #DCE4D1;
            border-radius: 9px;
            background: #FFFFFF;
            color: #354335;
            font-size: 13px;
            outline: none;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #82966A;
            box-shadow: 0 0 0 3px rgba(130, 150, 106, 0.13);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            line-height: 1.6;
        }

        .hint {
            margin-top: 7px;
            color: #82917B;
            font-size: 11px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            padding-top: 5px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 38px;
            padding: 10px 16px;
            border: none;
            border-radius: 9px;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-save {
            background: linear-gradient(135deg, #82966A, #61745B);
            color: #FFFFFF;
        }

        .btn-save:hover {
            background: linear-gradient(135deg, #71865C, #435641);
            transform: translateY(-2px);
        }

        .btn-cancel {
            background: #F5F5E9;
            color: #435641;
            border: 1px solid #E0E7D4;
        }

        .btn-cancel:hover {
            background: #E8EDD9;
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

        thead {
            background: #F5F5E9;
        }

        th {
            color: #435641;
            font-size: 12px;
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid #E0E7D4;
        }

        td {
            color: #354335;
            font-size: 12px;
            padding: 14px 12px;
            border-bottom: 1px solid #EDF1E8;
        }

        tbody tr:hover {
            background: #FAFBF7;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #FFF0D2;
            color: #856404;
            font-size: 11px;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            color: #82917B;
            padding: 25px;
        }

        .footer {
            text-align: center;
            padding: 25px 10px;
            color: #82917B;
            font-size: 11px;
        }

        @media (max-width: 1100px) {
            .main {
                padding: 22px;
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
                padding: 20px 14px;
            }

            .topbar {
                padding: 18px;
            }

            .topbar h1 {
                font-size: 23px;
            }

            .panel {
                padding: 17px;
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
           class="menu-link">
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
            <h1>Tambah Kategori</h1>
            <p>Tambahkan kategori baru untuk mengelompokkan produk.</p>
        </div>

        <div class="user-info">
            {{ auth()->user()->name ?? 'Pengguna' }}
        </div>
    </header>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <strong>Periksa kembali data yang dimasukkan:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="panel">
        <div class="panel-top">
            <h2>Form Kategori Baru</h2>
            <p>Lengkapi informasi kategori di bawah ini.</p>
        </div>

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_kategori">
                    Nama Kategori <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="nama_kategori"
                    name="nama_kategori"
                    class="form-control"
                    value="{{ old('nama_kategori') }}"
                    placeholder="Contoh: Perawatan Wajah"
                    maxlength="255"
                    required
                >

                <p class="hint">
                    Masukkan nama kategori yang jelas dan mudah dikenali.
                </p>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    class="form-control"
                    placeholder="Masukkan deskripsi kategori (opsional)"
                >{{ old('deskripsi') }}</textarea>

                <p class="hint">
                    Deskripsi boleh dikosongkan jika tidak diperlukan.
                </p>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-save">
                    Simpan Kategori
                </button>

                <a href="{{ route('kategori.index') }}"
                   class="btn btn-cancel">
                    Batal
                </a>
            </div>
        </form>
    </section>

    <section class="panel" id="pesanan-diproses">
        <div class="panel-top">
            <h2>Pesanan Diproses</h2>
            <p>Daftar pesanan yang sedang diproses.</p>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Pesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse(($pesananDalamProses ?? collect()) as $pesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $pesanan->kode_pesanan
                                    ?? $pesanan->kode_transaksi
                                    ?? ('ORD-' . $pesanan->id) }}
                            </td>
                            <td>{{ $pesanan->nama_pelanggan ?? '-' }}</td>
                            <td>
                                {{ $pesanan->created_at
                                    ? \Carbon\Carbon::parse($pesanan->created_at)->format('d-m-Y')
                                    : '-' }}
                            </td>
                            <td>
                                <span class="status">
                                    {{ $pesanan->status ?? 'Diproses' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">
                                Belum ada pesanan yang sedang diproses.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <footer class="footer">
        &copy; {{ date('Y') }} GlowMart Inventory &amp; Sales Management
    </footer>

</main>

</body>
</html>
