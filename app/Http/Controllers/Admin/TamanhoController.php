<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TamanhoRequest;
use App\Models\Tamanho;
use App\Repositories\TamanhoRepository;

class TamanhoController extends Controller
{
    public function __construct(
        private TamanhoRepository $tamanhoRepository
    ) {}

    public function index()
    {
        $tamanhos = $this->tamanhoRepository->paginateOrderedByName();

        return view('pages.admin.tamanhos.index', compact('tamanhos'));
    }

    public function create()
    {
        return view('pages.admin.tamanhos.criar');
    }

    public function store(TamanhoRequest $request)
    {
        $dados = $request->validated();

        $this->tamanhoRepository->create($dados);

        return redirect()
            ->route('admin.tamanhos.index')
            ->with('success', 'Tamanho cadastrado com sucesso.');
    }

    public function edit(Tamanho $tamanho)
    {
        return view('pages.admin.tamanhos.editar', compact('tamanho'));
    }

    public function update(TamanhoRequest $request, Tamanho $tamanho)
    {
        $dados = $request->validated();

        $this->tamanhoRepository->update($tamanho, $dados);

        return redirect()
            ->route('admin.tamanhos.index')
            ->with('success', 'Tamanho atualizado com sucesso.');
    }

    public function destroy(Tamanho $tamanho)
    {
        $this->tamanhoRepository->delete($tamanho);

        return redirect()
            ->route('admin.tamanhos.index')
            ->with('success', 'Tamanho removido com sucesso.');
    }
}
