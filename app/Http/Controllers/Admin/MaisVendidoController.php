<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\MaisVendidoRepository;

class MaisVendidoController extends Controller
{
    public function __construct(
        private MaisVendidoRepository $maisVendidoRepository
    ) {}

    public function index()
    {
        $maisVendidos = $this->maisVendidoRepository->listarTodos();

        return view('pages.admin.mais_vendidos.index', compact('maisVendidos'));
    }
}
