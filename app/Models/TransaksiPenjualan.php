<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransaksiPenjualan extends Model
{
    protected $table = 'transaksi_penjualans';

    protected $fillable = [
        'kode_transaksi',
        'tanggal_transaksi',
        'nama_pelanggan',
        'total_harga',
        'jumlah_bayar',
        'kembalian',
        'metode_pembayaran',
        'status',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_transaksi' => 'date',
            'total_harga' => 'decimal:2',
            'jumlah_bayar' => 'decimal:2',
            'kembalian' => 'decimal:2',
        ];
    }

    public function detailTransaksi(): HasMany
    {
        return $this->hasMany(
            DetailTransaksiPenjualan::class,
            'transaksi_penjualan_id'
        );
    }
}
