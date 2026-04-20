<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function store(Request $request)
    {
        dd($request->input('variacao_produto_id'));
    }
}
