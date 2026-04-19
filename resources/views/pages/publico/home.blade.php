@extends('layout.publico.layoutPublico')

@section('titulo-aba', 'Home')

@section('content')
    <h1>

        <div class="mt-6 grid gap-4 grid-cols-4">
            @forelse ($produtos as $produto)
                <section>
                    <div>
                        @if (!empty($produto->imagem_apresentacao))
                            <img src="{{ $produto->imagem_apresentacao }}" alt="{{ $produto->nome }}">
                        @else
                            <div>Sem imagem</div>
                        @endif
                    </div>

                    <div>
                        <p>R$ {{ $produto->variacoes_min_preco }}</p>
                        <p>{{ $produto->modelo?->categoria->nome ?? '' }}</p>
                        <p>{{ $produto->modelo?->nome ?? 'MODELO' }}</p>
                        <p>{{ $produto->descricao }}</p>
                    </div>

                </section>
            @empty
                <div>
                    Nenhum produto cadastrado.
                </div>
            @endforelse
        </div>
    @endsection
