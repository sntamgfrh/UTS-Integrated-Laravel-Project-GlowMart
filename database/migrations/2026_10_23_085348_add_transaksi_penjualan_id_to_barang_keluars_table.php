<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->foreignId('transaksi_penjualan_id')
                ->nullable()
                ->after('produk_id')
                ->constrained('transaksi_penjualans')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->dropConstrainedForeignId('transaksi_penjualan_id');
        });
    }
};
