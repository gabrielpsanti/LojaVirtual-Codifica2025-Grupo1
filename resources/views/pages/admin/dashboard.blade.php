@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Dashboard')
@section('titulo-header', 'Dashboard')

@section('content')
    <section class="w-full max-w-[95vw] mx-auto flex gap-4">
        <div class="flex flex-col w-100 gap-10">
            <div class="rounded-2xl bg-white px-6 py-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Total de Vendas</p>
                <p class="mt-2 text-3xl font-bold text-slate-800">{{ number_format($totalVendas, 0, ',', '.') }}</p>
            </div>

            <div class="rounded-2xl bg-white px-6 py-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Total de Produtos</p>
                <p class="mt-2 text-3xl font-bold text-slate-800">{{ number_format($totalProdutos, 0, ',', '.') }}</p>
            </div>

            <div class="rounded-2xl bg-white px-6 py-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Total de Variações</p>
                <p class="mt-2 text-3xl font-bold text-slate-800">{{ number_format($totalVariacoes, 0, ',', '.') }}</p>
            </div>
        </div>

        <div class="flex gap-10  mx-auto">
            <div class="overflow-hidden rounded-3xl bg-white shadow-sm ">
                <h2 class="text-center bg-slate-600 text-white py-2 border-b">Mais Vendidos</h2>
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-900 text-left text-xs font-semibold text-slate-200">
                        <tr>
                            <th class="px-6 py-4">RANK</th>
                            <th class="px-6 py-4">VARIAÇÃO</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-300">
                        @forelse ($maisVendidos as $item)
                            <tr class="hover:bg-slate-100">
                                <td class="px-6 py-4 text-sm font-semibold text-slate-800">#{{ $item->ranking }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    {{ $item->variacao?->produto?->nome ?? 'Produto removido' }}
                                    | {{ $item->variacao?->cor?->nome ?? 'Cor removida' }}
                                    | {{ $item->variacao?->tamanho?->nome ?? 'Tamanho removido' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-10 text-center text-lg text-slate-500">
                                    Nenhum dado disponível no momento.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                    @if ($maisVendidos->isNotEmpty())
                        <tfoot>
                            <tr class="border-t border-slate-200">
                                <td colspan="2" class="text-center p-4">
                                    <a href="{{ route('admin.vendas.mais_vendidos') }}"
                                        class="inline-flex items-center rounded-xl bg-slate-800 px-4 py-1 text-sm font-semibold text-white hover:bg-slate-700">
                                        Ver lista completa
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    @endif
                </table>
            </div>

            <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
                <h2 class="text-center bg-red-600 text-white py-2 border-b">Variações com Estoque Baixo (&lt; 50)</h2>
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-900 text-left text-xs font-semibold text-slate-200">
                        <tr>
                            <th class="px-6 py-4">VARIAÇÃO</th>
                            <th class="px-6 py-4">ESTOQUE</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-300">
                        @forelse ($variacoesEstoqueBaixo as $variacao)
                            <tr class="hover:bg-slate-100">
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    {{ $variacao->produto?->nome ?? 'Produto removido' }}
                                    | {{ $variacao->cor?->nome ?? 'Cor removida' }}
                                    | {{ $variacao->tamanho?->nome ?? 'Tamanho removido' }}
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-red-600">
                                    {{ $variacao->estoque }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-10 text-center text-lg text-slate-500">
                                    Nenhuma variação com estoque abaixo de 50.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    @if ($variacoesEstoqueBaixo->isNotEmpty())
                        <tfoot>
                            <tr class="border-t border-slate-200">
                                <td colspan="2" class="text-center p-4">
                                    <a href=""
                                        class="inline-flex items-center rounded-xl bg-slate-800 px-4 py-1 text-sm font-semibold text-white hover:bg-slate-700">
                                        Ver lista completa
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </section>
@endsection
