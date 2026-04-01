@extends('layouts.app')
@section('title','Edit Aspirasi')
@section('content')
<h1>Edit Aspirasi</h1>
<form action="{{ route('aspirasi.update', $aspirasi) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-select" required>
            @foreach($kategori as $k)
                <option value="{{ $k->id }}" {{ $aspirasi->kategori_id === $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input name="judul" type="text" class="form-control" value="{{ old('judul', $aspirasi->judul) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Isi</label>
        <textarea name="isi" class="form-control" rows="5" required>{{ old('isi', $aspirasi->isi) }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Lampiran (opsional)</label>
        <input name="lampiran" type="file" class="form-control">
        @if($aspirasi->lampiran)
            <small>File sekarang: <a href="{{ asset('storage/' . $aspirasi->lampiran) }}" target="_blank">lihat</a></small>
        @endif
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection