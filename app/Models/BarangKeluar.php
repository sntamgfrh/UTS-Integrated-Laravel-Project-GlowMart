<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluars';

    protected $fillable = [
        'produk_id',
        'transaksi_penjualan_id',
        'user_id',
        'kode_barang_keluar',
        'tanggal_keluar',
        'jumlah',
        'alasan',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_keluar' => 'date',
            'jumlah' => 'integer',
        ];
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaksiPenjualan(): BelongsTo
    {
        return $this->belongsTo(
            TransaksiPenjualan::class,
            'transaksi_penjualan_id'
        );
    }
}
