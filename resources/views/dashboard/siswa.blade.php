@extends('layouts.app')
@section('title','Dashboard Siswa')
@section('content')

<div class="container-fluid px-4 py-4">
    <!-- Header Section -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <h2 class="fw-bold text-dark mb-1">
                <i class="bi bi-person-circle me-2 text-primary"></i>Dashboard Siswa
            </h2>
            <p class="text-muted mb-0">Selamat datang, <strong>{{ auth()->user()->name }}</strong>! 👋</p>
        </div>
        <div class="col-auto">
            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                <i class="bi bi-mortarboard me-1"></i>{{ ucfirst(auth()->user()->role) }}
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
                            <i class="bi bi-send-check fs-4"></i>
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
                    <a href="{{ route('aspirasi.create') }}" class="card border-0 shadow-sm text-decoration-none hover-card">
                        <div class="card-body text-center py-4">
                            <div class="bg-success bg-opacity-10 text-success p-3 rounded-circle d-inline-flex mb-3">
                                <i class="bi bi-plus-circle fs-3"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Kirim Aspirasi</h6>
                            <p class="text-muted small mb-0">Ajukan aspirasi baru</p>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('aspirasi.index') }}" class="card border-0 shadow-sm text-decoration-none hover-card">
                        <div class="card-body text-center py-4">
                            <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle d-inline-flex mb-3">
                                <i class="bi bi-eye fs-3"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-dark">Lihat Aspirasi</h6>
                            <p class="text-muted small mb-0">Pantau semua aspirasimu</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Alert -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="fw-semibold mb-0">
                        <i class="bi bi-info-circle me-2 text-primary"></i>Informasi
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <i class="bi bi-lightbulb text-warning fs-4 me-3"></i>
                        <div>
                            <p class="mb-0 text-muted">
                                Aspirasi yang dikirim akan ditinjau oleh admin dan statusnya dapat Anda pantau di halaman 
                                <strong>"Lihat Semua Aspirasi"</strong>. Anda akan menerima notifikasi ketika status aspirasi berubah.
                            </p>
                        </div>
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