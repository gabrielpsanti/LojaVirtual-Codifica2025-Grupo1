<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return '<h1>Hello World</h1>';
});