<?php

namespace App\Http\Controllers;

use App\Models\User; // Menggunakan Model User yang membaca tabel penulis
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PenulisController extends Controller
{
    // 1. Tampilkan Semua Data Penulis
    public function index()
    {
        $penulis = User::all();
        return view('penulis.index', compact('penulis'));
    }

    // 2. Tampilkan Form Tambah Penulis
    public function create()
    {
        return view('penulis.create');
    }

    // 3. Simpan Data Penulis Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required',
            'user_name' => 'required',
            'password' => 'required',
        ]);

        $namaFoto = 'default.png';

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFoto = time() . '_' . $file->getClientOriginalExtension();
            $file->storeAs('public/penulis', $namaFoto);
        }

        User::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang ?? '',
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password),
            'foto' => $namaFoto,
        ]);

        return redirect()->route('penulis.index')->with('sukses', 'Data penulis berhasil ditambahkan!');
    }

    public function show(string $id) {}

    // 4. Tampilkan Form Edit
    public function edit(string $id)
    {
        $penulis = User::findOrFail($id);
        return view('penulis.edit', compact('penulis'));
    }

    // 5. Update Data Penulis
    public function update(Request $request, string $id)
    {
        $penulis = User::findOrFail($id);

        $request->validate([
            'nama_depan' => 'required',
            'user_name' => 'required',
        ]);

        $data = [
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang ?? '',
            'user_name' => $request->user_name,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFoto = time() . '_' . $file->getClientOriginalExtension();
            $file->storeAs('public/penulis', $namaFoto);
            $data['foto'] = $namaFoto;
        }

        $penulis->update($data);

        return redirect()->route('penulis.index')->with('sukses', 'Data penulis berhasil diubah!');
    }

    // 6. Hapus Data Penulis
    public function destroy(string $id)
    {
        $penulis = User::findOrFail($id);
        $penulis->delete();

        return redirect()->route('penulis.index')->with('sukses', 'Data penulis berhasil dihapus!');
    }
}