<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['id_penulis', 'id_kategori', 'judul', 'isi', 'gambar', 'hari_tanggal'];

    // Relasi ke Penulis (Setiap artikel ditulis oleh satu penulis)
    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis', 'id');
    }

    // Relasi ke Kategori (Setiap artikel punya satu kategori)
    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'id_kategori', 'id');
    }
}