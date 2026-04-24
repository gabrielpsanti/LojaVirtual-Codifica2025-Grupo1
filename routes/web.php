<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publico\ProdutoController;

// Página de produtos femininos
Route::get('/produtos/femininos', [ProdutoController::class, 'feminino']);
Route::get('/produtos/masculinos', [ProdutoController::class, 'masculino']);