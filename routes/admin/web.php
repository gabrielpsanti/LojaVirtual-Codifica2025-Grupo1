<?php

use App\Http\Controllers\Admin\LoginAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginAdmin::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginAdmin::class, 'login'])->name('login');

Route::middleware(['is_admin'])->group(function () {
    Route::get('/dashboard', [LoginAdmin::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginAdmin::class, 'logout'])->name('logoutAdmin');
});