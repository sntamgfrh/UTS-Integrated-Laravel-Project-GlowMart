<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier - GlowMart</title>

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
            padding-left: 20px;
        }

        .panel {
            width: 100%;
            padding: 25px;
            background: #FFFFFF;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(67, 86, 65, 0.05);
            overflow-x: auto;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 22px;
        }

        .search-form {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 9px;
            flex: 1;
            min-width: 0;
        }

        .search-form input {
            flex: 1;
            width: 250px;
            max-width: 400px;
            min-width: 160px;
            height: 43px;
            padding: 0 14px;
            border: 1px solid #CBD5B2;
            border-radius: 9px;
            background: #FFFFFF;
            color: #354335;
            outline: none;
            font-size: 14px;
        }

        .search-form input:focus {
            border-color: #82966A;
            box-shadow: 0 0 0 3px rgba(130, 150, 106, 0.13);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 42px;
            padding: 10px 14px;
            border: none;
            border-radius: 9px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
            transition: 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #82966A, #61745B);
            color: #FFFFFF;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #71865C, #435641);
        }

        .btn-reset,
        .btn-edit {
            background: #E8EDD9;
            color: #435641;
        }

        .btn-reset:hover,
        .btn-edit:hover {
            background: #CBD5B2;
        }

        .btn-delete {
            background: #FCE8E6;
            color: #873D37;
        }

        .btn-delete:hover {
            background: #F5D2CF;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #E0E7D4;
            border-radius: 10px;
        }

        table {
            width: 100%;
            min-width: 950px;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #E0E7D4;
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
            overflow-wrap: anywhere;
        }

        tbody tr:hover {
            background: #F7F8F1;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
            white-space: nowrap;
        }

        .actions form {
            margin: 0;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            margin-top: 22px;
            overflow-x: auto;
        }

        .pagination nav p {
            margin-bottom: 10px;
        }

        .pagination nav div:first-child {
            margin-bottom: 10px;
        }

        .pagination nav span,
        .pagination nav a {
            font-size: 13px;
        }

        .pagination nav a {
            color: #435641;
        }

        .pagination nav a:hover {
            background: #E8EDD9;
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
                padding: 16px;
            }

            .toolbar {
                flex-direction: column;
                align-items: stretch;
            }

            .search-form {
                width: 100%;
            }

            .search-form input {
                flex-basis: 100%;
                width: 100%;
                max-width: 100%;
            }

            .search-form .btn {
                flex: 1;
            }

            .toolbar > .btn-primary {
                align-self: flex-start;
            }

            .actions {
                flex-wrap: wrap;
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

            <a href="{{ route('transaksi-penjualan.index') }}"
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
               class="menu-link {{ request()->routeIs('dashboard') && request()->get('bagian') === 'pesanan-diproses' ? 'active' : '' }}">
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
        </nav>

        <div class="menu-title">Akun</div>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-button">
                <span class="menu-icon">↪</span>
                <span>Logout</span>
            </button>
        </form>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <h1>Data Supplier</h1>
                <p>Kelola informasi pemasok produk dengan mudah.</p>
            </div>

            <div class="user-info">
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
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="panel">

            <div class="toolbar">
                <form action="{{ route('supplier.index') }}"
                      method="GET"
                      class="search-form">

                    <input
                        type="text"
                        name="cari"
                        placeholder="Cari kode, nama, atau telepon supplier..."
                        value="{{ $cari ?? request('cari') }}"
                    >

                    <button type="submit" class="btn btn-primary">
                        Cari
                    </button>

                    <a href="{{ route('supplier.index') }}"
                       class="btn btn-reset">
                        Reset
                    </a>
                </form>

                <a href="{{ route('supplier.create') }}"
                   class="btn btn-primary">
                    + Tambah Supplier
                </a>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Nama Kontak</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($suppliers as $supplier)
                            <tr>
                                <td>
                                    {{ method_exists($suppliers, 'firstItem')
                                        ? $suppliers->firstItem() + $loop->index
                                        : $loop->iteration }}
                                </td>

                                <td>{{ $supplier->kode_supplier }}</td>
                                <td>{{ $supplier->nama_supplier }}</td>
                                <td>{{ $supplier->nama_kontak ?: '-' }}</td>
                                <td>{{ $supplier->telepon ?: '-' }}</td>
                                <td>{{ $supplier->email ?: '-' }}</td>
                                <td>{{ $supplier->alamat ?: '-' }}</td>

                                <td>
                                    <div class="actions">
                                        <a href="{{ route('supplier.edit', $supplier->id) }}"
                                           class="btn btn-edit">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('supplier.destroy', $supplier->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus supplier ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-delete">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align:center;padding:30px;">
                                    Belum ada data supplier.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($suppliers, 'links'))
                <div class="pagination">
                    {{ $suppliers->withQueryString()->links() }}
                </div>
            @endif

        </section>
    </main>

</body>
</html>
