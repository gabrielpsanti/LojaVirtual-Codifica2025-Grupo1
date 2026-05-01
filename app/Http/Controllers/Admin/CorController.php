<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CorRequest;
use App\Models\Cor;
use App\Repositories\CorRepository;
use Illuminate\Http\Request;

class CorController extends Controller
{
    public function __construct(
        private CorRepository $corRepository
    ) {}

    public function index(Request $request)
    {
        $filtros = $request->only(['busca']);
        $cores = $this->corRepository->indexDados($filtros)->withQueryString();

        return view('pages.admin.cores.index', compact('cores', 'filtros'));
    }

    public function create()
    {
        return view('pages.admin.cores.criar');
    }

    public function store(CorRequest $request)
    {
        $dados = $request->validated();

        $this->corRepository->create($dados);

        return redirect()
            ->route('admin.cores.index')
            ->with('success', 'Cor cadastrada com sucesso.');
    }

    public function edit(Cor $cor)
    {
        return view('pages.admin.cores.editar', compact('cor'));
    }

    public function update(CorRequest $request, Cor $cor)
    {
        $dados = $request->validated();

        $this->corRepository->update($cor, $dados);

        return redirect()
            ->route('admin.cores.index')
            ->with('success', 'Cor atualizada com sucesso.');
    }

    public function destroy(Cor $cor)
    {
        $this->corRepository->delete($cor);

        return redirect()
            ->route('admin.cores.index')
            ->with('success', 'Cor removida com sucesso.');
    }
}
