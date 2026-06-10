@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="card border-0 shadow-sm rounded-3" style="max-width: 600px;">
    <div class="card-header bg-white py-3 border-0">
        <h6 class="m-0 fw-bold text-dark">Edit Kategori Artikel</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="4" required>{{ $kategori->keterangan }}</textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary px-4">Update</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-light border px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection