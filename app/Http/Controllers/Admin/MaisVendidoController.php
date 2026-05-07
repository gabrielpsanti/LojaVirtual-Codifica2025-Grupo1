<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\MaisVendidosRepository;

class MaisVendidoController extends Controller
{
    public function __construct(
        private MaisVendidosRepository $maisVendidosRepository
    ) {}

    public function index()
    {
        $maisVendidos = $this->maisVendidosRepository->listarTodos();

        return view('pages.admin.mais_vendidos.index', compact('maisVendidos'));
    }
}
