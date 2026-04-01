<?php

use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;
use App\Models\Aspirasi;  // ← Tambah ini
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Dashboard route
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        $aspirasi = Aspirasi::count();
        $pending = Aspirasi::where('status', 'pending')->count();
        $diproses = Aspirasi::where('status', 'diproses')->count();
        $selesai = Aspirasi::where('status', 'selesai')->count();
        
        return view('dashboard.admin', compact('aspirasi', 'pending', 'diproses', 'selesai'));
    }

    // Untuk Siswa
    $aspirasi = $user->aspirasi()->count();
    $pending = $user->aspirasi()->where('status', 'pending')->count();
    $diproses = $user->aspirasi()->where('status', 'diproses')->count();
    $selesai = $user->aspirasi()->where('status', 'selesai')->count();
    
    return view('dashboard.siswa', compact('aspirasi', 'pending', 'diproses', 'selesai'));
})->middleware('auth')->name('dashboard');

// Aspirasi routes
Route::middleware(['auth'])->group(function () {
    Route::get('aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
    Route::get('aspirasi/create', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
    Route::get('aspirasi/{aspirasi}', [AspirasiController::class, 'show'])->name('aspirasi.show');
    Route::get('aspirasi/{aspirasi}/edit', [AspirasiController::class, 'edit'])->name('aspirasi.edit');
    Route::put('aspirasi/{aspirasi}', [AspirasiController::class, 'update'])->name('aspirasi.update');
    Route::delete('aspirasi/{aspirasi}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');
    Route::post('aspirasi/{aspirasi}/status', [AspirasiController::class, 'updateStatus'])->name('aspirasi.updateStatus');
});

Route::resource('kategori', KategoriController::class)->except(['show']);