@extends('layouts.publik')

@section('title', $artikel->judul)

@section('content')
<!-- Jalur Navigasi / Breadcrumb Ringkas -->
<div class="mb-3" style="font-size: 12px;">
    <a href="{{ route('publik.index') }}" class="text-decoration-none text-secondary">Beranda</a> 
    <span class="text-muted">/</span> 
    <span class="text-muted text-success fw-semibold">{{ $artikel->kategori->nama_kategori ?? 'Umum' }}</span>
</div>

<div class="row">
    <!-- Kolom Kiri: Detail Isi Artikel -->
    <div class="col-lg-8">
        <div class="card card-custom p-4 p-md-5 bg-white shadow-sm">
            @if($artikel->gambar)
                <div class="mb-4 text-center">
                    <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" class="img-fluid rounded" style="width: 100%; max-height: 400px; object-fit: cover;" alt="{{ $artikel->judul }}">
                </div>
            @endif

            <h3 class="fw-bold mb-2" style="color: #2c3e50;">{{ $artikel->judul }}</h3>
            
            <div class="d-flex align-items-center gap-2 mb-4 text-muted" style="font-size: 12px;">
                <span class="text-capitalize fw-semibold text-dark">{{ $artikel->penulis->nama_depan ?? 'Anonim' }}</span>
                <span>•</span>
                <span>{{ $artikel->hari_tanggal }}</span>
            </div>

            <div class="text-secondary" style="font-size: 14px; line-height: 1.8; text-align: justify; white-space: pre-line;">
                {{ $artikel->isi }}
            </div>

            <hr class="my-4 opacity-25">
            <a href="{{ route('publik.index') }}" class="text-decoration-none text-success fw-semibold" style="font-size: 13px;">&larr; Kembali ke Beranda</a>
        </div>
    </div>

    <!-- Kolom Kanan: Widget Artikel Terkait -->
    <div class="col-lg-4">
        <div class="card card-custom p-4 bg-white shadow-sm">
            <h6 class="widget-title">Artikel Terkait</h6>
            <div class="d-flex flex-column gap-3">
                @forelse($artikelTerkait as $terkait)
                    <div class="pb-2 border-bottom">
                        <a href="{{ route('publik.detail', $terkait->id) }}" class="text-decoration-none text-dark fw-semibold d-block mb-1" style="font-size: 13px; line-height: 1.4;">
                            {{ $terkait->judul }}
                        </a>
                        <span class="text-muted" style="font-size: 11px;">{{ $terkait->hari_tanggal }}</span>
                    </div>
                @empty
                    <p class="text-muted small mb-0">Tidak ada artikel terkait dalam kategori ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection