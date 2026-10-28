
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pesanan</h2>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Kode Pesanan:</strong> {{ $pesanan->kode_pesanan }}</p>
            <p><strong>Nama Penerima:</strong> {{ $pesanan->nama_penerima }}</p>
            <p><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>
            <p><strong>No. Telepon:</strong> {{ $pesanan->no_telepon }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $pesanan->metode_pembayaran }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format((float) $pesanan->total_harga, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ $pesanan->status }}</p>
            <p><strong>Catatan:</strong> {{ $pesanan->catatan ?? '-' }}</p>
            <p><strong>Tanggal Pesanan:</strong> {{ $pesanan->created_at?->format('d-m-Y H:i') }}</p>
            <p><strong>Pemesan:</strong> {{ $pesanan->user->name ?? '-' }}</p>

            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
