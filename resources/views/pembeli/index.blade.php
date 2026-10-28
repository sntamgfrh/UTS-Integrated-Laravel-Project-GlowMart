<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - GlowMart</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        :root {
            --maroon: #800020;
            --maroon-dark: #570018;
            --maroon-light: #A52A3A;
            --cream: #FFF8EE;
            --cream-dark: #F5EBDD;
            --text: #49352E;
            --muted: #806A5E;
            --border: #E8D7C7;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #FFF8EE 0%, #F8EEE3 55%, #F3E2D8 100%);
            color: var(--text);
        }

        /* HEADER */
        header {
            background: linear-gradient(120deg, var(--maroon-dark), var(--maroon), var(--maroon-light));
            color: var(--cream);
            padding: 25px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            box-shadow: 0 7px 24px rgba(87, 0, 24, 0.18);
        }

        header h1 {
            font-size: 30px;
            letter-spacing: 1.5px;
            font-weight: 800;
        }

        header p {
            margin-top: 8px;
            font-size: 13px;
            color: #F5EBDD;
            letter-spacing: 0.3px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .header-link {
            color: var(--cream);
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            padding: 11px 13px;
            border-radius: 8px;
            transition: background 0.2s ease;
        }

        .header-link:hover {
            background: rgba(255, 248, 238, 0.15);
        }

        .logout {
            margin: 0;
        }

        .logout button {
            border: 1px solid var(--cream);
            background: var(--cream);
            color: var(--maroon);
            font-weight: bold;
            padding: 11px 19px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .logout button:hover {
            background: var(--cream-dark);
            transform: translateY(-1px);
        }

        /* KONTEN UTAMA */
        main {
            width: 100%;
            max-width: 1200px;
            margin: 38px auto;
            padding: 0 24px;
            min-height: 65vh;
            flex: 1;
        }

        .intro {
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg, #FFFCF7, var(--cream-dark));
            padding: 32px;
            border-radius: 18px;
            border: 1px solid #EAD9C8;
            border-left: 6px solid var(--maroon);
            margin-bottom: 28px;
            box-shadow: 0 8px 25px rgba(87, 0, 24, 0.06);
        }

        .intro h2 {
            color: var(--maroon);
            margin-bottom: 10px;
            font-size: 28px;
        }

        .intro p {
            color: var(--muted);
            line-height: 1.8;
            font-size: 14px;
        }

        /* PESAN */
        .message {
            padding: 14px 17px;
            border-radius: 10px;
            margin-bottom: 18px;
            line-height: 1.6;
            font-size: 14px;
        }

        .success {
            background: #E7F4E8;
            color: #245B32;
            border: 1px solid #C5E5CB;
        }

        .error {
            background: #FCE9E9;
            color: #8B1E2D;
            border: 1px solid #F1CCCC;
        }

        /* PENCARIAN */
        .search {
            display: flex;
            gap: 12px;
            margin: 22px 0 30px;
            padding: 12px;
            background: rgba(255, 252, 247, 0.85);
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(73, 53, 46, 0.04);
        }

        .search input {
            flex: 1;
            min-width: 0;
            padding: 13px 15px;
            border: 1px solid transparent;
            border-radius: 9px;
            background: #FFFFFF;
            color: var(--text);
            font-size: 14px;
            outline: none;
        }

        .search input:focus {
            border-color: var(--maroon);
            box-shadow: 0 0 0 3px rgba(128, 0, 32, 0.08);
        }

        .search button {
            padding: 12px 25px;
            border: none;
            border-radius: 9px;
            background: linear-gradient(135deg, var(--maroon), var(--maroon-light));
            color: #FFFFFF;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .search button:hover {
            background: var(--maroon-dark);
            transform: translateY(-1px);
        }

        /* GRID PRODUK */
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 24px;
            align-items: stretch;
        }

        .card {
            display: flex;
            flex-direction: column;
            min-width: 0;
            background: #FFFCF8;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 17px;
            box-shadow: 0 5px 18px rgba(73, 53, 46, 0.06);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 13px 28px rgba(87, 0, 24, 0.12);
            border-color: #D8B9A7;
        }

        .product-image {
            height: 180px;
            background: linear-gradient(145deg, #F5EBDD, #FFF8EE);
            border: 1px solid #F0E2D4;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 17px;
            color: var(--muted);
            font-size: 13px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 8px;
            transition: transform 0.3s ease;
        }

        .card:hover .product-image img {
            transform: scale(1.04);
        }

        .card h3 {
            color: var(--text);
            font-size: 16px;
            margin-bottom: 8px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .brand {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .price {
            color: var(--maroon);
            font-weight: 800;
            font-size: 19px;
            margin-bottom: 12px;
        }

        .stock {
            font-size: 12px;
            color: #66564C;
            background: var(--cream);
            border: 1px solid #F0E3D6;
            padding: 9px 10px;
            border-radius: 8px;
            line-height: 1.5;
        }

        /* FORM KERANJANG */
        .cart-form {
            margin-top: auto;
            padding-top: 15px;
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .cart-form label {
            font-size: 12px;
            font-weight: bold;
            color: var(--text);
        }

        .cart-form input {
            width: 100%;
            padding: 11px;
            border: 1px solid #DCC8B7;
            border-radius: 8px;
            background: #FFF8EE;
            color: var(--text);
            outline: none;
        }

        .cart-form input:focus {
            border-color: var(--maroon);
            box-shadow: 0 0 0 3px rgba(128, 0, 32, 0.07);
        }

        .cart-button {
            width: 100%;
            margin-top: 5px;
            padding: 12px 10px;
            border: none;
            border-radius: 9px;
            background: linear-gradient(135deg, var(--maroon), var(--maroon-light));
            color: #FFFFFF;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .cart-button:hover {
            background: linear-gradient(135deg, var(--maroon-dark), var(--maroon));
            transform: translateY(-1px);
        }

        .cart-button.disabled {
            background: #B9A6A6;
            cursor: not-allowed;
            transform: none;
        }

        /* KATALOG KOSONG */
        .empty {
            background: #FFFCF8;
            border: 1px dashed #CDB6A3;
            padding: 42px 20px;
            border-radius: 16px;
            text-align: center;
            grid-column: 1 / -1;
        }

        .empty h3 {
            color: var(--maroon);
            margin-bottom: 10px;
            font-size: 19px;
        }

        .empty p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        /* FOOTER */
        footer {
            margin-top: 35px;
            background: linear-gradient(120deg, var(--maroon-dark), var(--maroon));
            text-align: center;
            padding: 24px 18px;
            color: var(--cream);
            font-size: 13px;
            border-top: 1px solid rgba(255, 248, 238, 0.15);
        }

        /* RESPONSIVE */
        @media (max-width: 760px) {
            header {
                padding: 22px 5%;
                align-items: flex-start;
                flex-direction: column;
            }

            header h1 {
                font-size: 27px;
            }

            .header-actions {
                gap: 5px;
                width: 100%;
            }

            .header-link {
                padding: 10px;
            }

            main {
                margin: 25px auto;
                padding: 0 16px;
            }

            .intro {
                padding: 24px;
            }

            .intro h2 {
                font-size: 24px;
            }

            .products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 15px;
            }

            .card {
                padding: 12px;
            }

            .product-image {
                height: 150px;
            }

            .card h3 {
                font-size: 14px;
            }

            .price {
                font-size: 17px;
            }
        }

        @media (max-width: 480px) {
            header {
                padding: 20px 16px;
            }

            .header-actions {
                align-items: stretch;
            }

            .header-link {
                font-size: 12px;
                padding: 9px 7px;
            }

            .logout button {
                padding: 9px 12px;
                font-size: 12px;
            }

            .intro {
                padding: 20px;
            }

            .intro h2 {
                font-size: 22px;
            }

            .intro p {
                font-size: 13px;
            }

            .search {
                gap: 8px;
                padding: 8px;
            }

            .search input {
                padding: 12px 10px;
                font-size: 12px;
            }

            .search button {
                padding: 12px;
                font-size: 12px;
            }

            .products {
                gap: 11px;
            }

            .product-image {
                height: 125px;
                margin-bottom: 12px;
            }

            .brand {
                font-size: 12px;
            }

            .price {
                font-size: 15px;
            }

            .stock {
                font-size: 11px;
                padding: 7px;
            }

            .cart-form label {
                font-size: 11px;
            }

            .cart-form input {
                padding: 9px;
            }

            .cart-button {
                padding: 10px 6px;
                font-size: 11px;
            }
        }

        @media (max-width: 340px) {
            .products {
                grid-template-columns: 1fr;
            }

            .product-image {
                height: 180px;
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
        <h2>Katalog Produk</h2>
        <p>Temukan produk perawatan kulit favoritmu di GlowMart.</p>
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

    <form class="search" action="{{ route('pembeli.index') }}" method="GET">
        <input
            type="text"
            name="cari"
            placeholder="Cari nama produk atau merek..."
            value="{{ request('cari') }}"
        >
        <button type="submit">Cari</button>
    </form>

    <section class="products">
        @forelse ($produks as $produk)
            <article class="card">
                <div class="product-image">
                    @if ($produk->gambar)
                        <img
                            src="{{ asset('storage/' . $produk->gambar) }}"
                            alt="{{ $produk->nama_produk }}"
                        >
                    @else
                        <span>Produk GlowMart</span>
                    @endif
                </div>

                <h3>{{ $produk->nama_produk }}</h3>

                <p class="brand">
                    {{ $produk->merek ?: 'Merek tidak dicantumkan' }}
                </p>

                <p class="price">
                    Rp {{ number_format((float) $produk->harga, 0, ',', '.') }}
                </p>

                <p class="stock">
                    @if ($produk->stok > 0)
                        Stok tersedia: {{ $produk->stok }}
                    @else
                        Stok habis
                    @endif
                </p>

                @if ($produk->stok > 0)
                    <form
                        action="{{ route('pembeli.keranjang.store', $produk->id) }}"
                        method="POST"
                        class="cart-form"
                    >
                        @csrf

                        <label for="jumlah-{{ $produk->id }}">
                            Jumlah produk
                        </label>

                        <input
                            type="number"
                            id="jumlah-{{ $produk->id }}"
                            name="jumlah"
                            value="1"
                            min="1"
                            max="{{ $produk->stok }}"
                            required
                        >

                        <button type="submit" class="cart-button">
                            Tambah ke Keranjang
                        </button>
                    </form>
                @else
                    <button type="button" class="cart-button disabled" disabled>
                        Stok Habis
                    </button>
                @endif
            </article>
        @empty
            <div class="empty">
                <h3>Produk belum tersedia</h3>
                <p>Silakan coba kata pencarian lain.</p>
            </div>
        @endforelse
    </section>
</main>

<footer>
    GlowMart &mdash; Toko Skincare
</footer>

</body>
</html>
