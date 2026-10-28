<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan - Inventory Sales</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #F7F8F1, #F5F5E9, #EDF1E3);
            color: #435641;
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 230px;
            height: 100vh;
            padding: 25px 16px;
            overflow-y: auto;
            background: linear-gradient(180deg, #F5F5E9, #E8EDD9, #CBD5B2);
            border-right: 1px solid #E0E7D4;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
            margin-bottom: 35px;
            padding: 0 8px;
            color: #435641;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px 12px;
            margin-bottom: 8px;
            color: #435641;
            text-decoration: none;
            border-radius: 10px;
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
            font-weight: bold;
            box-shadow: 0 5px 12px #61745B30;
        }

        .menu-title {
            margin: 22px 12px 10px;
            font-size: 11px;
            font-weight: bold;
            color: #61745B;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .logout-form {
            margin-top: 20px;
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

        .card {
            max-width: 850px;
            background: #FFFFFF;
            padding: 28px;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(67, 86, 65, 0.07);
        }

        h1 {
            font-size: 26px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #71806B;
            margin-bottom: 25px;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .form-group {
            margin-bottom: 18px;
            min-width: 0;
        }

        .full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 13px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #D8DFCC;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            background: #FFFFFF;
            color: #435641;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #82966A;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            background: #61745B;
            color: #FFFFFF;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            transition: 0.2s;
        }

        .btn:hover {
            background: #435641;
        }

        .btn-cancel {
            background: #E8EDD9;
            color: #435641;
        }

        .btn-cancel:hover {
            background: #CBD5B2;
        }

        .error {
            color: #B33A3A;
            font-size: 12px;
            margin-top: 6px;
        }

        .alert {
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 8px;
            background: #FCE8E8;
            color: #8A3030;
        }

        .alert-success {
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 8px;
            background: #E3EFDA;
            color: #435F36;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 8px;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        Inventory Sales
    </div>

    <div class="menu-title">Menu Utama</div>

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

    {{-- Menu pesanan hanya satu --}}
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

        <a href="{{ route('users.index') }}"
           class="menu-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <span class="menu-icon">♙</span>
            <span>Manajemen User</span>
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
</aside>

<main class="main">
    <section class="card">
        <h1>Tambah Pesanan</h1>
        <p class="subtitle">
            Isi informasi pesanan di bawah ini.
        </p>

        @if(session('success_pesanan'))
            <div class="alert-success">
                {{ session('success_pesanan') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert">
                <strong>Periksa kembali data berikut:</strong>
                <ul style="padding-left: 20px; margin-top: 8px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pesanan-diproses.store') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input
                        type="text"
                        id="nama_pelanggan"
                        name="nama_pelanggan"
                        value="{{ old('nama_pelanggan') }}"
                        maxlength="255"
                        required
                    >
                    @error('nama_pelanggan')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input
                        type="text"
                        id="nama_produk"
                        name="nama_produk"
                        value="{{ old('nama_produk') }}"
                        maxlength="255"
                        required
                    >
                    @error('nama_produk')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input
                        type="number"
                        id="jumlah"
                        name="jumlah"
                        min="1"
                        value="{{ old('jumlah', 1) }}"
                        required
                    >
                    @error('jumlah')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_pesanan">Tanggal Pesanan</label>
                    <input
                        type="date"
                        id="tanggal_pesanan"
                        name="tanggal_pesanan"
                        value="{{ old('tanggal_pesanan', date('Y-m-d')) }}"
                        required
                    >
                    @error('tanggal_pesanan')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status Pesanan</label>
                    <select id="status" name="status" required>
                        <option value="Menunggu"
                            {{ old('status', 'Menunggu') === 'Menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>
                        <option value="Diproses"
                            {{ old('status') === 'Diproses' ? 'selected' : '' }}>
                            Diproses
                        </option>
                        <option value="Dikirim"
                            {{ old('status') === 'Dikirim' ? 'selected' : '' }}>
                            Dikirim
                        </option>
                        <option value="Selesai"
                            {{ old('status') === 'Selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>
                    </select>
                    @error('status')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group full">
                    <label for="catatan">Catatan (Opsional)</label>
                    <textarea
                        id="catatan"
                        name="catatan"
                        placeholder="Catatan tambahan pesanan"
                    >{{ old('catatan') }}</textarea>
                    @error('catatan')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="actions">
                <button type="submit" class="btn">
                    Simpan Pesanan
                </button>

                <a href="{{ route('pesanan-diproses.index') }}"
                   class="btn btn-cancel">
                    Kembali
                </a>
            </div>
        </form>
    </section>
</main>

</body>
</html>
