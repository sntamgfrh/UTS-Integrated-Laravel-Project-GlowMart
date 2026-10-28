<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang Keluar - GlowMart</title>

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
            padding: 25px 15px;
            background: linear-gradient(180deg, #F5F5E9, #E8EDD9, #CBD5B2);
            border-right: 1px solid #DCE4D0;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            margin-bottom: 30px;
            padding: 0 10px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px;
            border-radius: 10px;
            color: #52644B;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .menu-link:hover,
        .menu-link.active {
            background: linear-gradient(135deg, #82966A, #435641);
            color: white;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
            flex-shrink: 0;
        }

        .sidebar-logout {
            margin-top: auto;
            padding-top: 20px;
        }

        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #F5F5E9;
            color: #52644B;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .main {
            margin-left: 230px;
            width: calc(100% - 230px);
            padding: 28px;
        }

        .header {
            margin-bottom: 22px;
        }

        .header h1 {
            font-size: 27px;
            margin-bottom: 7px;
        }

        .header p {
            color: #78856F;
            font-size: 13px;
            line-height: 1.6;
        }

        .panel {
            max-width: 850px;
            background: rgba(255, 255, 255, .94);
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(67, 86, 65, .06);
            padding: 25px;
        }

        .panel h2 {
            font-size: 18px;
            margin-bottom: 6px;
        }

        .subtitle {
            font-size: 12px;
            color: #899481;
            margin-bottom: 22px;
            line-height: 1.6;
        }

        .alert-error {
            background: #FBE8E5;
            color: #8A3D35;
            border: 1px solid #F0C9C2;
            border-radius: 10px;
            padding: 13px 16px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 19px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;
            font-weight: bold;
            color: #52644B;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #DCE4D0;
            border-radius: 9px;
            background: #FCFDF9;
            color: #435641;
            font-size: 13px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #82966A;
            box-shadow: 0 0 0 3px rgba(130, 150, 106, .12);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .help {
            font-size: 11px;
            color: #899481;
            line-height: 1.5;
        }

        .stock-info {
            background: #F1F4E9;
            border: 1px solid #E0E7D4;
            border-radius: 9px;
            padding: 12px;
            color: #52644B;
            font-size: 13px;
            line-height: 1.7;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 17px;
            border: none;
            border-radius: 9px;
            background: #61745B;
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background: #435641;
        }

        .btn-cancel {
            background: #EDF1E7;
            color: #52644B;
        }

        .btn-cancel:hover {
            background: #DCE4D0;
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

            .sidebar-logout {
                margin-top: 12px;
                padding-top: 8px;
            }

            .main {
                margin-left: 0;
                width: 100%;
                padding: 20px 14px;
            }

            .header h1 {
                font-size: 23px;
            }

            .panel {
                padding: 17px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();
@endphp

<aside class="sidebar">
    <div class="brand">🌿 GlowMart</div>

    <nav class="menu">
        @if($user && $user->isAdmin())
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
            <span>Transaksi</span>
        </a>

        <a href="{{ route('pesanan-diproses.index') }}"
               class="menu-link {{ request()->routeIs('dashboard') && request()->get('bagian') === 'pesanan' ? 'active' : '' }}">
                <span class="menu-icon">▧</span>
                <span>Pesanan</span>
                 </a>

        @if($user && $user->isAdmin())
            <a href="{{ route('laporan.index') }}"
               class="menu-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                <span class="menu-icon">▥</span>
                <span>Laporan</span>
            </a>
        @endif
    </nav>

    <form action="{{ route('logout') }}" method="POST" class="sidebar-logout">
        @csrf
        <button type="submit" class="logout-button">
            <span class="menu-icon">⇥</span>
            <span>Logout</span>
        </button>
    </form>
</aside>

<main class="main">

    <header class="header">
        <h1>↑ Tambah Barang Keluar</h1>
        <p>Lengkapi data pengeluaran stok produk GlowMart.</p>
    </header>

    @if($errors->any())
        <div class="alert-error">
            <strong>Periksa kembali data berikut:</strong>
            <ul style="margin: 8px 0 0 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="panel">
        <h2>Formulir Barang Keluar</h2>
        <p class="subtitle">
            Stok produk akan berkurang setelah pencatatan berhasil disimpan.
            Pastikan produk dan jumlah yang dipilih sudah benar.
        </p>

        <form action="{{ route('barang-keluar.store') }}" method="POST">
            @csrf

            <div class="form-grid">

                <div class="form-group full">
                    <label for="produk_id">Pilih Produk *</label>

                    <select name="produk_id" id="produk_id" required>
                        <option value="">-- Pilih Produk --</option>

                        @foreach($produks as $produk)
                            <option
                                value="{{ $produk->id }}"
                                data-stok="{{ $produk->stok }}"
                                {{ old('produk_id') == $produk->id ? 'selected' : '' }}
                            >
                                {{ $produk->kode_produk }} -
                                {{ $produk->nama_produk }}
                                (Stok: {{ $produk->stok }})
                            </option>
                        @endforeach
                    </select>

                    <div class="stock-info" id="info-stok">
                        Pilih produk untuk melihat stok yang tersedia.
                    </div>
                </div>

                <div class="form-group">
                    <label for="tanggal_keluar">Tanggal Keluar *</label>
                    <input
                        type="date"
                        id="tanggal_keluar"
                        name="tanggal_keluar"
                        value="{{ old('tanggal_keluar', now()->format('Y-m-d')) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah Keluar *</label>
                    <input
                        type="number"
                        id="jumlah"
                        name="jumlah"
                        value="{{ old('jumlah') }}"
                        min="1"
                        step="1"
                        required
                        placeholder="Contoh: 3"
                    >
                    <span class="help">
                        Jumlah tidak boleh melebihi stok tersedia.
                    </span>
                </div>

                <div class="form-group full">
                    <label for="alasan">Alasan Barang Keluar *</label>

                    <select name="alasan" id="alasan" required>
                        <option value="">-- Pilih Alasan --</option>
                        @foreach([
                            'Rusak',
                            'Kedaluwarsa',
                            'Hilang',
                            'Pemakaian Internal',
                            'Lainnya'
                        ] as $alasan)
                            <option
                                value="{{ $alasan }}"
                                {{ old('alasan') === $alasan ? 'selected' : '' }}
                            >
                                {{ $alasan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group full">
                    <label for="catatan">Catatan Tambahan</label>
                    <textarea
                        name="catatan"
                        id="catatan"
                        maxlength="1000"
                        placeholder="Contoh: 2 produk rusak saat pemeriksaan stok."
                    >{{ old('catatan') }}</textarea>
                    <span class="help">Opsional, maksimal 1.000 karakter.</span>
                </div>

            </div>

            <div class="actions">
                <button type="submit" class="btn">
                    Simpan Barang Keluar
                </button>

                <a href="{{ route('barang-keluar.index') }}"
                   class="btn btn-cancel">
                    Batal
                </a>
            </div>
        </form>
    </section>

</main>

<script>
    const produkSelect = document.getElementById('produk_id');
    const infoStok = document.getElementById('info-stok');
    const jumlahInput = document.getElementById('jumlah');

    function tampilkanStok() {
        const pilihan = produkSelect.options[produkSelect.selectedIndex];

        if (!pilihan || !pilihan.value) {
            infoStok.textContent =
                'Pilih produk untuk melihat stok yang tersedia.';
            jumlahInput.removeAttribute('max');
            return;
        }

        const stok = Number(pilihan.dataset.stok || 0);

        infoStok.textContent = 'Stok tersedia: ' + stok + ' unit.';
        jumlahInput.max = stok;
    }

    produkSelect.addEventListener('change', tampilkanStok);
    tampilkanStok();
</script>

</body>
</html>
