@extends('layouts.app')

@section('title', 'Kelola Kategori')

@section('content')
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-0">
        <h6 class="m-0 fw-bold text-dark">Data Kategori Artikel</h6>
        <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-success px-3">+ Tambah Kategori</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 13px;">
                <thead class="table-light text-secondary">
                    <tr>
                        <th class="px-4 py-3" style="width: 80px;">No</th>
                        <th class="py-3">Nama Kategori</th>
                        <th class="py-3">Keterangan</th>
                        <th class="px-4 py-3 text-center" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $index => $item)
                    <tr>
                        <td class="px-4 py-3 text-muted">{{ $index + 1 }}</td>
                        <td class="py-3 fw-semibold text-dark">{{ $item->nama_kategori }}</td>
                        <td class="py-3 text-muted">{{ $item->keterangan }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm btn-outline-primary px-2 py-1" style="font-size: 11px;">Edit</a>
                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" style="font-size: 11px;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">Belum ada data kategori.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection