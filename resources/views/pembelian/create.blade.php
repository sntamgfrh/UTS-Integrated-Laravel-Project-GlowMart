<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang Masuk - Inventory Sales</title>

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
            line-height: 1.6;
        }

        .user-info {
            color: #435641;
            background: #F5F5E9;
            padding: 11px 15px;
            border-radius: 10px;
            font-size: 13px;
        }

        .incoming-banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 23px;
            margin-bottom: 22px;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            background: linear-gradient(120deg, #E8EDD9, #FFFFFF);
        }

        .incoming-label {
            display: inline-block;
            padding: 6px 10px;
            margin-bottom: 10px;
            border-radius: 7px;
            background: #F5F5E9;
            color: #61745B;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .incoming-banner h2 {
            margin-bottom: 8px;
            color: #435641;
            font-size: 19px;
        }

        .incoming-banner p {
            max-width: 570px;
            color: #61745B;
            font-size: 13px;
            line-height: 1.8;
        }

        .incoming-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            border-radius: 15px;
            background: #82966A;
            color: #FFFFFF;
            font-size: 29px;
            font-weight: bold;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-height: 42px;
            padding: 11px 16px;
            background: linear-gradient(135deg, #82966A, #61745B);
            color: #FFFFFF;
            text-decoration: none;
            border: none;
            border-radius: 9px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            white-space: nowrap;
        }

        .btn:hover {
            background: linear-gradient(135deg, #71865C, #435641);
            transform: translateY(-1px);
        }

        .btn-secondary,
        .btn-detail {
            background: #E8EDD9;
            color: #435641;
        }

        .btn-secondary:hover,
        .btn-detail:hover {
            background: #CBD5B2;
            color: #435641;
        }

        .btn-danger {
            background: #FCE8E6;
            color: #873D37;
        }

        .btn-danger:hover {
            background: #F2D0CB;
            color: #873D37;
        }

        .alert {
            background: #E8F3E3;
            color: #435641;
            border: 1px solid #CBDDC0;
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.6;
        }

        .alert-error {
            background: #FCE8E6;
            color: #873D37;
            border-color: #F2D0CB;
        }

        .alert ul {
            padding-left: 20px;
            margin-top: 8px;
        }

        .panel {
            background: #FFFFFF;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(67, 86, 65, 0.05);
            padding: 25px;
            min-width: 0;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .panel-header h2 {
            color: #435641;
            font-size: 21px;
        }

        .panel-subtitle {
            margin-top: 6px;
            margin-bottom: 22px;
            color: #61745B;
            font-size: 13px;
            line-height: 1.7;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0 20px;
        }

        .field {
            margin-bottom: 18px;
            min-width: 0;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
            color: #435641;
        }

        input,
        select,
        textarea {
            width: 100%;
            min-width: 0;
            padding: 12px;
            border: 1px solid #E0E7D4;
            border-radius: 9px;
            background: #FFFFFF;
            color: #354335;
            font-size: 14px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: 2px solid #CBD5B2;
            border-color: #82966A;
        }

        textarea {
            resize: vertical;
        }

        .hint {
            display: block;
            font-size: 12px;
            color: #61745B;
            margin-top: 6px;
            line-height: 1.7;
        }

        .error {
            color: #873D37;
            font-size: 13px;
            margin-top: 6px;
        }

        .items {
            margin-top: 12px;
            border: 1px solid #E0E7D4;
            border-radius: 12px;
            padding: 20px;
            background: #FFFFFF;
        }

        .items h2 {
            color: #435641;
            font-size: 19px;
            margin-bottom: 8px;
        }

        .item-row {
            display: grid;
            grid-template-columns: minmax(0, 2fr) minmax(90px, 1fr)
                minmax(120px, 1fr) auto;
            gap: 12px;
            align-items: end;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid #E6EBDD;
        }

        .item-row .field {
            margin-bottom: 0;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 19px;
            font-weight: bold;
            color: #435641;
        }

        .required-note {
            color: #61745B;
            font-size: 12px;
            margin-top: 15px;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 24px;
        }

        @media (max-width: 1000px) {
            .item-row {
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
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

            .incoming-banner {
                padding: 17px;
            }

            .incoming-banner h2 {
                font-size: 16px;
            }

            .incoming-icon {
                width: 46px;
                height: 46px;
                font-size: 22px;
            }

            .panel {
                padding: 16px;
            }

            .form-grid,
            .item-row {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }

            .total {
                font-size: 17px;
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

            <div class="menu-title">Transaksi</div>

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

            @if(Route::has('pesanan.index'))
                <a href="{{ route('pesanan.index') }}"
                   class="menu-link {{ request()->routeIs('pesanan.*') ? 'active' : '' }}">
                    <span class="menu-icon">▧</span>
                    <span>Pesanan</span>
                </a>
            @elseif(Route::has('pesanan-diproses.index'))
                <a href="{{ route('pesanan-diproses.index') }}"
                   class="menu-link {{ request()->routeIs('pesanan-diproses.*') ? 'active' : '' }}">
                    <span class="menu-icon">▧</span>
                    <span>Pesanan</span>
                </a>
            @endif

            <div class="menu-title">Lainnya</div>

            @if(auth()->check() && auth()->user()->isAdmin() && Route::has('laporan.index'))
                <a href="{{ route('laporan.index') }}"
                   class="menu-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                    <span class="menu-icon">▥</span>
                    <span>Laporan</span>
                </a>
            @endif

            <div class="menu-title">Akun</div>

            @if(Route::has('logout'))
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="menu-link logout-button">
                        <span class="menu-icon">↪</span>
                        <span>Logout</span>
                    </button>
                </form>
            @endif
        </nav>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <h1>Tambah Barang Masuk</h1>
                <p>Catat pembelian produk dari supplier dan penambahan stok.</p>
            </div>

            <div class="user-info">
                {{ $user->name ?? 'Pengguna' }}
            </div>
        </header>

        <section class="incoming-banner">
            <div>
                <span class="incoming-label">INVENTARIS</span>
                <h2>Catat Stok Masuk dengan Mudah</h2>
                <p>
                    Lengkapi informasi pembelian, pilih supplier, lalu
                    tambahkan produk yang masuk ke persediaan.
                </p>
            </div>

            <div class="incoming-icon">↓</div>
        </section>

        @if(session('success'))
            <div class="alert">
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
                <strong>Periksa kembali data berikut:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="panel">

            <div class="panel-header">
                <div>
                    <h2>Informasi Pembelian</h2>
                    <p class="panel-subtitle">
                        Isi informasi supplier dan produk yang akan ditambahkan ke stok.
                    </p>
                </div>

                <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>

            <form action="{{ route('pembelian.store') }}" method="POST" id="formPembelian">
                @csrf

                <div class="form-grid">
                    <div class="field">
                        <label for="supplier_id">Supplier *</label>
                        <select name="supplier_id" id="supplier_id" required>
                            <option value="">-- Pilih Supplier --</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    @selected(old('supplier_id') == $supplier->id)>
                                    {{ $supplier->nama_supplier }}
                                </option>
                            @endforeach
                        </select>

                        @error('supplier_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="tanggal_pembelian">Tanggal Pembelian *</label>
                        <input
                            type="date"
                            name="tanggal_pembelian"
                            id="tanggal_pembelian"
                            value="{{ old('tanggal_pembelian', date('Y-m-d')) }}"
                            required
                        >

                        @error('tanggal_pembelian')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="catatan">Catatan</label>
                    <textarea
                        name="catatan"
                        id="catatan"
                        rows="3"
                        placeholder="Catatan tambahan (opsional)"
                    >{{ old('catatan') }}</textarea>

                    @error('catatan')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="items">
                    <h2>Daftar Produk Masuk</h2>
                    <p class="hint" style="margin-bottom: 18px;">
                        Tambahkan satu atau lebih produk. Harga beli diisi sesuai harga dari supplier.
                    </p>

                    <div id="daftarProduk">
                        <div class="item-row">
                            <div class="field">
                                <label>Produk *</label>
                                <select name="produk_id[]" required>
                                    <option value="">-- Pilih Produk --</option>
                                    @foreach($produks as $produk)
                                        <option value="{{ $produk->id }}">
                                            {{ $produk->kode_produk }} - {{ $produk->nama_produk }}
                                            (Stok: {{ $produk->stok }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="field">
                                <label>Jumlah *</label>
                                <input type="number" name="jumlah[]" min="1"
                                       step="1" value="1" required>
                            </div>

                            <div class="field">
                                <label>Harga Beli *</label>
                                <input type="number" name="harga_beli[]" min="0.01"
                                       step="0.01" placeholder="Contoh: 25000" required>
                            </div>

                            <div class="field">
                                <button type="button" class="btn btn-danger hapusProduk"
                                        style="display:none">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="tambahProduk" class="btn btn-secondary">
                        + Tambah Produk
                    </button>

                    <div class="total">
                        Estimasi Total: <span id="totalHarga">Rp0</span>
                    </div>

                    <p class="hint">
                        Total pada layar merupakan estimasi. Server akan menghitung ulang total saat transaksi disimpan.
                    </p>
                </div>

                <p class="required-note">* Wajib diisi.</p>

                <div class="actions">
                    <button type="submit" class="btn">
                        Simpan Barang Masuk
                    </button>

                    <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </section>
    </main>

    <script>
        const daftarProduk = document.getElementById('daftarProduk');
        const tambahProduk = document.getElementById('tambahProduk');
        const totalHarga = document.getElementById('totalHarga');

        function hitungTotal() {
            let total = 0;

            daftarProduk.querySelectorAll('.item-row').forEach(row => {
                const jumlah = Number(
                    row.querySelector('[name="jumlah[]"]').value
                ) || 0;

                const harga = Number(
                    row.querySelector('[name="harga_beli[]"]').value
                ) || 0;

                total += jumlah * harga;
            });

            totalHarga.textContent = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 2
            }).format(total);
        }

        function perbaruiTombolHapus() {
            const rows = daftarProduk.querySelectorAll('.item-row');

            rows.forEach(row => {
                const tombol = row.querySelector('.hapusProduk');
                tombol.style.display = rows.length > 1 ? 'inline-flex' : 'none';
            });
        }

        tambahProduk.addEventListener('click', () => {
            const barisPertama = daftarProduk.querySelector('.item-row');
            const barisBaru = barisPertama.cloneNode(true);

            barisBaru.querySelector('select').selectedIndex = 0;
            barisBaru.querySelector('[name="jumlah[]"]').value = 1;
            barisBaru.querySelector('[name="harga_beli[]"]').value = '';

            daftarProduk.appendChild(barisBaru);

            perbaruiTombolHapus();
            hitungTotal();
        });

        daftarProduk.addEventListener('click', event => {
            if (event.target.classList.contains('hapusProduk')) {
                event.target.closest('.item-row').remove();

                perbaruiTombolHapus();
                hitungTotal();
            }
        });

        daftarProduk.addEventListener('input', hitungTotal);
        daftarProduk.addEventListener('change', hitungTotal);

        perbaruiTombolHapus();
        hitungTotal();
    </script>

</body>
</html>
