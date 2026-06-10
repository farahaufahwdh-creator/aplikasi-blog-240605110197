<?php

namespace App\Http\Controllers;

use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class KategoriArtikelController extends Controller
{
    // 1. Tampilkan Semua Data Kategori
    public function index()
    {
        $kategori = KategoriArtikel::all();
        return view('kategori.index', compact('kategori'));
    }

    // 2. Tampilkan Form Tambah Data
    public function create()
    {
        return view('kategori.create');
    }

    // 3. Simpan Data Baru ke Database
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        KategoriArtikel::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kategori.index')->with('sukses', 'Data kategori berhasil ditambahkan!');
    }

    public function show(string $id) {}

    // 4. Tampilkan Form Edit Data
    public function edit(string $id)
    {
        $kategori = KategoriArtikel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // 5. Update Data di Database
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $kategori = KategoriArtikel::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kategori.index')->with('sukses', 'Data kategori berhasil diubah!');
    }

    // 6. Hapus Data dari Database
    public function destroy(string $id)
    {
        $kategori = KategoriArtikel::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('sukses', 'Data kategori berhasil dihapus!');
    }
}