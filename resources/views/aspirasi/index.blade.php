@extends('layouts.app')
@section('title','Aspirasi Saya')
@section('content')
<h1>Aspirasi Saya</h1>
<p><a class="btn btn-success" href="{{ route('aspirasi.create') }}">Tambah Aspirasi</a></p>
<table class="table table-striped">
    <thead>
        <tr><th>#</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Tgl</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @foreach($aspirasi as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><a href="{{ route('aspirasi.show', $item) }}">{{ $item->judul }}</a></td>
                <td>{{ $item->kategori->nama_kategori }}</td>
                <td>{{ ucfirst($item->status) }}</td>
                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('aspirasi.edit', $item) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $aspirasi->links() }}
@endsection