<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pesanan - Inventory Sales</title>

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
        body { min-height: 100vh; background: linear-gradient(135deg, #F7F8F1, #F5F5E9, #EDF1E3); color: #354335; }
        .sidebar { width: 230px; height: 100vh; position: fixed; top: 0; left: 0; padding: 25px 16px; overflow-y: auto; background: linear-gradient(180deg, #F5F5E9, #E8EDD9, #CBD5B2); border-right: 1px solid #E0E7D4; }
        .brand { text-align: center; font-size: 25px; font-weight: bold; color: #435641; margin: 5px 0 35px; }
        .brand span { display: block; font-size: 12px; font-weight: normal; margin-top: 7px; color: #61745B; }
        .menu-title { margin: 22px 12px 10px; font-size: 11px; font-weight: bold; color: #61745B; letter-spacing: 1px; text-transform: uppercase; }
        .menu-link { display: flex; align-items: center; gap: 10px; padding: 12px; margin-bottom: 7px; border-radius: 10px; text-decoration: none; color: #435641; font-size: 14px; transition: 0.25s; }
        .menu-icon { width: 20px; text-align: center; flex-shrink: 0; }
        .menu-link:hover { background: #FFFFFF; transform: translateX(3px); }
        .menu-link.active { background: linear-gradient(135deg, #82966A, #61745B, #435641); color: #FFFFFF; box-shadow: 0 5px 12px #61745B30; font-weight: bold; }
        .logout-button { width: 100%; border: none; background: transparent; text-align: left; cursor: pointer; }
        .main { margin-left: 230px; padding: 30px; }
        .topbar { display: flex; justify-content: space-between; align-items: center; gap: 20px; background: #FFFFFF; border: 1px solid #E0E7D4; border-radius: 16px; padding: 22px 25px; margin-bottom: 28px; box-shadow: 0 5px 18px #4356410A; }
        .topbar h1 { color: #354335; font-size: 27px; margin-bottom: 8px; }
        .subtitle { font-size: 13px; color: #61745B; }
        .user { background: #F5F5E9; border: 1px solid #E0E7D4; color: #435641; border-radius: 12px; padding: 12px 16px; font-size: 13px; white-space: nowrap; }
        .panel { background: #FFFFFF; border: 1px solid #E0E7D4; border-radius: 16px; padding: 24px; box-shadow: 0 5px 18px #4356410A; }
        .panel-header { display: flex; justify-content: space-between; align-items: center; gap: 15px; flex-wrap: wrap; margin-bottom: 22px; }
        .panel-header h2 { font-size: 19px; color: #354335; }
        .panel-header p { margin-top: 7px; font-size: 12px; color: #82917B; }
        .search-form { display: flex; gap: 8px; flex-wrap: wrap; }
        input, select { padding: 10px 11px; border: 1px solid #E0E7D4; border-radius: 9px; color: #435641; font-size: 12px; }
        input { min-width: 240px; }
        .btn { display: inline-block; background: linear-gradient(135deg, #82966A, #61745B, #435641); color: #FFFFFF; text-decoration: none; padding: 11px 16px; border: none; border-radius: 9px; font-size: 12px; font-weight: bold; cursor: pointer; transition: 0.2s; white-space: nowrap; }
        .btn:hover { box-shadow: 0 5px 12px #61745B40; transform: translateY(-2px); }
        .btn-reset { background: #EDF1E3; color: #435641; }
        .table-wrap { width: 100%; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 1100px; }
        th { background: #F5F5E9; color: #435641; font-size: 12px; font-weight: bold; text-align: left; padding: 15px 13px; white-space: nowrap; }
        td { padding: 15px 13px; font-size: 12px; color: #435641; border-bottom: 1px solid #EDF1E3; vertical-align: middle; }
        tbody tr:hover { background: #FAFBF6; }
        .badge { display: inline-block; background: #EDF1E3; color: #435641; padding: 6px 10px; border-radius: 20px; font-size: 11px; font-weight: bold; white-space: nowrap; }
        .badge-selesai { background: #E3EFDA; color: #435F36; }
        .badge-batal { background: #F8E3DE; color: #963F32; }
        .badge-proses { background: #FFF0D6; color: #946319; }
        .status-form { display: flex; flex-direction: column; gap: 7px; min-width: 175px; }
        .status-form select { width: 100%; background: #FFFFFF; }
        .status-form button { width: 100%; }
        .alert { background: #E3EFDA; color: #435F36; border: 1px solid #CBDDBE; padding: 13px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 13px; }
        .alert-error { background: #F8E3DE; color: #963F32; border-color: #EBC9C1; }
        .empty { text-align: center; padding: 30px; color: #82917B; }
        .pagination { margin-top: 22px; font-size: 12px; }
        .footer { text-align: center; padding: 25px 10px; color: #82917B; font-size: 11px; }

        @media (max-width: 900px) {
            .sidebar { position: relative; width: 100%; height: auto; }
            .main { margin-left: 0; padding: 16px; }
            .topbar { align-items: flex-start; flex-direction: column; }
            .user { white-space: normal; }
            .panel { padding: 16px; }
            .panel-header { align-items: flex-start; flex-direction: column; }
            .search-form { width: 100%; }
            input { min-width: 0; width: 100%; }
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

        <form action="{{ route('logout') }}" method="POST">
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
            <h1>Manajemen Pesanan</h1>
            <p class="subtitle">Kelola seluruh pesanan pembeli dari pembayaran hingga selesai.</p>
        </div>

        <div class="user">{{ $user->name ?? 'Pengguna' }}</div>
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

    <section class="panel">
        <div class="panel-header">
            <div>
                <h2>Daftar Pesanan</h2>
                <p>Perbarui status pesanan sesuai proses pengiriman.</p>
            </div>

            <form action="{{ route('pesanan.index') }}" method="GET" class="search-form">
                <input
                    type="text"
                    name="cari"
                    placeholder="Cari kode atau nama penerima..."
                    value="{{ request('cari') }}"
                >
                <button type="submit" class="btn">Cari</button>
                <a href="{{ route('pesanan.index') }}" class="btn btn-reset">Reset</a>
            </form>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Pesanan</th>
                        <th>Pembeli</th>
                        <th>Penerima</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Pembayaran</th>
                        <th>Status Saat Ini</th>
                        <th>Ubah Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pesanans as $pesanan)
                        <tr>
                            <td>{{ $pesanans->firstItem() + $loop->index }}</td>
                            <td>{{ $pesanan->kode_pesanan }}</td>
                            <td>{{ $pesanan->user->name ?? '-' }}</td>
                            <td>{{ $pesanan->nama_penerima }}</td>
                            <td>
                                {{ $pesanan->created_at ? $pesanan->created_at->format('d-m-Y H:i') : '-' }}
                            </td>
                            <td>
                                Rp {{ number_format((float) $pesanan->total_harga, 0, ',', '.') }}
                            </td>
                            <td>{{ $pesanan->metode_pembayaran }}</td>

                            <td>
                                @php
                                    $badgeClass = match($pesanan->status) {
                                        'Selesai' => 'badge-selesai',
                                        'Dibatalkan' => 'badge-batal',
                                        'Diproses', 'Dikirim' => 'badge-proses',
                                        default => '',
                                    };
                                @endphp

                                <span class="badge {{ $badgeClass }}">
                                    {{ $pesanan->status }}
                                </span>
                            </td>

                            <td>
                                @if(!in_array($pesanan->status, ['Selesai', 'Dibatalkan']))
                                    <form
                                        class="status-form"
                                        action="{{ route('pesanan.update-status', $pesanan->id) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <select name="status" required>
                                            <option value="Menunggu Pembayaran" {{ $pesanan->status === 'Menunggu Pembayaran' ? 'selected' : '' }}>
                                                Menunggu Pembayaran
                                            </option>
                                            <option value="Diproses" {{ $pesanan->status === 'Diproses' ? 'selected' : '' }}>
                                                Diproses
                                            </option>
                                            <option value="Dikirim" {{ $pesanan->status === 'Dikirim' ? 'selected' : '' }}>
                                                Dikirim / Dalam Perjalanan
                                            </option>
                                            <option value="Selesai" {{ $pesanan->status === 'Selesai' ? 'selected' : '' }}>
                                                Selesai
                                            </option>
                                            <option value="Dibatalkan">Dibatalkan</option>
                                        </select>

                                        <button type="submit" class="btn">Simpan Status</button>
                                    </form>
                                @else
                                    <span class="badge">Status Final</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('pesanan.show', $pesanan->id) }}" class="btn">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="empty">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">{{ $pesanans->links() }}</div>
    </section>

    <footer class="footer">
        &copy; {{ date('Y') }} Inventory Sales Management System
    </footer>
</main>

</body>
</html>
