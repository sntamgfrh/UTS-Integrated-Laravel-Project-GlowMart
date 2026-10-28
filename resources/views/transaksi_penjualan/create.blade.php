<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi - Inventory Sales</title>

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
        body { background: #F7F8F1; color: #354335; }
        .sidebar { position: fixed; top: 0; left: 0; width: 230px; height: 100vh; padding: 28px 18px; background: linear-gradient(180deg, #F5F5E9, #E8EDD9, #CBD5B2); border-right: 1px solid #E0E7D4; overflow-y: auto; }
        .brand { text-align: center; font-size: 23px; font-weight: bold; color: #435641; margin-bottom: 8px; }
        .brand-subtitle { text-align: center; font-size: 11px; color: #718064; margin-bottom: 35px; }
        .menu-title { font-size: 11px; font-weight: bold; color: #849078; letter-spacing: 1px; margin: 22px 10px 12px; text-transform: uppercase; }
        .menu a { display: flex; align-items: center; gap: 12px; text-decoration: none; color: #53634B; padding: 12px 14px; border-radius: 10px; margin-bottom: 7px; font-size: 13px; transition: .2s; }
        .menu a:hover { background: rgba(255,255,255,.65); }
        .menu a.active { background: linear-gradient(135deg, #82966A, #61745B, #435641); color: white; box-shadow: 0 4px 10px #43564125; }
        .menu-icon { width: 20px; text-align: center; font-size: 16px; }
        .logout-form { margin-top: 25px; }
        .logout-button { width: 100%; padding: 12px 14px; border: 1px solid #D5DDC7; border-radius: 10px; background: rgba(255,255,255,.5); color: #59694F; font-size: 13px; font-weight: bold; text-align: left; cursor: pointer; }
        .logout-button:hover { background: #FFFFFF; }
        .main { margin-left: 230px; padding: 30px; min-height: 100vh; }
        .topbar { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; background: white; border: 1px solid #E0E7D4; border-radius: 15px; padding: 18px 22px; margin-bottom: 25px; }
        .topbar h1 { font-size: 21px; margin-bottom: 6px; }
        .topbar p { color: #87917D; font-size: 12px; line-height: 1.6; }
        .user-info { color: #61745B; font-size: 13px; font-weight: bold; }
        .banner { display: flex; align-items: center; justify-content: space-between; gap: 15px; padding: 25px; border: 1px solid #E0E7D4; border-radius: 15px; background: linear-gradient(120deg, #E8EDD9, #F5F5E9, #FFFFFF); margin-bottom: 25px; }
        .banner-label { font-size: 11px; font-weight: bold; letter-spacing: 1.5px; color: #82966A; margin-bottom: 8px; }
        .banner h2 { font-size: 23px; color: #435641; margin-bottom: 8px; }
        .banner p { font-size: 13px; line-height: 1.6; color: #718064; }
        .banner-icon { display: flex; align-items: center; justify-content: center; flex-shrink: 0; width: 65px; height: 65px; border-radius: 18px; background: linear-gradient(135deg, #82966A, #435641); color: white; font-size: 24px; font-weight: bold; }
        .panel { background: white; border: 1px solid #E0E7D4; border-radius: 15px; padding: 25px; margin-bottom: 22px; box-shadow: 0 4px 15px #43564108; }
        .panel-heading { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; border-bottom: 1px solid #EDF0E7; padding-bottom: 17px; margin-bottom: 22px; }
        .panel-heading h3 { font-size: 17px; color: #435641; }
        .panel-heading p { color: #87917D; font-size: 12px; margin-top: 6px; }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; }
        .form-group { min-width: 0; margin-bottom: 18px; }
        .full { grid-column: 1 / -1; }
        label { display: block; font-size: 13px; font-weight: bold; color: #53634B; margin-bottom: 9px; }
        input, select, textarea { width: 100%; padding: 12px 13px; border: 1px solid #DDE5D2; border-radius: 9px; font-size: 13px; background: #FFFFFF; color: #354335; transition: .2s; }
        input:focus, select:focus, textarea:focus { outline: none; border-color: #82966A; box-shadow: 0 0 0 3px #82966A20; }
        input::placeholder, textarea::placeholder { color: #A0A795; }
        textarea { resize: vertical; min-height: 95px; line-height: 1.6; }
        .product-row { display: grid; grid-template-columns: minmax(0, 2fr) minmax(110px, .8fr) auto; gap: 15px; align-items: end; padding: 18px; background: #FAFBF7; border: 1px solid #E0E7D4; border-radius: 12px; margin-bottom: 13px; }
        .product-row .form-group { margin-bottom: 0; }
        .product-info { display: block; color: #718064; font-size: 12px; line-height: 1.7; margin-top: 8px; }
        .line-subtotal { display: block; color: #435641; font-weight: bold; font-size: 13px; margin-top: 8px; }
        .button { display: inline-flex; align-items: center; justify-content: center; gap: 7px; padding: 12px 17px; border: 1px solid transparent; border-radius: 9px; text-decoration: none; cursor: pointer; font-size: 13px; font-weight: bold; transition: .2s; }
        .button:hover { opacity: .9; transform: translateY(-1px); }
        .primary { background: linear-gradient(135deg, #82966A, #61745B, #435641); color: white; }
        .secondary { background: #E8EDD9; color: #53634B; border-color: #D5DDC7; }
        .remove { background: #F8E8E5; color: #9A5146; border-color: #F0D6D0; }
        .summary { background: linear-gradient(120deg, #F1F4E9, #FAFBF7); border: 1px solid #E0E7D4; border-radius: 12px; padding: 21px; margin: 25px 0; }
        .summary-line { display: flex; justify-content: space-between; align-items: center; gap: 15px; margin: 12px 0; color: #718064; font-size: 13px; }
        .summary-line strong { color: #354335; text-align: right; }
        .summary-total { font-size: 23px; color: #435641; font-weight: bold; text-align: right; }
        .muted { color: #87917D; font-size: 12px; line-height: 1.6; margin-top: 7px; }
        .error-box { background: #FBEDEC; color: #99463D; border: 1px solid #F0D6D0; padding: 16px 19px; border-radius: 11px; margin-bottom: 20px; font-size: 13px; line-height: 1.7; }
        .error-box ul { padding-left: 20px; margin-top: 8px; }
        .actions { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 22px; }
        .payment-error { color: #99463D; font-size: 12px; line-height: 1.5; margin-top: 8px; display: none; }
        @media (max-width: 1000px) { .product-row { grid-template-columns: minmax(0, 1fr) minmax(100px, .7fr); } .product-row .remove { grid-column: 1 / -1; justify-self: start; } }
        @media (max-width: 700px) {
            .sidebar { position: relative; width: 100%; height: auto; padding: 20px 15px; }
            .brand-subtitle { margin-bottom: 20px; }
            .menu-title { margin-top: 15px; }
            .main { margin-left: 0; padding: 18px; }
            .topbar { padding: 17px; }
            .banner { padding: 20px; }
            .banner h2 { font-size: 20px; }
            .banner-icon { width: 50px; height: 50px; font-size: 20px; }
            .panel { padding: 18px; }
            .form-grid { grid-template-columns: 1fr; gap: 0; }
            .full { grid-column: auto; }
            .product-row { grid-template-columns: 1fr; padding: 15px; }
            .product-row .remove { grid-column: auto; }
            .summary-total { font-size: 20px; }
        }
    </style>
</head>
<body>
@php $user = auth()->user(); @endphp

<aside class="sidebar">
    <div class="brand">Inventory Sales</div>
    <div class="brand-subtitle">Inventory &amp; Sales Management</div>
    <nav class="menu">
        <div class="menu-title">Menu Utama</div>
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
            <span>Transaksi Penjualan</span>
        </a>

        <a href="{{ route('pesanan.index') }}"
               class="menu-link {{ request()->routeIs('dashboard') && request()->get('bagian') === 'pesanan-diproses' ? 'active' : '' }}">
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

    <div class="menu-title">Akun</div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-button">
            <span class="menu-icon">↪</span>
            <span>Logout</span>
            
    </nav>
</aside>

<main class="main">
    <header class="topbar">
        <div><h1>Tambah Transaksi Penjualan</h1><p>Catat transaksi penjualan dan pembayaran pelanggan.</p></div>
        <div class="user-info">{{ $user->name ?? 'Pengguna' }}</div>
    </header>

    <section class="banner">
        <div><div class="banner-label">TRANSAKSI PENJUALAN</div><h2>Buat Transaksi Baru</h2><p>Pilih produk, masukkan jumlah, dan lengkapi informasi pembayaran.</p></div>
        <div class="banner-icon">Rp</div>
    </section>

    @if ($errors->any())
        <div class="error-box"><strong>Transaksi belum dapat disimpan:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    @if ($produks->isEmpty())
        <section class="panel"><div class="panel-heading"><div><h3>Produk Belum Tersedia</h3><p>Tambahkan produk sebelum membuat transaksi.</p></div></div><div class="actions"><a href="{{ route('produk.index') }}" class="button primary">Buka Data Produk</a><a href="{{ route('transaksi-penjualan.index') }}" class="button secondary">Kembali</a></div></section>
    @else
    <form action="{{ route('transaksi-penjualan.store') }}" method="POST" id="transaction-form">
        @csrf
        <section class="panel">
            <div class="panel-heading"><div><h3>Informasi Transaksi</h3><p>Lengkapi data utama penjualan.</p></div></div>
            <div class="form-grid">
                <div class="form-group"><label for="tanggal_transaksi">Tanggal Transaksi *</label><input type="date" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ old('tanggal_transaksi', date('Y-m-d')) }}" required></div>
                <div class="form-group"><label for="nama_pelanggan">Nama Pelanggan</label><input type="text" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" placeholder="Masukkan nama pelanggan"><p class="muted">Boleh dikosongkan untuk pelanggan umum.</p></div>
                <div class="form-group full"><label for="metode_pembayaran">Metode Pembayaran *</label><select id="metode_pembayaran" name="metode_pembayaran" required>@foreach (['Tunai' => 'Tunai', 'Transfer' => 'Transfer Bank', 'E-Wallet' => 'E-Wallet', 'QRIS' => 'QRIS'] as $value => $label)<option value="{{ $value }}" {{ old('metode_pembayaran', 'Tunai') == $value ? 'selected' : '' }}>{{ $label }}</option>@endforeach</select></div>
            </div>
        </section>

        <section class="panel">
            <div class="panel-heading"><div><h3>Produk yang Dibeli</h3><p>Harga dan stok akan ditampilkan berdasarkan produk yang dipilih.</p></div></div>
            <div id="product-list">
                <div class="product-row">
                    <div class="form-group">
                        <label>Produk *</label>
                        <select name="produk_id[]" class="product-select" required>
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($produks as $produk)
                                <option value="{{ $produk->id }}" data-price="{{ (float) $produk->harga }}" data-stock="{{ (int) $produk->stok }}">{{ $produk->kode_produk }} - {{ $produk->nama_produk }} | Stok: {{ $produk->stok }} | Rp {{ number_format((float) $produk->harga, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                        <span class="product-info">Pilih produk terlebih dahulu.</span>
                        <span class="line-subtotal">Subtotal: Rp 0</span>
                    </div>
                    <div class="form-group"><label>Jumlah *</label><input type="number" name="jumlah[]" class="quantity-input" min="1" value="1" required></div>
                    <button type="button" class="button remove" onclick="removeProduct(this)">Hapus Produk</button>
                </div>
            </div>
            <button type="button" class="button secondary" id="add-product">+ Tambah Produk</button>
        </section>

        <section class="panel">
            <div class="panel-heading"><div><h3>Pembayaran</h3><p>Periksa total belanja dan masukkan nominal pembayaran.</p></div></div>
            <div class="summary">
                <div class="summary-line"><span>Total Belanja</span><span class="summary-total" id="total-display">Rp 0</span></div>
                <hr style="border:0; border-top:1px solid #DDE5D2; margin:16px 0;">
                <div class="form-group">
                    <label for="jumlah_bayar">Jumlah Dibayar (Rp) *</label>
                    <input type="number" name="jumlah_bayar" id="jumlah_bayar" min="0" step="1" value="{{ old('jumlah_bayar', '') }}" placeholder="Masukkan nominal pembayaran" autocomplete="off" required>
                    <p class="muted">Masukkan angka saja, tanpa titik atau simbol Rp. Contoh: 50000.</p>
                    <p class="payment-error" id="payment-error">Pembayaran harus sama dengan atau lebih besar dari total belanja.</p>
                </div>
                <div class="summary-line"><span>Kembalian (perkiraan)</span><strong id="change-display">Rp 0</strong></div>
            </div>
            <div class="form-group"><label for="catatan">Catatan Transaksi</label><textarea name="catatan" id="catatan" placeholder="Catatan tambahan (opsional)">{{ old('catatan') }}</textarea></div>
            <div class="actions"><button type="submit" class="button primary">Simpan Transaksi</button><a href="{{ route('transaksi-penjualan.index') }}" class="button secondary">Batal</a></div>
        </section>
    </form>
    @endif
</main>

<script>
(function () {
    const productList = document.getElementById('product-list');
    const addButton = document.getElementById('add-product');
    const paymentInput = document.getElementById('jumlah_bayar');
    const transactionForm = document.getElementById('transaction-form');

    function rupiah(value) {
        return 'Rp ' + Math.round(Number(value) || 0).toLocaleString('id-ID');
    }

    function getPrice(option) {
        if (!option || !option.value) return 0;
        const price = Number(option.dataset.price);
        return Number.isFinite(price) ? price : 0;
    }

    function getTotal() {
        let total = 0;
        document.querySelectorAll('.product-row').forEach(row => {
            const select = row.querySelector('.product-select');
            const quantityInput = row.querySelector('.quantity-input');
            const option = select.options[select.selectedIndex];
            const price = getPrice(option);
            const stock = option && option.value ? parseInt(option.dataset.stock, 10) || 0 : 0;
            const quantity = Math.max(0, parseInt(quantityInput.value, 10) || 0);
            const subtotal = price * quantity;
            total += subtotal;
            row.querySelector('.line-subtotal').textContent = 'Subtotal: ' + rupiah(subtotal);
            row.querySelector('.product-info').textContent = select.value
                ? 'Harga satuan: ' + rupiah(price) + ' | Stok tersedia: ' + stock
                : 'Pilih produk terlebih dahulu.';
            quantityInput.max = stock > 0 ? stock : 1;
        });
        return total;
    }

    function updateTotals() {
        const total = getTotal();
        document.getElementById('total-display').textContent = rupiah(total);

        // Baca nilai mentah input, jangan mengubah atau memformat nilainya.
        const paymentText = paymentInput ? paymentInput.value : '';
        const payment = paymentText === '' ? 0 : Number(paymentText);

        document.getElementById('change-display').textContent =
            rupiah(Math.max(0, payment - total));

        document.getElementById('payment-error').style.display =
            paymentText !== '' && (!Number.isFinite(payment) || payment < total)
                ? 'block' : 'none';
    }

    function refreshProductOptions() {
        const rows = [...document.querySelectorAll('.product-row')];
        const selectedIds = rows.map(row => row.querySelector('.product-select').value).filter(Boolean);
        rows.forEach(row => {
            const select = row.querySelector('.product-select');
            [...select.options].forEach(option => {
                if (!option.value) return;
                option.disabled = selectedIds.includes(option.value) && option.value !== select.value;
            });
        });
    }

    window.removeProduct = function (button) {
        const rows = document.querySelectorAll('.product-row');
        if (rows.length <= 1) {
            alert('Minimal harus ada satu produk.');
            return;
        }
        button.closest('.product-row').remove();
        refreshProductOptions();
        updateTotals();
    };

    addButton?.addEventListener('click', () => {
        const firstRow = document.querySelector('.product-row');
        const newRow = firstRow.cloneNode(true);
        newRow.querySelector('.product-select').value = '';
        newRow.querySelector('.quantity-input').value = 1;
        newRow.querySelector('.line-subtotal').textContent = 'Subtotal: Rp 0';
        newRow.querySelector('.product-info').textContent = 'Pilih produk terlebih dahulu.';
        productList.appendChild(newRow);
        refreshProductOptions();
        updateTotals();
    });

    productList?.addEventListener('change', event => {
        if (event.target.matches('.product-select')) {
            const row = event.target.closest('.product-row');
            const quantityInput = row.querySelector('.quantity-input');
            const option = event.target.options[event.target.selectedIndex];
            const stock = Number(option?.dataset.stock || 0);
            quantityInput.value = stock > 0 ? 1 : 0;
            refreshProductOptions();
        }
        updateTotals();
    });

    productList?.addEventListener('input', event => {
        if (event.target.matches('.quantity-input')) {
            const row = event.target.closest('.product-row');
            const select = row.querySelector('.product-select');
            const option = select.options[select.selectedIndex];
            const stock = Number(option?.dataset.stock || 0);
            const quantity = parseInt(event.target.value, 10) || 0;
            if (stock > 0 && quantity > stock) event.target.value = stock;
        }
        updateTotals();
    });

    paymentInput?.addEventListener('input', updateTotals);
    paymentInput?.addEventListener('change', updateTotals);

    transactionForm?.addEventListener('submit', event => {
        const total = getTotal();
        const paymentText = paymentInput.value.trim();
        const payment = Number(paymentText);
        let invalid = false;

        document.querySelectorAll('.product-row').forEach(row => {
            const select = row.querySelector('.product-select');
            const quantityInput = row.querySelector('.quantity-input');
            const option = select.options[select.selectedIndex];
            const stock = Number(option?.dataset.stock || 0);
            const quantity = parseInt(quantityInput.value, 10) || 0;

            if (!select.value || stock < 1 || quantity < 1 || quantity > stock) invalid = true;
        });

        if (invalid) {
            event.preventDefault();
            alert('Periksa produk dan jumlahnya. Jumlah tidak boleh melebihi stok tersedia.');
            return;
        }

        if (paymentText === '' || !Number.isFinite(payment) || payment < total) {
            event.preventDefault();
            document.getElementById('payment-error').style.display = 'block';
            paymentInput.focus();
            return;
        }

        // Tampilkan nilai yang benar-benar akan dikirim untuk pemeriksaan.
        console.log('Nominal pembayaran yang dikirim:', paymentInput.value);
    });

    updateTotals();
})();
</script>
</body>
</html>
