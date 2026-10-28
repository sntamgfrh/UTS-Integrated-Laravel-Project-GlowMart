<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - GlowMart</title>

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
            color: white;
            padding: 22px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px;
            box-shadow: 0 4px 15px rgba(80, 0, 25, 0.12);
        }

        .brand h1 {
            font-size: 28px;
            letter-spacing: 1px;
        }

        .brand p {
            margin-top: 7px;
            font-size: 13px;
            color: #F5EBDD;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .header-link {
            color: #FFF8EE;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: opacity 0.2s;
        }

        .header-link:hover {
            opacity: 0.8;
        }

        .header-link.active {
            border-bottom: 2px solid #FFF8EE;
            padding-bottom: 5px;
        }

        .logout button {
            border: 1px solid #FFF8EE;
            background: #FFF8EE;
            color: var(--marun);
            font-weight: bold;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        .logout button:hover {
            background: #F1E3D2;
        }

        main {
            width: 100%;
            max-width: 1100px;
            margin: 32px auto;
            padding: 0 20px;
            flex: 1;
        }

        .intro {
            background: linear-gradient(135deg, #F5EBDD, #FFFDF9);
            padding: 25px;
            border-radius: 14px;
            border-left: 5px solid var(--marun);
            margin-bottom: 24px;
        }

        .intro h2 {
            color: var(--marun);
            margin-bottom: 9px;
            font-size: 25px;
        }

        .intro p {
            color: var(--teks-muda);
            line-height: 1.7;
            font-size: 14px;
        }

        .message {
            padding: 14px 17px;
            border-radius: 9px;
            margin-bottom: 18px;
            line-height: 1.6;
            font-size: 14px;
        }

        .success {
            background: #E5F5E8;
            color: #245B32;
            border: 1px solid #C8E8CF;
        }

        .error {
            background: #FCE7E7;
            color: #8B1E2D;
            border: 1px solid #F3CACA;
        }

        .keranjang {
            background: #FFFFFF;
            border: 1px solid var(--garis);
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            box-shadow: 0 4px 15px rgba(80, 0, 25, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .keranjang:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(80, 0, 25, 0.09);
        }

        .info {
            flex: 1;
            min-width: 220px;
        }

        .info h3 {
            color: var(--teks);
            font-size: 18px;
            margin-bottom: 12px;
            line-height: 1.5;
        }

        .info p {
            margin: 8px 0;
            font-size: 14px;
            line-height: 1.6;
            color: var(--teks-muda);
        }

        .harga {
            font-weight: bold;
            color: var(--marun);
        }

        .hapus {
            background: var(--marun);
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .hapus:hover {
            background: var(--marun-muda);
        }

        .total {
            background: linear-gradient(135deg, #F5EBDD, #FFFDF9);
            border: 1px solid var(--garis);
            border-left: 5px solid var(--marun);
            border-radius: 14px;
            padding: 25px;
            margin-top: 25px;
        }

        .total h3 {
            color: var(--marun);
            font-size: 23px;
            margin-bottom: 12px;
            line-height: 1.5;
        }

        .total p {
            color: var(--teks-muda);
            font-size: 13px;
            line-height: 1.6;
        }

        .total-actions {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            transition: background 0.2s, transform 0.2s;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .kembali {
            background: #F1E3D2;
            color: var(--marun);
            border: 1px solid #D9C3B1;
        }

        .kembali:hover {
            background: #E9D9CA;
        }

        .checkout {
            background: var(--marun);
            color: #FFFFFF;
            border: 1px solid var(--marun);
        }

        .checkout:hover {
            background: var(--marun-muda);
        }

        .kosong {
            background: #FFFFFF;
            border: 1px solid var(--garis);
            border-radius: 14px;
            padding: 45px 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(80, 0, 25, 0.05);
        }

        .kosong h3 {
            color: var(--marun);
            font-size: 21px;
            margin-bottom: 12px;
        }

        .kosong p {
            color: var(--teks-muda);
            line-height: 1.7;
            font-size: 14px;
            margin-bottom: 12px;
        }

        footer {
            background: var(--krem-gelap);
            text-align: center;
            padding: 22px;
            color: var(--teks-muda);
            font-size: 13px;
            border-top: 1px solid var(--garis);
            margin-top: 25px;
        }

        @media (max-width: 760px) {
            header {
                padding: 20px 5%;
            }

            .header-actions {
                gap: 14px;
            }

            main {
                margin: 25px auto;
            }

            .keranjang {
                align-items: flex-start;
            }

            .keranjang form {
                width: 100%;
            }

            .hapus {
                width: 100%;
            }
        }

        @media (max-width: 600px) {
            .brand h1 {
                font-size: 24px;
            }

            .header-actions {
                width: 100%;
                gap: 13px;
            }

            .header-link {
                font-size: 13px;
            }

            .intro {
                padding: 20px;
            }

            .intro h2 {
                font-size: 22px;
            }

            .keranjang {
                padding: 18px;
            }

            .total {
                padding: 20px;
            }

            .total h3 {
                font-size: 19px;
            }

            .total-actions {
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
    <div class="brand">
        <h1>GlowMart</h1>
        <p>Temukan skincare yang sesuai untukmu</p>
    </div>

    <div class="header-actions">
        <a class="header-link" href="{{ route('pembeli.index') }}">
            Katalog Produk
        </a>

        <a class="header-link active" href="{{ route('pembeli.keranjang') }}">
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
        <h2>Keranjang Belanja</h2>
        <p>
            Periksa kembali produk yang ingin kamu beli sebelum
            melanjutkan ke proses checkout.
        </p>
    </section>

    @if (session('success'))
        <div class="message success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="message error">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="message error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if ($keranjangs->isEmpty())
        <div class="kosong">
            <h3>Keranjang Belanja Masih Kosong</h3>
            <p>
                Kamu belum menambahkan produk ke keranjang.
                Silakan lihat katalog untuk memilih produk skincare.
            </p>

            <a href="{{ route('pembeli.index') }}" class="btn kembali">
                Lihat Katalog Produk
            </a>
        </div>
    @else
        @php
            $totalBelanja = 0;
        @endphp

        @foreach ($keranjangs as $item)
            @php
                $harga = (float) ($item->produk->harga ?? 0);
                $subtotal = $harga * $item->jumlah;
                $totalBelanja += $subtotal;
            @endphp

            <div class="keranjang">
                <div class="info">
                    <h3>
                        {{ $item->produk->nama_produk ?? 'Produk tidak tersedia' }}
                    </h3>

                    <p>
                        Merek:
                        <strong>{{ $item->produk->merek ?? '-' }}</strong>
                    </p>

                    <p>
                        Harga Satuan:
                        <span class="harga">
                            Rp {{ number_format($harga, 0, ',', '.') }}
                        </span>
                    </p>

                    <p>
                        Jumlah:
                        <strong>{{ $item->jumlah }}</strong>
                    </p>

                    <p>
                        Subtotal:
                        <span class="harga">
                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                        </span>
                    </p>
                </div>

                <form
                    action="{{ route('pembeli.keranjang.destroy', $item->id) }}"
                    method="POST"
                    onsubmit="return confirm('Hapus produk ini dari keranjang?')"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="hapus">
                        Hapus Produk
                    </button>
                </form>
            </div>
        @endforeach

        <div class="total">
            <h3>
                Total Belanja:
                Rp {{ number_format($totalBelanja, 0, ',', '.') }}
            </h3>

            <p>Total belum termasuk ongkos kirim.</p>

            <div class="total-actions">
                <a href="{{ route('pembeli.index') }}" class="btn kembali">
                    Lanjut Belanja
                </a>

                <a href="{{ route('pembeli.checkout') }}" class="btn checkout">
                    Lanjut ke Checkout
                </a>
            </div>
        </div>
    @endif
</main>

<footer>
    GlowMart — Toko Skincare
</footer>

</body>
</html>
