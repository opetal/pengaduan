@extends('layouts.app')
@section('title','Dashboard Siswa')
@section('content')

<div class="container mt-4">
    <!-- Header -->
    <div class="bg-primary text-white p-4 rounded-3 shadow mb-4">
        <h1 class="h3 mb-1"><i class="bi bi-person-circle me-2"></i>Dashboard Siswa</h1>
        <p class="mb-0 opacity-75">Kelola dan pantau aspirasi Anda</p>
    </div>

    <!-- Stats Card -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-success bg-opacity-10 text-success p-3 rounded-3">
                                <i class="bi bi-send-check fs-3"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Aspirasi Dikirim</h6>
                            <h3 class="mb-0 fw-bold text-success">{{ $aspirasi }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="{{ route('aspirasi.create') }}" class="btn btn-success w-100 py-3">
                <i class="bi bi-plus-circle me-2"></i>Kirim Aspirasi
            </a>
        </div>
        <div class="col-md-6 mb-3">
            <a href="{{ route('aspirasi.index') }}" class="btn btn-outline-primary w-100 py-3">
                <i class="bi bi-eye me-2"></i>Lihat Semua Aspirasi
            </a>
        </div>
    </div>

    <!-- Quick Info -->
    <div class="alert alert-primary d-flex align-items-center" role="alert">
        <i class="bi bi-info-circle-fill me-2 fs-5"></i>
        <div>
            Aspirasi yang dikirim akan ditinjau oleh admin dan statusnya dapat Anda pantau di halaman "Lihat Semua Aspirasi".
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection