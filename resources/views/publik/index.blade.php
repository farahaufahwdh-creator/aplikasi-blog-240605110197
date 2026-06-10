@extends('layouts.publik')

@section('title', 'Beranda')

@section('content')
<div class="row">
    <!-- Kolom Kiri: Daftar Artikel -->
    <div class="col-lg-8">
        @forelse($artikel as $item)
            <div class="card card-custom p-4 bg-white shadow-sm">
                @if($item->gambar)
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/gambar/' . $item->gambar) }}" class="img-fluid rounded" style="max-height: 350px; width: 100%; object-fit: cover;" alt="{{ $item->judul }}">
                    </div>
                @endif
                
                <div class="mb-2">
                    <a href="{{ route('publik.index', ['kategori' => $item->id_kategori]) }}" class="badge-category">
                        {{ $item->kategori->nama_kategori ?? 'Umum' }}
                    </a>
                    <span class="text-muted ms-2" style="font-size: 11px;">{{ $item->hari_tanggal }}</span>
                </div>

                <h4 class="fw-bold mb-3" style="color: #2c3e50;">{{ $item->judul }}</h4>
                
                <p class="text-secondary" style="font-size: 13.5px; line-height: 1.6;">
                    {{ Str::limit($item->isi, 180, '...') }}
                </p>

                <div class="mt-2">
                    <a href="{{ route('publik.detail', $item->id) }}" class="btn-readmore">Baca Selengkapnya</a>
                </div>
            </div>
        @empty
            <div class="card card-custom p-5 text-center bg-white shadow-sm">
                <p class="text-muted mb-0">Belum ada artikel dalam kategori ini.</p>
            </div>
        @endif
    </div>

    <!-- Kolom Kanan: Widget Kategori -->
    <div class="col-lg-4">
        <div id="widget-kategori" class="card card-custom p-4 bg-white shadow-sm">
            <h6 class="widget-title">Kategori Artikel</h6>
            <div class="list-group list-group-flush">
                <!-- Tautan Semua Artikel -->
                <a href="{{ route('publik.index') }}" class="list-group-item-custom {{ !request()->has('kategori') ? 'fw-bold text-success' : '' }}">
                    <span>Semua Artikel</span>
                    <span class="badge rounded-pill bg-light text-dark border">{{ $totalArtikel }}</span>
                </a>
                
                <!-- Looping Daftar Kategori dari Database -->
                @foreach($kategori as $kat)
                    <a href="{{ route('publik.index', ['kategori' => $kat->id]) }}" class="list-group-item-custom {{ request('kategori') == $kat->id ? 'fw-bold text-success' : '' }}">
                        <span>{{ $kat->nama_kategori }}</span>
                        <span class="badge rounded-pill bg-light text-dark border">{{ $kat->artikel_count }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection