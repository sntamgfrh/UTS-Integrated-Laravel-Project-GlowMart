<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - GlowMart</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        :root {
            --marun: #800020;
            --marun-muda: #A52A3A;
            --krem: #FFF8EE;
            --krem-gelap: #F5EBDD;
            --teks: #49352E;
            --teks-muda: #765C50;
            --garis: #E9D9CA;
        }

        body {
            background: var(--krem);
            color: var(--teks);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: linear-gradient(135deg, #570018, var(--marun-muda));
            color: var(--krem);
            padding: 24px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 4px 12px #80002020;
        }

        header h1 {
            font-size: 28px;
            letter-spacing: 1px;
        }

        header p {
            margin-top: 7px;
            font-size: 13px;
            color: var(--krem-gelap);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .header-link {
            color: var(--krem);
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .header-link:hover {
            text-decoration: underline;
        }

        .logout button {
            border: 1px solid var(--krem);
            background: var(--krem);
            color: var(--marun);
            font-weight: bold;
            padding: 11px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        .logout button:hover {
            background: #F1E3D2;
        }

        main {
            width: 100%;
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
            flex: 1;
        }

        .intro {
            background: linear-gradient(135deg, var(--krem-gelap), #FFFDF9);
            padding: 25px;
            border-radius: 14px;
            border-left: 5px solid var(--marun);
            margin-bottom: 25px;
        }

        .intro h2 {
            color: var(--marun);
            margin-bottom: 9px;
            font-size: 25px;
        }

        .intro p {
            color: var(--teks-muda);
            line-height: 1.6;
        }

        .message {
            padding: 14px 16px;
            border-radius: 9px;
            margin-bottom: 18px;
            line-height: 1.6;
            background: #E5F5E8;
            color: #226B34;
        }

        .card {
            background: #FFFFFF;
            border: 1px solid var(--garis);
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 5px 16px #49352E0A;
        }

        .card h3 {
            color: var(--marun);
            font-size: 20px;
            margin-bottom: 20px;
        }

        .info {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .label {
            display: block;
            color: #8A7569;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .value {
            color: var(--teks);
            font-weight: bold;
            overflow-wrap: anywhere;
            line-height: 1.6;
        }

        .status {
            display: inline-block;
            background: var(--krem-gelap);
            color: var(--marun);
            border: 1px solid var(--garis);
            padding: 7px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        .table-wrapper {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid var(--garis);
            vertical-align: middle;
        }

        th {
            background: var(--marun);
            color: #FFFFFF;
            font-size: 14px;
            white-space: nowrap;
        }

        td {
            font-size: 14px;
            line-height: 1.5;
        }

        tbody tr:hover {
            background: #FFF8EE;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .harga {
            white-space: nowrap;
        }

        .total {
            text-align: right;
            margin-top: 22px;
            padding: 20px;
            background: var(--krem-gelap);
            border-radius: 10px;
            color: var(--marun);
            font-size: 22px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .empty {
            padding: 20px 0;
            color: var(--teks-muda);
            line-height: 1.6;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 5px;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background: var(--marun);
            color: #FFFFFF;
            border: 1px solid var(--marun);
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn:hover {
            background: var(--marun-muda);
        }

        .btn-secondary {
            background: var(--krem-gelap);
            color: var(--marun);
            border-color: #D9C3B1;
        }

        .btn-secondary:hover {
            background: #E9D9CA;
        }

        footer {
            background: var(--krem-gelap);
            text-align: center;
            padding: 22px;
            color: var(--teks-muda);
            font-size: 13px;
            border-top: 1px solid var(--garis);
        }

        @media (max-width: 700px) {
            header {
                padding: 20px 5%;
            }

            header h1 {
                font-size: 23px;
            }

            .header-actions {
                width: 100%;
                gap: 12px;
            }

            main {
                margin: 25px auto;
                padding: 0 15px;
            }

            .intro {
                padding: 20px;
            }

            .intro h2 {
                font-size: 21px;
            }

            .card {
                padding: 18px;
            }

            .info {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .total {
                font-size: 19px;
                text-align: left;
                line-height: 1.5;
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

<header>
    <div>
        <h1>GlowMart</h1>
        <p>Temukan skincare yang sesuai untukmu</p>
    </div>

    <div class="header-actions">
        <a class="header-link" href="{{ route('pembeli.index') }}">
            Katalog Produk
        </a>

        <a class="header-link" href="{{ route('pembeli.keranjang') }}">
            Keranjang Belanja
        </a>

        <a class="header-link" href="{{ route('pembeli.riwayat-pesanan') }}">
            Riwayat Pesanan
        </a>

        <form class="logout" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Keluar</button>
        </form>
    </div>
</header>

<main>
    <section class="intro">
        <h2>Detail Pesanan</h2>
        <p>Periksa informasi dan rincian produk dari pesananmu.</p>
    </section>

    @if (session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    <section class="card">
        <h3>Informasi Pesanan</h3>

        <div class="info">
            <div>
                <span class="label">Kode Pesanan</span>
                <div class="value">
                    {{ $pesanan->kode_pesanan }}
                </div>
            </div>

            <div>
                <span class="label">Tanggal Pesanan</span>
                <div class="value">
                    {{ $pesanan->created_at?->format('d-m-Y H:i') ?? '-' }}
                </div>
            </div>

            <div>
                <span class="label">Nama Penerima</span>
                <div class="value">
                    {{ $pesanan->nama_penerima ?: '-' }}
                </div>
            </div>

            <div>
                <span class="label">Nomor Telepon</span>
                <div class="value">
                    {{ $pesanan->no_telepon ?: '-' }}
                </div>
            </div>

            <div>
                <span class="label">Metode Pembayaran</span>
                <div class="value">
                    {{ $pesanan->metode_pembayaran ?: '-' }}
                </div>
            </div>

            <div>
                <span class="label">Status Pesanan</span>
                <div>
                    <span class="status">
                        {{ $pesanan->status ?: 'Menunggu Konfirmasi' }}
                    </span>
                </div>
            </div>

            <div>
                <span class="label">Alamat Pengiriman</span>
                <div class="value">
                    {{ $pesanan->alamat ?: '-' }}
                </div>
            </div>

            <div>
                <span class="label">Catatan</span>
                <div class="value">
                    {{ $pesanan->catatan ?: '-' }}
                </div>
            </div>
        </div>
    </section>

    <section class="card">
        <h3>Produk yang Dipesan</h3>

        @if ($pesanan->detailPesanan->isNotEmpty())
            <div class="table-wrapper">
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
                        @foreach ($pesanan->detailPesanan as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $detail->produk?->nama_produk ?? 'Produk tidak tersedia' }}
                                </td>

                                <td class="harga">
                                    Rp {{ number_format((float) $detail->harga_satuan, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ $detail->jumlah }}
                                </td>

                                <td class="harga">
                                    Rp {{ number_format((float) $detail->subtotal, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="empty">
                Belum ada rincian produk untuk pesanan ini.
            </p>
        @endif

        <div class="total">
            Total Pesanan:
            Rp {{ number_format((float) $pesanan->total_harga, 0, ',', '.') }}
        </div>
    </section>

    <div class="actions">
        <a href="{{ route('pembeli.riwayat-pesanan') }}" class="btn btn-secondary">
            Kembali ke Riwayat Pesanan
        </a>

        <a href="{{ route('pembeli.index') }}" class="btn">
            Kembali ke Katalog
        </a>
    </div>
</main>

<footer>
    GlowMart &copy; {{ date('Y') }}. Semua hak dilindungi.
</footer>

</body>
</html>
