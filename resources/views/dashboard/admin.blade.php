@extends('layouts.app')
@section('title','Dashboard Admin')
@section('content')

<div class="container-fluid px-4 py-4">
    <!-- Header Section -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <h2 class="fw-bold text-dark mb-1">
                <i class="bi bi-speedometer2 me-2 text-primary"></i>Dashboard Admin
            </h2>
            <p class="text-muted mb-0">Selamat datang, <strong>{{ auth()->user()->name }}</strong>! 👋</p>
        </div>
        <div class="col-auto">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
                <i class="bi bi-shield-check me-1"></i>{{ ucfirst(auth()->user()->role) }}
            </span>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100 hover-shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1 small text-uppercase fw-semibold">Total Aspirasi</p>
                            <h3 class="mb-0 fw-bold text-primary">{{ $aspirasi ?? 0 }}</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                            <i class="bi bi-chat-left-text fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100 hover-shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1 small text-uppercase fw-semibold">Pending</p>
                            <h3 class="mb-0 fw-bold text-warning">{{ $pending ?? 0 }}</h3>
                        </div>
                        <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-circle">
                            <i class="bi bi-clock-history fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100 hover-shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1 small text-uppercase fw-semibold">Diproses</p>
                            <h3 class="mb-0 fw-bold text-info">{{ $diproses ?? 0 }}</h3>
                        </div>
                        <div class="bg-info bg-opacity-10 text-info p-3 rounded-circle">
                            <i class="bi bi-gear fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100 hover-shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1 small text-uppercase fw-semibold">Selesai</p>
                            <h3 class="mb-0 fw-bold text-success">{{ $selesai ?? 0 }}</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 text-success p-3 rounded-circle">
                            <i class="bi bi-check-circle fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <h5 class="fw-semibold mb-3 text-dark">
            <i class="bi bi-lightning-charge me-2 text-warning"></i>Aksi Cepat
        </h5>
    </div>
    <div class="col-12">
        <div class="row justify-content-center g-3">
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('aspirasi.index') }}" class="card border-0 shadow-sm text-decoration-none hover-card">
                    <div class="card-body text-center py-4">
                        <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle d-inline-flex mb-3">
                            <i class="bi bi-list-task fs-3"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Kelola Aspirasi</h6>
                        <p class="text-muted small mb-0">Lihat & kelola semua aspirasi</p>
                    </div>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('kategori.index') }}" class="card border-0 shadow-sm text-decoration-none hover-card">
                    <div class="card-body text-center py-4">
                        <div class="bg-success bg-opacity-10 text-success p-3 rounded-circle d-inline-flex mb-3">
                            <i class="bi bi-tags fs-3"></i>
                        </div>
                        <h6 class="fw-semibold mb-1 text-dark">Kelola Kategori</h6>
                        <p class="text-muted small mb-0">Atur kategori aspirasi</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

    <!-- Recent Activity -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="fw-semibold mb-0">
                        <i class="bi bi-activity me-2 text-primary"></i>Aktivitas Terbaru
                    </h6>
                </div>
                <div class="card-body">
                    <div class="text-center py-4 text-muted">
                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                        <p class="mb-0">Belum ada aktivitas terbaru</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .hover-shadow {
        transition: all 0.3s ease;
    }
    .hover-shadow:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
    .hover-card {
        transition: all 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12) !important;
    }
</style>

@endsection