@extends('layouts.app')
@section('title','Detail Aspirasi')
@section('content')
<h1>Detail Aspirasi</h1>
<div class="card">
    <div class="card-body">
        <h5>{{ $aspirasi->judul }}</h5>
        <p><strong>Oleh:</strong> {{ $aspirasi->user->name }}</p>
        <p><strong>Kategori:</strong> {{ $aspirasi->kategori->nama_kategori }}</p>
        <p><strong>Status:</strong> {{ ucfirst($aspirasi->status) }}</p>
        <p><strong>Isi:</strong></p>
        <p>{{ $aspirasi->isi }}</p>
        @if($aspirasi->lampiran)
            <p><strong>Lampiran:</strong> <a href="{{ asset('storage/' . $aspirasi->lampiran) }}" target="_blank">Download</a></p>
        @endif
    </div>
</div>
@endsection