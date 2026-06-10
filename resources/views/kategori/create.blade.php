@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="card border-0 shadow-sm rounded-3" style="max-width: 600px;">
    <div class="card-header bg-white py-3 border-0">
        <h6 class="m-0 fw-bold text-dark">Tambah Kategori Artikel</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan nama kategori" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="4" placeholder="Masukkan keterangan kategori" required></textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-success px-4">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-light border px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection