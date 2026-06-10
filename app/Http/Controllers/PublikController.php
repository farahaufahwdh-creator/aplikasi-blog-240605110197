<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class PublikController extends Controller
{
    // 1. Halaman Utama Pengunjung
    public function index(Request $request)
    {
        // Ambil semua kategori beserta hitungan jumlah artikel untuk widget samping
        $kategori = KategoriArtikel::withCount('artikel')->orderBy('nama_kategori', 'asc')->get();
        
        // Total seluruh artikel untuk info di widget Semua Artikel
        $totalArtikel = Artikel::count();

        // Query dasar mengambil artikel berelasi, diurutkan dari yang terbaru (Langkah 17/UAS)
        $query = Artikel::with(['penulis', 'kategori'])->orderBy('id', 'desc');

        // Jika pengunjung mengklik filter kategori tertentu di widget samping
        if ($request->has('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        // Batasi hanya menampilkan 5 artikel terbaru sesuai ketentuan soal UAS
        $artikel = $query->take(5)->get();

        return view('publik.index', compact('artikel', 'kategori', 'totalArtikel'));
    }

    // 2. Halaman Detail Artikel
    public function detail($id)
    {
        // Cari artikel berdasarkan ID atau gagalkan jika tidak ketemu
        $artikel = Artikel::with(['penulis', 'kategori'])->findOrFail($id);

        // Ambil 5 artikel terkait dengan kategori yang sama (kecuali artikel yang sedang dibaca)
        $artikelTerkait = Artikel::where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('publik.detail', compact('artikel', 'artikelTerkait'));
    }
}