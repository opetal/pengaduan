@extends('layouts.app')
@section('title','Edit Kategori')
@section('content')
<h1>Edit Kategori</h1>
<form action="{{ route('kategori.update', $kategori) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection