@extends('layouts.app')

@section('title', 'Kelola Penulis')

@section('content')
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-0">
        <h6 class="m-0 fw-bold text-dark">Data Penulis</h6>
        <a href="{{ route('penulis.create') }}" class="btn btn-sm btn-success px-3">+ Tambah Penulis</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 13px;">
                <thead class="table-light text-secondary">
                    <tr>
                        <th class="px-4 py-3" style="width: 80px;">No</th>
                        <th class="py-3" style="width: 100px;">Foto</th>
                        <th class="py-3">Nama Lengkap</th>
                        <th class="py-3">Username</th>
                        <th class="px-4 py-3 text-center" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penulis as $index => $item)
                    <tr>
                        <td class="px-4 py-3 text-muted">{{ $index + 1 }}</td>
                        <td class="py-3">
    @if($item->foto && $item->foto != 'default.png')
        <img src="{{ asset('storage/penulis/' . $item->foto) }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;" onerror="this.onerror=null; this.src='https://api.dicebear.com/7.x/initials/svg?seed={{ urlencode($item->nama_depan) }}&radius=50';">
    @else
        <img src="https://api.dicebear.com/7.x/initials/svg?seed={{ urlencode($item->nama_depan) }}&radius=50" class="rounded-circle" style="width: 40px; height: 40px;">
    @endif
</td>
                        <td class="py-3 fw-semibold text-dark text-capitalize">{{ $item->nama_depan }} {{ $item->nama_belakang }}</td>
                        <td class="py-3 text-muted"><code>{{ $item->user_name }}</code></td>
                        <td class="px-4 py-3 text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('penulis.edit', $item->id) }}" class="btn btn-sm btn-outline-primary px-2 py-1" style="font-size: 11px;">Edit</a>
                                <form action="{{ route('penulis.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus penulis ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" style="font-size: 11px;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data penulis.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection