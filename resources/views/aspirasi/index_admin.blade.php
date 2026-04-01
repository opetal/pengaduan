@extends('layouts.app')
@section('title','Semua Aspirasi')
@section('content')
<h1>Semua Aspirasi</h1>
<table class="table table-bordered">
    <thead>
        <tr><th>#</th><th>Nama Siswa</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Tgl</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @foreach($aspirasi as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->user->name }}</td>
                <td><a href="{{ route('aspirasi.show', $item) }}">{{ $item->judul }}</a></td>
                <td>{{ $item->kategori->nama_kategori }}</td>
                <td>
                    <form action="{{ route('aspirasi.updateStatus', $item) }}" method="POST" class="d-flex gap-2">
                        @csrf
                        <select name="status" class="form-select form-select-sm">
                            @foreach(['pending','diproses','selesai'] as $status)
                                <option value="{{ $status }}" {{ $item->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-outline-primary">Update</button>
                    </form>
                </td>
                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                <td>
                    <form action="{{ route('aspirasi.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus aspirasi ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $aspirasi->links() }}
@endsection