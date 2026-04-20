<?php

use App\Http\Controllers\Cliente\CompraController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return '<h1>Usuario</h1>';
});

Route::post('/comprar', [CompraController::class, 'store'])
    ->name('comprar');
