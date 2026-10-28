<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - GlowMart</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        :root {
            --marun: #800020;
            --marun-gelap: #570018;
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
            background: linear-gradient(135deg, var(--marun-gelap), var(--marun-muda));
            color: var(--krem);
            padding: 22px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px;
            box-shadow: 0 4px 15px rgba(80, 0, 25, 0.12);
        }

        .brand h2 {
            font-size: 27px;
            margin-bottom: 6px;
            letter-spacing: 1px;
        }

        .brand p {
            font-size: 13px;
            color: #F5EBDD;
        }

        .nav-links {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .nav-links a,
        .logout-button {
            display: inline-block;
            color: var(--krem);
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            padding: 10px 13px;
            border-radius: 7px;
            background: transparent;
            border: 1px solid transparent;
            cursor: pointer;
        }

        .nav-links a:hover,
        .logout-button:hover {
            background: #FFFFFF20;
            border-color: #FFFFFF50;
        }

        .nav-links a.active {
            border-color: #FFF8EE80;
            background: #FFFFFF15;
        }

        .logout-button {
            background: var(--krem);
            color: var(--marun);
        }

        .logout-button:hover {
            background: #F1E3D2;
            color: var(--marun);
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 32px auto;
            padding: 0 22px;
            flex: 1;
        }

        .intro {
            background: linear-gradient(135deg, var(--krem-gelap), #FFFDF9);
            border-left: 5px solid var(--marun);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 24px;
        }

        .intro h1 {
            color: var(--marun);
            font-size: 27px;
            margin-bottom: 10px;
        }

        .intro p {
            color: var(--teks-muda);
            line-height: 1.7;
            font-size: 14px;
        }

        .message {
            background: #E5F5E8;
            color: #226B34;
            padding: 14px 16px;
            border-radius: 9px;
            margin-bottom: 18px;
            line-height: 1.6;
        }

        .error-message {
            background: #FCE8E8;
            color: #9B1C31;
            padding: 14px 16px;
            border-radius: 9px;
            margin-bottom: 18px;
            line-height: 1.6;
        }

        .search {
            display: flex;
            gap: 12px;
            margin-bottom: 22px;
            background: #FFFFFF;
            border: 1px solid var(--garis);
            padding: 16px;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(80, 0, 25, 0.04);
        }

        .search input {
            flex: 1;
            min-width: 0;
            padding: 12px 14px;
            border: 1px solid #DCC9BA;
            border-radius: 8px;
            font-size: 14px;
            color: var(--teks);
            background: #FFFCF8;
        }

        .search input:focus {
            outline: 2px solid #80002035;
            border-color: var(--marun);
        }

        .btn {
            display: inline-block;
            background: var(--marun);
            color: #FFFFFF;
            border: 1px solid var(--marun);
            border-radius: 8px;
            padding: 11px 16px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            transition: background 0.2s, transform 0.2s;
        }

        .btn:hover {
            background: var(--marun-muda);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: var(--krem-gelap);
            color: var(--marun);
            border-color: #D9C3B1;
        }

        .btn-secondary:hover {
            background: #E9D9CA;
            color: var(--marun);
        }

        .table-wrapper {
            overflow-x: auto;
            background: #FFFFFF;
            border: 1px solid var(--garis);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 760px;
        }

        th,
        td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #F0E5DA;
            vertical-align: middle;
        }

        th {
            background: var(--marun);
            color: #FFFFFF;
            font-size: 13px;
            white-space: nowrap;
        }

        td {
            font-size: 14px;
            line-height: 1.6;
        }

        tbody tr:hover {
            background: #FFFCF8;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .kode {
            color: var(--marun);
            font-weight: bold;
            white-space: nowrap;
        }

        .harga {
            color: var(--marun);
            font-weight: bold;
            white-space: nowrap;
        }

        .status {
            display: inline-block;
            background: var(--krem-gelap);
            color: var(--marun);
            border: 1px solid var(--garis);
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .empty {
            background: #FFFFFF;
            border: 1px solid var(--garis);
            text-align: center;
            padding: 45px 24px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(80, 0, 25, 0.04);
        }

        .empty h3 {
            color: var(--marun);
            margin-bottom: 12px;
            font-size: 21px;
        }

        .empty p {
            color: var(--teks-muda);
            margin-bottom: 22px;
            line-height: 1.7;
            font-size: 14px;
        }

        .pagination {
            margin-top: 22px;
            overflow-x: auto;
        }

        .pagination nav {
            background: transparent;
            color: var(--teks);
            padding: 10px 0;
            box-shadow: none;
        }

        .pagination nav a,
        .pagination nav span {
            margin: 3px;
        }

        footer {
            margin-top: 30px;
            background: var(--krem-gelap);
            color: var(--teks-muda);
            text-align: center;
            padding: 22px;
            font-size: 13px;
            border-top: 1px solid var(--garis);
        }

        @media (max-width: 700px) {
            header {
                padding: 20px 5%;
            }

            .brand h2 {
                font-size: 24px;
            }

            .nav-links {
                width: 100%;
                gap: 5px;
            }

            .nav-links a,
            .logout-button {
                padding: 9px 10px;
                font-size: 13px;
            }

            .container {
                margin: 24px auto;
                padding: 0 15px;
            }

            .intro {
                padding: 20px;
            }

            .intro h1 {
                font-size: 23px;
            }

            .search {
                flex-direction: column;
            }

            .search .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="brand">
        <h2>GlowMart</h2>
        <p>Perawatan kulit, pilihan terbaik untukmu</p>
    </div>

    <nav class="nav-links">
        <a href="{{ route('pembeli.index') }}">Katalog</a>

        <a href="{{ route('pembeli.keranjang') }}">Keranjang</a>

        <a
            href="{{ route('pembeli.riwayat-pesanan') }}"
            class="active"
        >
            Riwayat Pesanan
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">Keluar</button>
        </form>
    </nav>
</header>

<main class="container">

    <section class="intro">
        <h1>Riwayat Pesanan</h1>
        <p>
            Lihat daftar pesanan yang pernah kamu buat,
            periksa statusnya, dan buka detail pesananmu.
        </p>
    </section>

    @if (session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-message">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form
        class="search"
        action="{{ route('pembeli.riwayat-pesanan') }}"
        method="GET"
    >
        <input
            type="text"
            name="cari"
            placeholder="Cari berdasarkan kode pesanan..."
            value="{{ request('cari') }}"
        >

        <button type="submit" class="btn">Cari Pesanan</button>

        @if (request('cari'))
            <a
                href="{{ route('pembeli.riwayat-pesanan') }}"
                class="btn btn-secondary"
            >
                Reset
            </a>
        @endif
    </form>

    @if ($pesanans->count() > 0)

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Pesanan</th>
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pesanans as $pesanan)
                        <tr>
                            <td>
                                {{ $pesanans->firstItem() + $loop->index }}
                            </td>

                            <td class="kode">
                                {{ $pesanan->kode_pesanan }}
                            </td>

                            <td>
                                {{ $pesanan->created_at
                                    ? $pesanan->created_at->format('d-m-Y H:i')
                                    : '-' }}
                            </td>

                            <td class="harga">
                                Rp{{ number_format((float) $pesanan->total_harga, 0, ',', '.') }}
                            </td>

                            <td>
                                <span class="status">
                                    {{ $pesanan->status }}
                                </span>
                            </td>

                            <td>
                                <a
                                    class="btn"
                                    href="{{ route('pembeli.detail-pesanan', $pesanan->id) }}"
                                >
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $pesanans->withQueryString()->links() }}
        </div>

    @else

        <div class="empty">
            <h3>
                {{ request('cari') ? 'Pesanan Tidak Ditemukan' : 'Belum Ada Pesanan' }}
            </h3>

            <p>
                @if (request('cari'))
                    Kode pesanan yang kamu cari tidak ditemukan.
                    Periksa kembali kode pesanan tersebut.
                @else
                    Kamu belum membuat pesanan di GlowMart.
                    Pesanan yang sudah dibuat akan tampil di halaman ini.
                @endif
            </p>

            @if (request('cari'))
                <a
                    class="btn btn-secondary"
                    href="{{ route('pembeli.riwayat-pesanan') }}"
                >
                    Lihat Semua Pesanan
                </a>
            @endif

            <a class="btn" href="{{ route('pembeli.index') }}">
                Belanja Sekarang
            </a>
        </div>

    @endif

</main>

<footer>
    GlowMart &copy; {{ date('Y') }}. Semua hak dilindungi.
</footer>

</body>
</html>
