<?php

use App\Http\Controllers\Cliente\LoginCliente;
use App\Http\Controllers\Cliente\PerfilCliente;
use App\Http\Controllers\Cliente\RegistroCliente;
use App\Http\Controllers\Cliente\VendaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginCliente::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginCliente::class, 'login'])->name('login');
Route::get('/logout', [LoginCliente::class, 'logout'])->name('logout');

Route::get('/registro', [RegistroCliente::class, 'showRegistroForm'])->name('registro.form');
Route::post('/registro', [RegistroCliente::class, 'store'])->name('registro');

Route::middleware(['is_cliente'])->group(function () {
    Route::get('/area', [PerfilCliente::class, 'areaCliente'])->name('areaCliente');
    Route::get('/perfil', [PerfilCliente::class, 'index'])->name('perfil');

    // Rotas de compra
    Route::post('/comprar', [VendaController::class, 'store'])->name('comprar');
    Route::get('/comprar/resumo/{variacaoProduto}/{quantidade}', [VendaController::class, 'resumo'])->name('comprar.resumo');
    Route::post('/comprar/finalizar', [VendaController::class, 'finalizar'])->name('comprar.finalizar');
});
