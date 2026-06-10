@extends('layouts.app')

@section('title', 'Kelola Artikel')

@section('content')
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-0">
        <h6 class="m-0 fw-bold text-dark">Data Artikel Blog</h6>
        <a href="{{ route('artikel.create') }}" class="btn btn-sm btn-success px-3">+ Tulis Artikel</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 13px;">
                <thead class="table-light text-secondary">
                    <tr>
                        <th class="px-4 py-3" style="width: 60px;">No</th>
                        <th class="py-3" style="width: 100px;">Cover</th>
                        <th class="py-3">Judul Artikel</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3">Penulis</th>
                        <th class="py-3">Tanggal rilis</th>
                        <th class="px-4 py-3 text-center" style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikel as $index => $item)
                    <tr>
                        <td class="px-4 py-3 text-muted">{{ $index + 1 }}</td>
                        <td class="py-3">
    @if($item->gambar)
        <img src="{{ asset('storage/gambar/' . $item->gambar) }}" class="rounded shadow-sm" style="width: 65px; height: 45px; object-fit: cover;">
    @else
        <span class="badge bg-light text-secondary border">No Image</span>
    @endif
</td>
                        <td class="py-3 fw-semibold text-dark">{{ $item->judul }}</td>
                        <td class="py-3">
                            <span class="badge bg-secondary opacity-75">{{ $item->kategori->nama_kategori ?? 'Umum' }}</span>
                        </td>
                        <td class="py-3 text-capitalize text-muted">{{ $item->penulis->nama_depan ?? 'Anonim' }}</td>
                        <td class="py-3 text-muted small">{{ $item->hari_tanggal }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-sm btn-outline-primary px-2 py-1" style="font-size: 11px;">Edit</a>
                                <form action="{{ route('artikel.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" style="font-size: 11px;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">Belum ada artikel yang diterbitkan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection