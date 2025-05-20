<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Permintaan;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluars';
    protected $primaryKey = 'id_keluar';
    protected $fillable = [
        'id_barang',
        'id_permintaan',
        'jumlah',
        'tgl_keluar',
    ];

    // Relasi ke tabel Barang
    public function barang()
    {
        return $this->belongsTo(BarangKeluar::class, 'id_barang');
    }

    // Relasi ke tabel Permintaan
    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class, 'id_permintaan');
    }
}
