<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriaRequest;
use App\Models\Categoria;
use App\Repositories\CategoriaRepository;

class CategoriaController extends Controller
{
    public function __construct(
        private CategoriaRepository $categoriaRepository
    ) {}

    public function index()
    {
        $categorias = $this->categoriaRepository->paginateOrderedByName();

        return view('pages.admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('pages.admin.categorias.criar');
    }

    public function store(CategoriaRequest $request)
    {
        $dados = $request->validated();

        $this->categoriaRepository->create($dados);

        return redirect()
            ->route('admin.categorias.index')
            ->with('success', 'Categoria cadastrada com sucesso.');
    }

    public function edit(Categoria $categoria)
    {
        return view('pages.admin.categorias.editar', compact('categoria'));
    }

    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $dados = $request->validated();

        $this->categoriaRepository->update($categoria, $dados);

        return redirect()
            ->route('admin.categorias.index')
            ->with('success', 'Categoria atualizada com sucesso.');
    }

    public function destroy(Categoria $categoria)
    {
        $this->categoriaRepository->delete($categoria);

        return redirect()
            ->route('admin.categorias.index')
            ->with('success', 'Categoria removida com sucesso.');
    }
}
