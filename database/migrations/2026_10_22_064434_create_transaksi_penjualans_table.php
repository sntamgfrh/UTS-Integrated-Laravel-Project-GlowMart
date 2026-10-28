<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_transaksi_penjualans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('transaksi_penjualan_id')
                ->constrained('transaksi_penjualans')
                ->cascadeOnDelete();

            $table->foreignId('produk_id')
                ->constrained('products')
                ->restrictOnDelete();

            $table->unsignedInteger('jumlah');
            $table->decimal('harga_satuan', 12, 2);
            $table->decimal('subtotal', 12, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_penjualans');
    }
};