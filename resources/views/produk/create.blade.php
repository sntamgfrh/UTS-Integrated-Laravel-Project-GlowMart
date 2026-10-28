<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - GlowMart</title>

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

        /* SIDEBAR SAMA DENGAN DASHBOARD */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            width: 230px;
            height: 100vh;
            padding: 28px 16px;
            overflow-y: auto;
            background: linear-gradient(180deg, #F5F5E9, #E8EDD9, #CBD5B2);
            color: #435641;
            border-right: 1px solid #E0E7D4;
            box-shadow: 4px 0 20px rgba(67, 86, 65, 0.08);
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 24px;
            font-weight: 800;
            color: #435641;
            margin: 0 0 28px;
            padding: 0 8px;
            white-space: nowrap;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 13px 12px;
            border-radius: 12px;
            color: #435641;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.2s ease, color 0.2s ease,
                        transform 0.2s ease;
        }

        .menu-icon {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 24px;
            flex-shrink: 0;
            font-size: 19px;
        }

        .menu-link:hover {
            color: #435641;
            background: #FFFFFF;
            transform: translateX(2px);
        }

        .menu-link.active {
            color: #FFFFFF;
            background: linear-gradient(135deg, #82966A, #61745B, #435641);
            box-shadow: 0 5px 14px rgba(67, 86, 65, 0.2);
            font-weight: 600;
        }

        .sidebar-logout {
            margin-top: auto;
            padding-top: 24px;
        }

        .logout-button {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 13px 12px;
            border: 1px solid #CBD5B2;
            border-radius: 12px;
            color: #435641;
            background: #E8EDD9;
            font-size: 14px;
            text-align: left;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .logout-button:hover {
            background: #CBD5B2;
        }

        /* KONTEN UTAMA */
        .main {
            margin-left: 230px;
            width: calc(100% - 230px);
            max-width: calc(100% - 230px);
            min-height: 100vh;
            padding: 24px;
            overflow-x: hidden;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .header h1 {
            color: #435641;
            font-size: 28px;
            margin-bottom: 7px;
        }

        .header p {
            color: #61745B;
            font-size: 14px;
            line-height: 1.6;
        }

        .user-role {
            display: inline-block;
            margin-top: 9px;
            padding: 5px 10px;
            border-radius: 20px;
            background: #E8EDD9;
            color: #435641;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .breadcrumb {
            margin-bottom: 10px;
            color: #61745B;
            font-size: 13px;
        }

        /* PANEL FORM */
        .panel {
            width: 100%;
            max-width: 100%;
            padding: 25px;
            background: linear-gradient(145deg, #FFFFFF, #F5F5E9);
            border: 1px solid #E0E7D4;
            border-radius: 16px;
            box-shadow: 0 5px 18px rgba(67, 86, 65, 0.08);
        }

        .panel h2 {
            margin-bottom: 8px;
            color: #435641;
            font-size: 20px;
        }

        .panel-description {
            margin-bottom: 25px;
            color: #61745B;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .form-group {
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 9px;
            color: #435641;
            font-size: 14px;
            font-weight: 600;
        }

        .required {
            color: #61745B;
        }

        input,
        select,
        textarea {
            display: block;
            width: 100%;
            padding: 12px;
            border: 1px solid #D5DDC9;
            border-radius: 10px;
            outline: none;
            background: #FFFFFF;
            color: #354335;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #82966A;
            box-shadow: 0 0 0 3px rgba(130, 150, 106, 0.15);
        }

        input::placeholder,
        textarea::placeholder {
            color: #929B8C;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
            line-height: 1.6;
        }

        .field-hint {
            margin-top: 7px;
            color: #71806D;
            font-size: 12px;
            line-height: 1.5;
        }

        /* PESAN VALIDASI */
        .alert {
            margin-bottom: 22px;
            padding: 15px 18px;
            border: 1px solid #F1CACA;
            border-radius: 10px;
            background: #FFF1EF;
            color: #A12B2B;
            font-size: 14px;
            line-height: 1.7;
        }

        .alert ul {
            margin-top: 7px;
            padding-left: 22px;
        }

        .error {
            margin-top: 7px;
            color: #B42318;
            font-size: 13px;
        }

        /* TOMBOL */
        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid #E0E7D4;
        }

        .required-note {
            color: #71806D;
            font-size: 12px;
            line-height: 1.7;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 43px;
            padding: 12px 18px;
            border: 1px solid transparent;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s, background 0.2s;
        }

        .btn-primary {
            color: #FFFFFF;
            background: linear-gradient(135deg, #82966A, #61745B, #435641);
            box-shadow: 0 5px 14px rgba(67, 86, 65, 0.15);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(67, 86, 65, 0.22);
        }

        .btn-secondary {
            border-color: #D5DDC9;
            color: #435641;
            background: #E8EDD9;
        }

        .btn-secondary:hover {
            background: #CBD5B2;
        }

        /* TABLET */
        @media (max-width: 1100px) {
            .main {
                padding: 20px;
            }
        }

        /* HP */
        @media (max-width: 650px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
                padding: 20px 16px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 7px;
            }

            .menu-link {
                padding: 11px 8px;
                font-size: 12px;
                gap: 7px;
            }

            .menu-icon {
                width: 20px;
                font-size: 17px;
            }

            .sidebar-logout {
                margin-top: 15px;
                padding-top: 0;
            }

            .main {
                margin-left: 0;
                width: 100%;
                max-width: 100%;
                padding: 16px;
            }

            .header h1 {
                font-size: 25px;
            }

            .panel {
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-footer {
                align-items: stretch;
                flex-direction: column;
            }

            .actions {
                width: 100%;
            }

            .actions .btn {
                flex: 1;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                transition: none !important;
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

            <div class="menu-title">Akun</div>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="menu-link logout-button">
                    <span class="menu-icon">↪</span>
                    <span>Logout</span>
                
                </button>
            </form>
        </nav>
            </button>
        </form>
    </aside>

    <main class="main">
        <header class="header">
            <div>
                <p class="breadcrumb">Dashboard &nbsp; / &nbsp; Data Produk &nbsp; / &nbsp; Tambah</p>
                <h1>Tambah Produk</h1>
                <p>Tambahkan produk skincare baru ke inventaris GlowMart! ✨</p>

                <span class="user-role">
                    {{ auth()->user()->role }}
                </span>
            </div>
        </header>

        <section class="panel">
            <h2>🧴 Form Tambah Produk</h2>
            <p class="panel-description">
                Lengkapi informasi produk pada kolom di bawah ini.
                Kolom bertanda * wajib diisi.
            </p>

            @if ($errors->any())
                <div class="alert">
                    <strong>Data produk belum dapat disimpan.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('produk.store') }}" method="POST">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label for="kategori_id">Kategori <span class="required">*</span></label>
                        <select name="kategori_id" id="kategori_id" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kode_produk">Kode Produk <span class="required">*</span></label>
                        <input type="text"
                               id="kode_produk"
                               name="kode_produk"
                               value="{{ old('kode_produk') }}"
                               maxlength="30"
                               placeholder="Contoh: GM009"
                               required>
                        @error('kode_produk')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_produk">Nama Produk <span class="required">*</span></label>
                        <input type="text"
                               id="nama_produk"
                               name="nama_produk"
                               value="{{ old('nama_produk') }}"
                               maxlength="150"
                               placeholder="Contoh: Moisturizer"
                               required>
                        @error('nama_produk')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="merek">Merek <span class="required">*</span></label>
                        <input type="text"
                               id="merek"
                               name="merek"
                               value="{{ old('merek') }}"
                               maxlength="100"
                               placeholder="Nama merek produk"
                               required>
                        @error('merek')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga (Rp) <span class="required">*</span></label>
                        <input type="number"
                               id="harga"
                               name="harga"
                               value="{{ old('harga') }}"
                               min="0"
                               step="0.01"
                               placeholder="Contoh: 35000"
                               required>
                        @error('harga')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok <span class="required">*</span></label>
                        <input type="number"
                               id="stok"
                               name="stok"
                               value="{{ old('stok', 0) }}"
                               min="0"
                               placeholder="Jumlah stok"
                               required>
                        @error('stok')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label for="deskripsi">Deskripsi Produk</label>
                        <textarea id="deskripsi"
                                  name="deskripsi"
                                  placeholder="Masukkan deskripsi produk, manfaat, atau informasi tambahan">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-footer">
                    <p class="required-note">
                        <span class="required">*</span> Wajib diisi.<br>
                        Pastikan informasi produk sudah benar sebelum disimpan.
                    </p>

                    <div class="actions">
                        <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                            ← Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            ✓ &nbsp; Simpan Produk
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </main>

</body>
</html>
