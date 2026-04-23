<?php

use App\Http\Controllers\Publico\HomeController;
use App\Http\Controllers\Publico\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produtos/{produto}/variacoes', [ProdutoController::class, 'variacoes'])
    ->name('produtos.variacoes');

Route::get('/produtos/femininos', [ProdutoController::class, 'feminino']);
Route::get('/produtos/masculinos', [ProdutoController::class, 'masculino']);