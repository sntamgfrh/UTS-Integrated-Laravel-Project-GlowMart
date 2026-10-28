<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananDiproses extends Model
{
    protected $table = 'pesanan_diproses';

    protected $fillable = [
        'kode_pesanan',
        'nama_pelanggan',
        'nama_produk',
        'jumlah',
        'tanggal_pesanan',
        'status',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_pesanan' => 'date',
            'jumlah' => 'integer',
        ];
    }
}
