<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\MaisVendidoRepository;

class DashboardController extends Controller
{
    public function __construct(
        private MaisVendidoRepository $maisVendidoRepository
    ) {}

    public function index()
    {
        $maisVendidos = $this->maisVendidoRepository->listarTop(10);

        return view('pages.admin.dashboard', compact('maisVendidos'));
    }
}
