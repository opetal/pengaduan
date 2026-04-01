@extends('layouts.app')
@section('title','Kelola Kategori')
@section('content')
<h1>Kelola Kategori</h1>
<p><a class="btn btn-primary" href="{{ route('kategori.create') }}">Tambah Kategori</a></p>
<table class="table table-striped">
    <thead><tr><th>#</th><th>Nama</th><th>Aksi</th></tr></thead>
    <tbody>
        @foreach($kategori as $k)
            <tr>
                <td>{{ $k->id }}</td>
                <td>{{ $k->nama_kategori }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('kategori.edit', $k) }}">Edit</a>
                    <form action="{{ route('kategori.destroy', $k) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kategori?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection