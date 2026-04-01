<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>@yield('title', 'Pengaduan Aspirasi Siswa')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        /* Navbar Custom */
        .navbar-custom {
            background: linear-gradient(135deg, #1a1d21 0%, #2d3238 100%);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.25rem;
            color: #fff !important;
        }
        
        .navbar-brand i {
            color: #3b82f6;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.75) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: #fff !important;
            background: rgba(59, 130, 246, 0.15);
        }
        
        .nav-link i {
            margin-right: 0.5rem;
        }
        
        .user-card {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        
        .user-card:hover {
            background: rgba(255,255,255,0.15);
        }
        
        .user-name {
            color: #fff;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .user-role {
            color: rgba(255,255,255,0.6);
            font-size: 0.75rem;
        }
        
        .btn-logout {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            color: #fff;
            background: rgba(239, 68, 68, 0.15);
        }
        
        .btn-logout i {
            margin-right: 0.5rem;
        }
    </style>
    
    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container-fluid px-4">
        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="bi bi-megaphone me-2"></i>
            Sistem Aspirasi
        </a>
        
        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        
        <!-- Nav Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('aspirasi*') ? 'active' : '' }}" href="{{ route('aspirasi.index') }}">
                            <i class="bi bi-chat-left-text"></i>Aspirasi
                        </a>
                    </li>
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                                <i class="bi bi-tags"></i>Kategori
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
            
            <!-- Right Side -->
            <div class="d-flex align-items-center">
                @auth
                    <!-- User Card -->
                    <div class="user-card me-3 d-none d-lg-flex align-items-center">
                        <div class="bg-primary bg-opacity-25 text-primary rounded-circle p-2 me-2">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div>
                            <div class="user-name">{{ auth()->user()->name }}</div>
                            <div class="user-role">{{ ucfirst(auth()->user()->role) }}</div>
                        </div>
                    </div>
                    
                    <!-- Logout Button -->
                    <a href="{{ route('logout') }}" class="btn-logout d-none d-lg-inline-flex"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>Logout
                    </a>
                    
                    <!-- Logout Form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light btn-sm px-4">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>