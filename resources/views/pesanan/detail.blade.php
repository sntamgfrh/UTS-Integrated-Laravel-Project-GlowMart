<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Inventory Sales</title>

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
            margin-bottom: 22px;
            box-shadow: 0 5px 18px #4356410A;
        }

        .panel h2 {
            font-size: 19px;
            color: #354335;
            margin-bottom: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .label {
            font-size: 12px;
            color: #82917B;
            margin-bottom: 7px;
        }

        .value {
            font-size: 13px;
            color: #435641;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 550px;
        }

        th {
            background: #F5F5E9;
            color: #435641;
            font-size: 12px;
            text-align: left;
            padding: 15px 13px;
        }

        td {
            padding: 15px 13px;
            font-size: 12px;
            color: #435641;
            border-bottom: 1px solid #EDF1E3;
        }

        tbody tr:hover {
            background: #FAFBF6;
        }

        .total {
            text-align: right;
            margin-top: 22px;
            color: #435641;
            font-size: 19px;
            font-weight: bold;
        }

        .status-form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
        }

        select {
            padding: 12px;
            border: 1px solid #E0E7D4;
            border-radius: 9px;
            background: #FFFFFF;
            color: #435641;
            font-size: 12px;
            min-width: 220px;
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
            cursor: pointer;
        }

        .btn-back {
            background: #EDF1E3;
            color: #435641;
        }

        .alert {
            background: #E3EFDA;
            color: #435F36;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .error {
            color: #963F32;
            margin-top: 12px;
            font-size: 12px;
        }

        .footer {
            text-align: center;
            padding: 25px 10px;
            color: #82917B;
            font-size: 11px;
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

            .info-grid {
                grid-template-columns: 1fr;
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
            @if(auth()->user()->isAdmin())
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
               class="menu-link {{ request()->routeIs('pesanan.*') ? 'active' : '' }}">
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
                <h1>Detail Pesanan</h1>
                <p class="subtitle">
                    Informasi lengkap pesanan pembeli.
                </p>
            </div>

            <div class="user">
                {{ auth()->user()->name ?? 'Pengguna' }}
            </div>
        </header>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <section class="panel">
            <h2>Informasi Pesanan</h2>

            <div class="info-grid">
                <div>
                    <div class="label">Kode Pesanan</div>
                    <div class="value">{{ $pesanan->kode_pesanan }}</div>
                </div>

                <div>
                    <div class="label">Tanggal Pesanan</div>
                    <div class="value">{{ $pesanan->created_at->format('d-m-Y H:i') }}</div>
                </div>

                <div>
                    <div class="label">Nama Pembeli</div>
                    <div class="value">{{ $pesanan->user->name ?? '-' }}</div>
                </div>

                <div>
                    <div class="label">Nama Penerima</div>
                    <div class="value">{{ $pesanan->nama_penerima }}</div>
                </div>

                <div>
                    <div class="label">Nomor Telepon</div>
                    <div class="value">{{ $pesanan->no_telepon }}</div>
                </div>

                <div>
                    <div class="label">Metode Pembayaran</div>
                    <div class="value">{{ $pesanan->metode_pembayaran }}</div>
                </div>

                <div>
                    <div class="label">Alamat Pengiriman</div>
                    <div class="value">{{ $pesanan->alamat }}</div>
                </div>

                <div>
                    <div class="label">Catatan</div>
                    <div class="value">{{ $pesanan->catatan ?: '-' }}</div>
                </div>

                <div>
                    <div class="label">Status Saat Ini</div>
                    <div class="value">{{ $pesanan->status }}</div>
                </div>
            </div>
        </section>

        <section class="panel">
            <h2>Produk yang Dipesan</h2>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pesanan->detailPesanan as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->produk->nama_produk ?? 'Produk tidak tersedia' }}</td>
                                <td>
                                    Rp {{ number_format((float)$detail->harga_satuan, 0, ',', '.') }}
                                </td>
                                <td>{{ $detail->jumlah }}</td>
                                <td>
                                    Rp {{ number_format((float)$detail->subtotal, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center;padding:25px;">
                                    Tidak ada detail produk pada pesanan ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="total">
                Total Pesanan:
                Rp {{ number_format((float)$pesanan->total_harga, 0, ',', '.') }}
            </div>
        </section>

        <section class="panel">
            <h2>Perbarui Status Pesanan</h2>

            <form action="{{ route('pesanan.update-status', $pesanan->id) }}"
                  method="POST"
                  class="status-form">
                @csrf
                @method('PATCH')

                <select name="status" required>
                    @foreach([
                        'Menunggu Pembayaran',
                        'Diproses',
                        'Dikirim',
                        'Selesai',
                        'Dibatalkan'
                    ] as $status)
                        <option value="{{ $status }}"
                            {{ $pesanan->status === $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn">
                    Simpan Status
                </button>
            </form>

            @error('status')
                <p class="error">{{ $message }}</p>
            @enderror
        </section>

        <a href="{{ route('pesanan.index') }}" class="btn btn-back">
            Kembali ke Daftar Pesanan
        </a>

        <footer class="footer">
            &copy; {{ date('Y') }} Inventory Sales Management System
        </footer>

    </main>

</body>
</html>
