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
        Schema::create('daftar_hargas', function (Blueprint $table) {
            $table->id();
            $table->string('id_barang')->unique();
            $table->string('nama_barang');
            $table->string('satuan');
            $table->decimal('harga', 15, 2);
            $table->enum('status', ['Menunggu', 'Disetejui', 'Ditolak'])->default('Menunggu');
            $table->timestamp('tgl_input')->nullable();
            $table->timestamp('tgl_disetujui')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_hargas');
    }
};
