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
        Schema::create('pick_ups', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko');
            $table->string('nama_produk');
            $table->string('alamat_penjemputan');
            $table->string('no_telpon');
            $table->string('jenis_cargo');
            $table->string('waktu_penjemputan');
            $table->date('tanggal_penjemputan');
            $table->longText('detail_produk');
            $table->string('status_pickup');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pick_ups');
    }
};
