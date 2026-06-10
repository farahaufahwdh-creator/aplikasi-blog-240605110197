@extends('layouts.app')

@section('title', 'Tambah Penulis')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12 col-lg-10 col-xl-8"> <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="m-0 fw-bold text-dark" style="font-size: 16px;">Tambah Penulis Baru</h5>
                </div>
                <div class="card-body p-4 pt-2">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger py-2 mb-3" style="font-size: 12px;">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('penulis.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Nama Depan</label>
                                <input type="text" name="nama_depan" class="form-control" required placeholder="Masukkan nama depan">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Nama Belakang</label>
                                <input type="text" name="nama_belakang" class="form-control" placeholder="Masukkan nama belakang (opsional)">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Username</label>
                            <input type="text" name="user_name" class="form-control" required placeholder="Masukkan username unik untuk login">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Password</label>
                            <input type="password" name="password" class="form-control" required placeholder="Masukkan password minimal 5 karakter">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary" style="font-size: 12px;">Foto Profil</label>
                            <input type="file" name="foto" class="form-control" accept="image/*">
                            <div class="form-text text-muted" style="font-size: 11px;">Format berkas: JPG, JPEG, PNG. Maksimal 2MB.</div>
                        </div>

                        <hr class="text-muted opacity-25 mb-4">

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success px-4" style="font-size: 13px;">Simpan Data</button>
                            <a href="{{ route('penulis.index') }}" class="btn btn-light border px-4" style="font-size: 13px;">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection