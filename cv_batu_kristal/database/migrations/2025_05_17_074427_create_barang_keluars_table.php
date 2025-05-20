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
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id('id_keluar');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_permintaan');
            $table->integer('jumlah');
            $table->date('tgl_keluar');
            $table->timestamps();

            // Foreign key ke tabel permintaan (pastikan tabel permintaans/id_permintaan ada)
            $table->foreign('id_permintaan')->references('id')->on('permintaans')->onDelete('cascade');
            // Foreign key ke tabel barang (pastikan tabel barangs/id_barang ada)
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }
};
