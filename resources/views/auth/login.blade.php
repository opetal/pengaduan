@extends('layouts.app')

@section('title', 'Login')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <!-- Card Login -->
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4">
                    
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <div class="bg-primary bg-opacity-10 text-primary d-inline-flex p-3 rounded-circle mb-3">
                            <i class="bi bi-person fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-1">Selamat Datang!</h4>
                        <p class="text-muted small">Silakan login untuk melanjutkan</p>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
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
                                       placeholder="••••••••" required>
                            </div>
                        </div>

                        <!-- Remember & Forgot -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label small text-muted" for="remember">Ingat saya</label>
                            </div>
                            <a href="#" class="small text-primary text-decoration-none">Lupa password?</a>
                        </div>

                        <!-- Button -->
                        <button class="btn btn-primary w-100 py-2 fw-semibold">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Login
                        </button>
                    </form>

                    <!-- Footer -->
                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0">
                            Belum punya akun? 
                            <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">Daftar sekarang</a>
                        </p>
                    </div>

                </div>
            </div>

            <!-- Branding -->
            <div class="text-center mt-4">
                <small class="text-muted">&copy; {{ date('Y') }} Sistem Aspirasi. All rights reserved.</small>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection