<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - GlowMart</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #FFF8EE;
            color: #493343;
            padding: 30px 16px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .header {
            background: #800020;
            color: white;
            padding: 25px;
            border-radius: 14px;
            margin-bottom: 24px;
        }

        .header h1 {
            margin-bottom: 8px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(80, 0, 25, 0.08);
        }

        h2 {
            color: #800020;
            margin-bottom: 20px;
        }

        .produk {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 14px 0;
            border-bottom: 1px solid #eee;
        }

        .produk:last-child {
            border-bottom: none;
        }

        .harga {
            color: #800020;
            font-weight: bold;
            text-align: right;
        }

        .total {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding-top: 18px;
            margin-top: 12px;
            border-top: 2px solid #800020;
            font-size: 20px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddcbd0;
            border-radius: 8px;
            font-size: 15px;
            background: #fffdfb;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: 2px solid #A52A3A;
            border-color: #A52A3A;
        }

        .error {
            color: #b00020;
            margin-bottom: 15px;
        }

        .success {
            color: #176b35;
            margin-bottom: 15px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 8px;
            padding: 13px 20px;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary {
            background: #800020;
            color: white;
            flex: 1;
        }

        .btn-primary:hover {
            background: #A52A3A;
        }

        .btn-secondary {
            background: #F5EBDD;
            color: #800020;
        }

        @media (max-width: 600px) {
            .card {
                padding: 18px;
            }

            .produk {
                flex-direction: column;
            }

            .harga {
                text-align: left;
            }

            .total {
                font-size: 17px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Checkout GlowMart</h1>
        <p>Lengkapi data penerima untuk menyelesaikan pesanan.</p>
    </div>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div class="card error">
            <strong>Periksa kembali data kamu:</strong>

            <ul style="padding-left: 20px; margin-top: 8px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <h2>Ringkasan Pesanan</h2>

        @php
            $totalHarga = 0;
        @endphp

        @foreach ($keranjangs as $item)
            @php
                $subtotal = (float) $item->produk->harga * $item->jumlah;
                $totalHarga += $subtotal;
            @endphp

            <div class="produk">
                <div>
                    <strong>{{ $item->produk->nama_produk }}</strong>
                    <p>Jumlah: {{ $item->jumlah }}</p>
                    <p>
                        Harga satuan:
                        Rp{{ number_format($item->produk->harga, 0, ',', '.') }}
                    </p>
                </div>

                <div class="harga">
                    Rp{{ number_format($subtotal, 0, ',', '.') }}
                </div>
            </div>
        @endforeach

        <div class="total">
            <span>Total Pembayaran</span>
            <span>Rp{{ number_format($totalHarga, 0, ',', '.') }}</span>
        </div>
    </div>

    <form action="{{ route('pembeli.checkout.store') }}" method="POST">
        @csrf

        <div class="card">
            <h2>Data Penerima</h2>

            <div class="form-group">
                <label for="nama_penerima">Nama Penerima</label>
                <input
                    type="text"
                    id="nama_penerima"
                    name="nama_penerima"
                    value="{{ old('nama_penerima') }}"
                    required
                    maxlength="255"
                    placeholder="Masukkan nama penerima"
                >
            </div>

            <div class="form-group">
                <label for="no_telepon">Nomor Telepon</label>
                <input
                    type="tel"
                    id="no_telepon"
                    name="no_telepon"
                    value="{{ old('no_telepon') }}"
                    required
                    maxlength="20"
                    placeholder="Contoh: 08xxxxxxxxxx"
                >
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Lengkap</label>
                <textarea
                    id="alamat"
                    name="alamat"
                    required
                    maxlength="2000"
                    placeholder="Masukkan alamat lengkap pengiriman"
                >{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label for="metode_pembayaran">Metode Pembayaran</label>

                <select
                    id="metode_pembayaran"
                    name="metode_pembayaran"
                    required
                >
                    <option value="">-- Pilih Pembayaran --</option>

                    <option
                        value="QRIS"
                        {{ old('metode_pembayaran') == 'QRIS' ? 'selected' : '' }}
                    >
                        QRIS
                    </option>

                    <option
                        value="COD"
                        {{ old('metode_pembayaran') == 'COD' ? 'selected' : '' }}
                    >
                        Bayar di Tempat (COD)
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan (Opsional)</label>
                <textarea
                    id="catatan"
                    name="catatan"
                    maxlength="1000"
                    placeholder="Catatan tambahan untuk pesanan"
                >{{ old('catatan') }}</textarea>
            </div>

            <div class="actions">
                <a
                    href="{{ route('pembeli.keranjang') }}"
                    class="btn btn-secondary"
                >
                    Kembali ke Keranjang
                </a>

                <button type="submit" class="btn btn-primary">
                    Buat Pesanan
                </button>
            </div>
        </div>
    </form>

</div>

</body>
</html>
