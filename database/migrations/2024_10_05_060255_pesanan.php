<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('code_pesanan');
            $table->string('sku_transaksi');
            $table->string('total_qty');
            $table->string('total_harga');
            $table->string('nama_customer');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('ekspedisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        {
            Schema::dropIfExists('pesanan');
        }
    }
};
