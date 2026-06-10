@extends('layouts.app')

@section('title', 'Edit Penulis')

@section('content')
<div class="card border-0 shadow-sm rounded-3" style="max-width: 600px;">
    <div class="card-header bg-white py-3 border-0">
        <h6 class="m-0 fw-bold text-dark">Edit Data Penulis</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('penulis.update', $penulis->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Nama Depan</label>
                    <input type="text" name="nama_depan" class="form-control" value="{{ $penulis->nama_depan }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Nama Belakang</label>
                    <input type="text" name="nama_belakang" class="form-control" value="{{ $penulis->nama_belakang }}" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Username</label>
                <input type="text" name="user_name" class="form-control" value="{{ $penulis->user_name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Password Baru (Kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control" placeholder="Isi hanya jika ingin ganti password">
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Ganti Foto Profil</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
                <div class="form-text" style="font-size: 11px;">Biarkan kosong jika tidak ingin mengganti foto saat ini.</div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary px-4">Update</button>
                <a href="{{ route('penulis.index') }}" class="btn btn-sm btn-light border px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection