<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - Inventory Sales</title>

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
            border: none;
            cursor: pointer;
            transition: 0.2s;
            white-space: nowrap;
        }

        .btn:hover {
            box-shadow: 0 5px 12px #61745B40;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #F8E5E2;
            color: #9A3D32;
        }

        .btn-small {
            padding: 8px 10px;
            font-size: 11px;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
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

        .status {
            display: inline-block;
            background: #E3EFDA;
            color: #435F36;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .order-form {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 12px;
            font-weight: bold;
            color: #435641;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #DCE4D2;
            border-radius: 9px;
            background: #FFFFFF;
            color: #354335;
            font-size: 13px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .inline-form {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
            margin: 0 0 8px;
        }

        .inline-form select {
            padding: 8px;
            border: 1px solid #DCE4D2;
            border-radius: 7px;
            font-size: 11px;
            color: #435641;
            max-width: 130px;
        }

        .alert-success {
            padding: 13px 16px;
            margin-bottom: 20px;
            background: #E3EFDA;
            border: 1px solid #C9DDBB;
            border-radius: 10px;
            color: #435F36;
            font-size: 13px;
        }

        .alert-error {
            padding: 13px 16px;
            margin-bottom: 20px;
            background: #FFF0D6;
            border: 1px solid #EED7A8;
            border-radius: 10px;
            color: #946319;
            font-size: 12px;
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

        .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 7px;
        }

        .action-buttons form {
            margin: 0;
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

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .panel {
                padding: 16px;
            }

            .order-form {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
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
        @if(auth()->user()->isAdmin())
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

        @if(auth()->user()->isAdmin())
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

        {{-- Hanya satu menu Pesanan --}}
        <a href="{{ route('pesanan-diproses.index') }}"
           class="menu-link {{ request()->routeIs('pesanan-diproses.*') ? 'active' : '' }}">
            <span class="menu-icon">▧</span>
            <span>Pesanan</span>
        </a>

        @if(auth()->user()->isAdmin())
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
            <h1>Pesanan</h1>
            <p class="subtitle">
                Kelola pesanan dalam satu halaman dan perbarui statusnya.
            </p>
        </div>

        <div class="user">{{ auth()->user()->name ?? 'Pengguna' }}</div>
    </header>

    @if(session('success_pesanan'))
        <div class="alert-success">{{ session('success_pesanan') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            <strong>Periksa kembali data berikut:</strong>
            <ul style="margin:8px 0 0 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="panel">
        <div class="panel-header">
            <div>
                <h2>Tambah Pesanan</h2>
                <p>Masukkan data pesanan baru melalui formulir ini.</p>
            </div>
        </div>

        <form action="{{ route('pesanan-diproses.store') }}"
              method="POST" class="order-form">
            @csrf

            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan</label>
                <input type="text" id="nama_pelanggan" name="nama_pelanggan"
                       value="{{ old('nama_pelanggan') }}" maxlength="255" required>
            </div>

            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk"
                       value="{{ old('nama_produk') }}" maxlength="255" required>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah"
                       min="1" value="{{ old('jumlah', 1) }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal_pesanan">Tanggal Pesanan</label>
                <input type="date" id="tanggal_pesanan" name="tanggal_pesanan"
                       value="{{ old('tanggal_pesanan', date('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status Pesanan</label>
                <select id="status" name="status" required>
                    <option value="Menunggu" {{ old('status', 'Menunggu') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Diproses" {{ old('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Dikirim" {{ old('status') == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                    <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="form-group full">
                <label for="catatan">Catatan (Opsional)</label>
                <textarea id="catatan" name="catatan"
                          placeholder="Catatan tambahan pesanan">{{ old('catatan') }}</textarea>
            </div>

            <div class="form-group full">
                <button type="submit" class="btn">Simpan Pesanan</button>
            </div>
        </form>
    </section>

    <section class="panel">
        <div class="panel-header">
            <div>
                <h2>Daftar Pesanan</h2>
                <p>Semua pesanan ditampilkan dalam satu halaman.</p>
            </div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse(($daftarPesananDiproses ?? collect()) as $pesanan)
                        @php
                            $sumberPesanan = $pesanan->sumber_pesanan ?? 'manual';
                            $tanggalPesanan = $pesanan->tanggal_pesanan
                                ?? $pesanan->created_at;
                        @endphp

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->kode_pesanan ?? '-' }}</td>
                            <td>
                                {{ $pesanan->nama_pelanggan
                                    ?? $pesanan->nama_penerima
                                    ?? '-' }}
                            </td>
                            <td>{{ $pesanan->nama_produk ?? '-' }}</td>
                            <td>{{ $pesanan->jumlah ?? '-' }}</td>
                            <td>
                                {{ $tanggalPesanan
                                    ? \Illuminate\Support\Carbon::parse($tanggalPesanan)->format('d-m-Y')
                                    : '-' }}
                            </td>
                            <td>
                                <span class="status">{{ $pesanan->status ?? '-' }}</span>
                            </td>
                            <td>{{ $pesanan->catatan ?: '-' }}</td>

                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('pesanan-diproses.detail', [
                                        'sumber' => $sumberPesanan,
                                        'id' => $pesanan->id,
                                    ]) }}" class="btn btn-small">
                                        Detail
                                    </a>

                                    @if($sumberPesanan === 'manual')
                                        <a href="{{ route('pesanan-diproses.edit', $pesanan->id) }}"
                                           class="btn btn-small">
                                            Edit
                                        </a>

                                        <form action="{{ route('pesanan-diproses.destroy', $pesanan->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-small">
                                                Hapus
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('pesanan-diproses.status-asli', $pesanan->id) }}"
                                              method="POST"
                                              class="inline-form">
                                            @csrf
                                            @method('PATCH')

                                            <select name="status" aria-label="Status pesanan">
                                                <option value="Menunggu" {{ $pesanan->status === 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                <option value="Diproses" {{ $pesanan->status === 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                                <option value="Dikirim" {{ $pesanan->status === 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                                                <option value="Selesai" {{ $pesanan->status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>

                                            <button type="submit" class="btn btn-small">
                                                Simpan Status
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="empty">Belum ada data pesanan.</td>
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
