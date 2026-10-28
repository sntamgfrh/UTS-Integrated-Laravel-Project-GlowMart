<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan - Inventory Sales</title>

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
            background: linear-gradient(180deg, #F5F5E9, #E8EDD9, #CBD5B2);
            overflow-y: auto;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
            margin-bottom: 35px;
            padding: 0 8px;
        }

        .menu-link {
            display: block;
            padding: 13px 12px;
            margin-bottom: 8px;
            color: #435641;
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
        }

        .menu-link:hover,
        .menu-link.active {
            background: #82966A;
            color: white;
        }

        .main {
            margin-left: 230px;
            padding: 30px;
        }

        .card {
            max-width: 850px;
            background: white;
            padding: 28px;
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
        }

        .code {
            padding: 12px;
            margin-bottom: 20px;
            background: #F5F5E9;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 18px;
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

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #D8DFCC;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            background: white;
            color: #435641;
        }

        input:focus, select:focus, textarea:focus {
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
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
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

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: static;
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
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="brand">Inventory Sales</div>

    <a href="{{ route('dashboard') }}" class="menu-link">Dashboard</a>
    <a href="{{ route('produk.index') }}" class="menu-link">Produk</a>
    <a href="{{ route('kategori.index') }}" class="menu-link">Kategori</a>
    <a href="{{ route('supplier.index') }}" class="menu-link">Supplier</a>
    <a href="{{ route('pesanan.index') }}" class="menu-link">Pesanan</a>
    <a href="{{ route('pesanan-diproses.index') }}" class="menu-link active">Pesanan Diproses</a>
    <a href="{{ route('transaksi-penjualan.index') }}" class="menu-link">Transaksi Penjualan</a>
    <a href="{{ route('pembelian.index') }}" class="menu-link">Pembelian</a>
    <a href="{{ route('barang-keluar.index') }}" class="menu-link">Barang Keluar</a>
    <a href="{{ route('laporan.index') }}" class="menu-link">Laporan</a>
    <a href="{{ route('users.index') }}" class="menu-link">Manajemen User</a>

    <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <button type="submit" class="btn" style="width: 100%;">Logout</button>
    </form>
</aside>

<main class="main">
    <section class="card">
        <h1>Edit Pesanan</h1>
        <p class="subtitle">Ubah informasi pesanan yang sudah tersimpan.</p>

        <div class="code">
            Kode Pesanan: <strong>{{ $pesananDiproses->kode_pesanan }}</strong>
        </div>

        @if ($errors->any())
            <div class="alert">
                <ul style="padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('pesanan-diproses.update', $pesananDiproses->id) }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input
                        type="text"
                        id="nama_pelanggan"
                        name="nama_pelanggan"
                        value="{{ old('nama_pelanggan', $pesananDiproses->nama_pelanggan) }}"
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
                        value="{{ old('nama_produk', $pesananDiproses->nama_produk) }}"
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
                        value="{{ old('jumlah', $pesananDiproses->jumlah) }}"
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
                        value="{{ old('tanggal_pesanan', $pesananDiproses->tanggal_pesanan ? \Carbon\Carbon::parse($pesananDiproses->tanggal_pesanan)->format('Y-m-d') : '') }}"
                        required
                    >
                    @error('tanggal_pesanan')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status Pesanan</label>
                    <select id="status" name="status" required>
                        <option value="Menunggu" {{ old('status', $pesananDiproses->status) == 'Menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>
                        <option value="Diproses" {{ old('status', $pesananDiproses->status) == 'Diproses' ? 'selected' : '' }}>
                            Diproses
                        </option>
                        <option value="Selesai" {{ old('status', $pesananDiproses->status) == 'Selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>
                    </select>
                    @error('status')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group full">
                    <label for="catatan">Catatan (Opsional)</label>
                    <textarea id="catatan" name="catatan">{{ old('catatan', $pesananDiproses->catatan) }}</textarea>
                    @error('catatan')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="actions">
                <button type="submit" class="btn">Simpan Perubahan</button>
                <a href="{{ route('pesanan-diproses.index') }}" class="btn btn-cancel">
                    Batal
                </a>
            </div>
        </form>
    </section>
</main>

</body>
</html>
