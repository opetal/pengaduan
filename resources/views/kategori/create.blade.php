@extends('layouts.app')
@section('title','Tambah Kategori')
@section('content')
<h1>Tambah Kategori</h1>
<form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori') }}" required>
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection