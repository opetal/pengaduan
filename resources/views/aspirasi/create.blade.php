@extends('layouts.app')
@section('title','Tambah Aspirasi')
@section('content')
<h1>Tambah Aspirasi</h1>
<form action="{{ route('aspirasi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-select" required>
            <option value="">- Pilih Kategori -</option>
            @foreach($kategori as $k)
                <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input name="judul" type="text" class="form-control" value="{{ old('judul') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Isi</label>
        <textarea name="isi" class="form-control" rows="5" required>{{ old('isi') }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Lampiran (opsional)</label>
        <input name="lampiran" type="file" class="form-control">
    </div>
    <button class="btn btn-primary">Kirim Aspirasi</button>
</form>
@endsection