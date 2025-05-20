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
        Schema::create('permintaans', function (Blueprint $table) {
            $table->id('id_permintaan');
            $table->string('nama_pemesan');
            $table->text('alamat');
            $table->date('tgl_permintaan');
            $table->unsignedBigInteger('id_barang');
            $table->integer('jumlah');
            $table->decimal('total_harga', 15, 2);
            $table->decimal('total_bayar', 15, 2);
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('daftar_hargas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaans');
    }
};
