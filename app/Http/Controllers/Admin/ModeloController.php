<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModeloRequest;
use App\Models\Modelo;
use App\Repositories\ModeloRepository;

class ModeloController extends Controller
{
    public function __construct(
        private ModeloRepository $modeloRepository
    ) {}

    public function index()
    {
        $modelos = $this->modeloRepository->paginateOrderedByName();

        return view('pages.admin.modelos.index', compact('modelos'));
    }

    public function create()
    {
        $categorias = $this->modeloRepository->getCategorias();

        return view('pages.admin.modelos.criar', compact('categorias'));
    }

    public function store(ModeloRequest $request)
    {
        $dados = $request->validated();

        $this->modeloRepository->create($dados);

        return redirect()
            ->route('admin.modelos.index')
            ->with('success', 'Modelo cadastrado com sucesso.');
    }

    public function edit(Modelo $modelo)
    {
        $categorias = $this->modeloRepository->getCategorias();

        return view('pages.admin.modelos.editar', compact('modelo', 'categorias'));
    }

    public function update(ModeloRequest $request, Modelo $modelo)
    {
        $dados = $request->validated();

        $this->modeloRepository->update($modelo, $dados);

        return redirect()
            ->route('admin.modelos.index')
            ->with('success', 'Modelo atualizado com sucesso.');
    }

    public function destroy(Modelo $modelo)
    {
        $this->modeloRepository->delete($modelo);

        return redirect()
            ->route('admin.modelos.index')
            ->with('success', 'Modelo removido com sucesso.');
    }
}
