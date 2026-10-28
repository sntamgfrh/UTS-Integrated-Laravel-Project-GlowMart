<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Inventory Sales</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; }
        body { margin: 0; padding: 30px; background: #F5F5E9; color: #354335; }
        .panel { max-width: 850px; margin: 0 auto; padding: 25px; background: #fff; border: 1px solid #E0E7D4; border-radius: 16px; }
        h1 { font-size: 25px; margin-top: 0; }
        h2 { font-size: 18px; margin-top: 25px; }
        .item { padding: 12px 0; border-bottom: 1px solid #EDF1E3; }
        .label { display: block; margin-bottom: 5px; color: #61745B; font-size: 12px; }
        .value { font-size: 14px; overflow-wrap: anywhere; }
        .btn { display: inline-block; margin-top: 20px; padding: 11px 16px; border-radius: 9px; background: linear-gradient(135deg, #82966A, #61745B, #435641); color: white; text-decoration: none; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 10px; border-bottom: 1px solid #EDF1E3; text-align: left; font-size: 12px; }
        th { background: #F5F5E9; }
    </style>
</head>
<body>
<div class="panel">
    <h1>Detail Pesanan</h1>

    <div class="item">
        <span class="label">Kode Pesanan</span>
        <div class="value">{{ $pesanan->kode_pesanan ?? '-' }}</div>
    </div>

    @if($sumber === 'asli')
        <div class="item">
            <span class="label">Nama Penerima</span>
            <div class="value">{{ $pesanan->nama_penerima ?? '-' }}</div>
        </div>
        <div class="item">
            <span class="label">Alamat</span>
            <div class="value">{{ $pesanan->alamat ?? '-' }}</div>
        </div>
        <div class="item">
            <span class="label">Nomor Telepon</span>
            <div class="value">{{ $pesanan->no_telepon ?? '-' }}</div>
        </div>
        <div class="item">
            <span class="label">Metode Pembayaran</span>
            <div class="value">{{ $pesanan->metode_pembayaran ?? '-' }}</div>
        </div>

        <h2>Produk Pesanan</h2>
        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesanan->detailPesanan as $detail)
                    <tr>
                        <td>{{ $detail->produk->nama_produk ?? 'Produk tidak ditemukan' }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>Rp{{ number_format((float) $detail->harga_satuan, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format((float) $detail->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum ada detail produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="item">
            <span class="label">Total Harga</span>
            <div class="value">Rp{{ number_format((float) $pesanan->total_harga, 0, ',', '.') }}</div>
        </div>
    @else
        <div class="item">
            <span class="label">Nama Pelanggan</span>
            <div class="value">{{ $pesanan->nama_pelanggan ?? '-' }}</div>
        </div>
        <div class="item">
            <span class="label">Nama Produk</span>
            <div class="value">{{ $pesanan->nama_produk ?? '-' }}</div>
        </div>
        <div class="item">
            <span class="label">Jumlah</span>
            <div class="value">{{ $pesanan->jumlah ?? 0 }}</div>
        </div>
        <div class="item">
            <span class="label">Tanggal Pesanan</span>
            <div class="value">{{ $pesanan->tanggal_pesanan ?? '-' }}</div>
        </div>
    @endif

    <div class="item">
        <span class="label">Status</span>
        <div class="value">{{ $pesanan->status ?? '-' }}</div>
    </div>

    <div class="item">
        <span class="label">Catatan</span>
        <div class="value">{{ $pesanan->catatan ?: '-' }}</div>
    </div>

    <a href="{{ route('pesanan-diproses.index') }}" class="btn">Kembali ke Daftar Pesanan</a>
</div>
</body>
</html>
