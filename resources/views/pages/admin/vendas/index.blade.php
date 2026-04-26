@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Vendas')
@section('titulo-header', 'Vendas')

@section('content')
    <section class="w-full max-w-[95vw] mx-auto flex flex-col gap-4">
        @if ($errors->any())
            <div class="rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="rounded-3xl bg-white px-6 py-5 shadow-sm">
            <form method="GET" action="{{ route('admin.vendas.index') }}" class="flex flex-col gap-4 max-w-3xl">
                <div>
                    <label for="produto_id" class="mb-1 text-sm font-medium text-slate-700">Produto</label>
                    <select id="produto_id" name="produto_id"
                        class="w-full rounded-xl border border-slate-300 px-3 py-2 text-sm text-slate-700">
                        <option value="">Todos</option>
                        @foreach ($produtos as $produto)
                            <option value="{{ $produto->id_produto }}" @selected((string) $filtros['produto_id'] === (string) $produto->id_produto)>
                                {{ $produto->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="cliente_id" class="mb-1 text-sm font-medium text-slate-700">Cliente</label>
                    <select id="cliente_id" name="cliente_id"
                        class="w-full rounded-xl border border-slate-300 px-3 py-2 text-sm text-slate-700">
                        <option value="">Todos</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id_usuario }}" @selected((string) $filtros['cliente_id'] === (string) $cliente->id_usuario)>
                                {{ $cliente->nome }} ({{ $cliente->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="data_venda" class="mb-1 text-sm font-medium text-slate-700">Data da venda</label>
                    <input id="data_venda" name="data_venda" type="date" value="{{ $filtros['data_venda'] }}"
                        class="w-full rounded-xl border border-slate-300 px-3 py-2 text-sm text-slate-700">
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                        class="cursor-pointer rounded-xl bg-slate-800 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700">
                        Filtrar
                    </button>
                    
                    <a href="{{ route('admin.vendas.index') }}"
                        class="inline-flex items-center rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">
                        Limpar filtros
                    </a>
                </div>
            </form>
        </div>

        <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-900 text-left text-xs font-semibold text-slate-200">
                    <tr>
                        <th class="px-6 py-4">VARIAÇÃO</th>
                        <th class="px-6 py-4">CLIENTE</th>
                        <th class="px-6 py-4">QTD</th>
                        <th class="px-6 py-4">PREÇO UNIT.</th>
                        <th class="px-6 py-4">TOTAL</th>
                        <th class="px-6 py-4">DATA | HORA</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-300">
                    @forelse ($vendas as $venda)
                        <tr class="hover:bg-slate-100">

                            <td class="px-6 py-4 text-sm text-slate-700">
                                {{ $venda->variacaoProduto?->produto?->nome ?? 'Produto removido' }}
                                | {{ $venda->variacaoProduto?->cor?->nome ?? 'Cor removida' }}
                                | {{ $venda->variacaoProduto?->tamanho?->nome ?? 'Tamanho removido' }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-700">
                                {{ $venda->usuario?->nome ?? 'Cliente removido' }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $venda->quantidade }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-600">
                                R${{ number_format($venda->preco_unitario, 2, ',', '.') }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-800">
                                R${{ number_format($venda->valor_total, 2, ',', '.') }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $venda->created_at?->format('d/m/Y H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-lg text-slate-500">
                                Nenhuma venda encontrada com os filtros atuais.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
