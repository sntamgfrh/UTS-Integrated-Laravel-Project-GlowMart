<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk - GlowMart</title>

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
            width: calc(100% - 230px);
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
            padding: 24px;
            box-shadow: 0 5px 18px #4356410A;
            min-width: 0;
            margin-bottom: 24px;
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
            border: none;
            border-radius: 9px;
            font-size: 12px;
            font-weight: bold;
            transition: 0.2s;
            white-space: nowrap;
            cursor: pointer;
        }

        .btn:hover {
            box-shadow: 0 5px 12px #61745B40;
            transform: translateY(-2px);
        }

        .search {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .search input {
            flex: 1 1 240px;
            width: 100%;
            min-width: 0;
            max-width: 390px;
            height: 42px;
            padding: 0 13px;
            border: 1px solid #D5DFC3;
            border-radius: 9px;
            background: #FFFFFF;
            color: #354335;
            font-size: 13px;
            outline: none;
        }

        .search input:focus {
            border-color: #82966A;
            box-shadow: 0 0 0 3px #82966A20;
        }

        .search button {
            height: 42px;
        }

        .reset {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 0 10px;
            border-radius: 8px;
            color: #61745B;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
        }

        .reset:hover {
            background: #E8EDD9;
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
            min-width: 600px;
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
            padding: 14px 13px;
            font-size: 12px;
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

        th:first-child,
        td:first-child {
            width: 55px;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            white-space: nowrap;
        }

        .actions form {
            margin: 0;
        }

        .icon-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 48px;
            height: 32px;
            padding: 0 9px;
            border: none;
            border-radius: 8px;
            font-size: 11px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .edit-btn {
            background: #E3EFDA;
            color: #435F36;
        }

        .edit-btn:hover {
            background: #D0E2C4;
        }

        .delete-btn {
            background: #FCE8E6;
            color: #873D37;
        }

        .delete-btn:hover {
            background: #F5D2CF;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #82917B;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            max-width: 100%;
            margin-top: 20px;
            overflow-x: auto;
        }

        .footer {
            text-align: center;
            padding: 25px 10px;
            color: #82917B;
            font-size: 11px;
        }

        @media (max-width: 1100px) {
            .main {
                padding: 24px;
            }

            .panel {
                padding: 20px;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
            }

            .main {
                margin-left: 0;
                width: 100%;
                padding: 16px;
            }

            .topbar,
            .panel-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .user {
                white-space: normal;
            }

            .search input {
                flex-basis: 100%;
                max-width: 100%;
            }

            .search button {
                flex: 1;
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
    @endphp

    <aside class="sidebar">
        <div class="brand">
            Inventory Sales
            <span>Inventory &amp; Sales Management</span>
        </div>

        <div class="menu-title">Menu Utama</div>

        <nav>
            @auth
                @if($user->isAdmin())
                    <a href="{{ route('dashboard') }}"
                       class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <span class="menu-icon">▦</span>
                        <span>Dashboard</span>
                    </a>
                @elseif($user->isStaff())
                    <a href="{{ route('staff.dashboard') }}"
                       class="menu-link {{ request()->routeIs('staff.dashboard') ? 'active' : '' }}">
                        <span class="menu-icon">▦</span>
                        <span>Dashboard</span>
                    </a>
                @endif
            @endauth

            <a href="{{ route('produk.index') }}"
               class="menu-link {{ request()->routeIs('produk.*') ? 'active' : '' }}">
                <span class="menu-icon">▣</span>
                <span>Data Produk</span>
            </a>

            @if($user && $user->isAdmin())
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

            @if($user && $user->isAdmin())
                <a href="{{ route('laporan.index') }}"
                   class="menu-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                    <span class="menu-icon">▥</span>
                    <span>Laporan</span>
                </a>
            @elseif($user && $user->isStaff())
                <a href="{{ route('staff.laporan') }}"
                   class="menu-link {{ request()->routeIs('staff.laporan') ? 'active' : '' }}">
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
                <h1>Data Produk</h1>
                <p class="subtitle">
                    Lihat dan pantau data produk GlowMart.
                </p>
            </div>

            <div class="user">
                {{ $user->name ?? 'Pengguna' }}
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
                <div>
                    <h2>Daftar Produk</h2>
                    <p>Data seluruh produk yang terdaftar dalam sistem.</p>
                </div>

                @if($user && $user->isAdmin())
                    <a href="{{ route('produk.create') }}" class="btn">
                        + Tambah Produk
                    </a>
                @endif
            </div>

            <form action="{{ route('produk.index') }}"
                  method="GET"
                  class="search">

                <input
                    type="text"
                    name="cari"
                    placeholder="Cari kode, nama, atau merek..."
                    value="{{ request('cari') }}"
                >

                <button type="submit" class="btn">Cari</button>

                <a href="{{ route('produk.index') }}" class="reset">
                    Reset
                </a>
            </form>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Merek</th>
                            <th>Harga</th>
                            <th>Stok</th>

                            @if($user && $user->isAdmin())
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($produks as $produk)
                            <tr>
                                <td>
                                    {{ method_exists($produks, 'firstItem') ? $produks->firstItem() + $loop->index : $loop->iteration }}
                                </td>

                                <td>{{ $produk->kode_produk }}</td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->merek }}</td>

                                <td>
                                    Rp {{ number_format((float) $produk->harga, 0, ',', '.') }}
                                </td>

                                <td>{{ $produk->stok }}</td>

                                @if($user && $user->isAdmin())
                                    <td>
                                        <div class="actions">
                                            <a href="{{ route('produk.edit', $produk->id) }}"
                                               class="icon-btn edit-btn">
                                                Edit
                                            </a>

                                            <form action="{{ route('produk.destroy', $produk->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="icon-btn delete-btn">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ $user && $user->isAdmin() ? 7 : 6 }}"
                                    class="empty">
                                    Belum ada produk yang terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($produks, 'links'))
                <div class="pagination">
                    {{ $produks->withQueryString()->links() }}
                </div>
            @endif
        </section>

        <footer class="footer">
            &copy; {{ date('Y') }} GlowMart
        </footer>
    </main>
</body>
</html>
