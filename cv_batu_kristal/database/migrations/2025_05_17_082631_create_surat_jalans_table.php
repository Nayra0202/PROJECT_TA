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
        Schema::create('surat_jalans', function (Blueprint $table) {
            $table->id('id_surat_jalan');
            $table->unsignedBigInteger('id_permintaan'); // foreign key
            $table->date('tanggal');
            $table->string('nama_pemesan'); // diisi otomatis dari relasi permintaan
            $table->string('nama_barang');  // diisi otomatis dari relasi barang_keluar
            $table->integer('jumlah');      // diisi otomatis dari relasi barang_keluar
            $table->string('satuan');       // diisi otomatis dari relasi barang_keluar
            $table->timestamps();

            $table->foreign('id_permintaan')->references('id')->on('permintaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_jalans');
    }
};
