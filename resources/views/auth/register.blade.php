@extends('layouts.app')

@section('title', 'Register')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <!-- Card Register -->
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4">
                    
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <div class="bg-primary bg-opacity-10 text-primary d-inline-flex p-3 rounded-circle mb-3">
                            <i class="bi bi-person-plus fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-1">Buat Akun</h4>
                        <p class="text-muted small">Daftar untuk mulai mengirim aspirasi</p>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <!-- Nama -->
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-person text-muted"></i>
                                </span>
                                <input type="text" name="name" class="form-control border-start-0 ps-0" 
                                       value="{{ old('name') }}" placeholder="Nama lengkap" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope text-muted"></i>
                                </span>
                                <input type="email" name="email" class="form-control border-start-0 ps-0" 
                                       value="{{ old('email') }}" placeholder="nama@email.com" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock text-muted"></i>
                                </span>
                                <input type="password" name="password" class="form-control border-start-0 ps-0" 
                                       placeholder="Minimal 8 karakter" required>
                            </div>
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label class="form-label small fw-semibold text-muted">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock-fill text-muted"></i>
                                </span>
                                <input type="password" name="password_confirmation" class="form-control border-start-0 ps-0" 
                                       placeholder="Ulangi password" required>
                            </div>
                        </div>

                        <!-- Button -->
                        <button class="btn btn-primary w-100 py-2 fw-semibold mb-3">
                            <i class="bi bi-check-circle me-2"></i>Daftar Sekarang
                        </button>
                    </form>

                    <!-- Footer -->
                    <div class="text-center">
                        <p class="small text-muted mb-0">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">Login disini</a>
                        </p>
                    </div>

                </div>
            </div>

            <!-- Terms -->
            <div class="text-center mt-4">
                <small class="text-muted">
                    Dengan mendaftar, Anda setuju dengan <a href="#" class="text-primary text-decoration-none">Syarat & Ketentuan</a>
                </small>
            </div>

            <!-- Branding -->
            <div class="text-center mt-3">
                <small class="text-muted">&copy; {{ date('Y') }} Sistem Aspirasi. All rights reserved.</small>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection