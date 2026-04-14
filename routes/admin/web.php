<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\CorController;
use App\Http\Controllers\Admin\LoginAdmin;
use App\Http\Controllers\Admin\ModeloController;
use App\Http\Controllers\Admin\TamanhoController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginAdmin::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginAdmin::class, 'login'])->name('login');

Route::middleware(['is_admin'])->group(function () {
    Route::get('/dashboard', [LoginAdmin::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginAdmin::class, 'logout'])->name('logoutAdmin');

    //CRUD CORES
    Route::resource('/cores', CorController::class)
        ->parameters(['cores' => 'cor'])
        ->except('show');

    //CRUD TAMANHOS
    Route::resource('/tamanhos', TamanhoController::class)
        ->parameters(['tamanhos' => 'tamanho'])
        ->except('show');

    //CRUD CATEGORIAS
    Route::resource('/categorias', CategoriaController::class)
        ->parameters(['categorias' => 'categoria'])
        ->except('show');

    //CRUD MODELOS
    Route::resource('/modelos', ModeloController::class)
        ->parameters(['modelos' => 'modelo'])
        ->except('show');
});
