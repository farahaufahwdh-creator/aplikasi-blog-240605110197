<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    protected $table = 'kategori_artikel'; // Nama tabel kustom
    protected $primaryKey = 'id';          // Primary key
    public $timestamps = false;            // Matikan timestamp otomatis

    protected $fillable = ['nama_kategori', 'keterangan'];

    // Hubungan Relasi: Satu kategori punya banyak artikel
    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id_kategori', 'id');
    }
}