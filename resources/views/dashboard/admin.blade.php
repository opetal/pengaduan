@extends('layouts.app')
@section('title','Dashboard Admin')
@section('content')

<div class="container mt-4">
    <!-- Header -->
    <div class="bg-primary text-white p-4 rounded-3 shadow mb-4">
        <h1 class="h3 mb-1"><i class="bi bi-speedometer2 me-2"></i>Dashboard Admin</h1>
        <p class="mb-0 opacity-75">Selamat datang di sistem manajemen aspirasi</p>
    </div>

    <!-- Stats Card -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3">
                                <i class="bi bi-chat-left-text fs-3"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Total Aspirasi</h6>
                            <h3 class="mb-0 fw-bold text-primary">{{ $aspirasi }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="{{ route('aspirasi.index') }}" class="btn btn-primary w-100 py-3">
                <i class="bi bi-list-task me-2"></i>Kelola Aspirasi
            </a>
        </div>
        <div class="col-md-6 mb-3">
            <a href="{{ route('kategori.index') }}" class="btn btn-outline-primary w-100 py-3">
                <i class="bi bi-tags me-2"></i>Kelola Kategori
            </a>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection