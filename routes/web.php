<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObjekWisataController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenggunaController;
use App\Http\Middleware\CekRole;
use App\Models\ObjekWisataModel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Hanya untuk yang sudah login
Route::middleware(['auth:pengguna'])->group(function () {
    Route::get('/dashboard', function () {
        if (!session()->has('role')) {
            return redirect('/login');
        }

        if (session('role') === 'admin') {
            return view('dashboard.admin');
        }

        $objek = ObjekWisataModel::all();
        return view('dashboard.user', compact('objek'));
    })->name('/dashboard');

    Route::get('/pemesanan/create/{id}', [PemesananController::class, 'create'])->name('pemesanan.create');
    Route::post('/pemesanan/store', [PemesananController::class, 'store'])->name('pemesanan.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware([CekRole::class])->group(function () {
        Route::resource('/pengguna', PenggunaController::class);
        Route::resource('/objek', ObjekWisataController::class);
        Route::resource('/pemesanan', PemesananController::class)->except('create', 'store');
    });
});