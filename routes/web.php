<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// =========================================
// ROUTE TEST UNTUK MIDDLEWARE ROLE
// =========================================
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/test', function () {
        return '✅ Halo Admin! Middleware admin BEKERJA.';
    })->name('admin.test');
});

Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/staff/test', function () {
        return '✅ Halo Staff! Middleware staff BEKERJA.';
    })->name('staff.test');
});

Route::middleware(['auth', 'pelanggan'])->group(function () {
    Route::get('/pelanggan/test', function () {
        return '✅ Halo Pelanggan! Middleware pelanggan BEKERJA.';
    })->name('pelanggan.test');
});

require __DIR__.'/auth.php';
