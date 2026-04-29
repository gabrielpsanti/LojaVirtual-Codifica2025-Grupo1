@csrf
<div class="space-y-5">
    <div class="space-y-2">
        <label for="nome" class="text-sm font-semibold text-slate-700">Nome do produto</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome', $produto->nome ?? '') }}"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none"
            placeholder="Ex.: Camiseta Basic" autofocus>

        @error('nome')
            <p class="text-sm font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <label for="modelo_id" class="text-sm font-semibold text-slate-700">Modelo</label>
        <select name="modelo_id" id="modelo_id"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none">
            <option value="">Selecione um modelo</option>
            @foreach ($modelos as $modelo)
                <option value="{{ $modelo->id_modelo }}" @selected(old('modelo_id', $produto->modelo_id ?? '') == $modelo->id_modelo)>
    {{ $modelo->nome }} ({{ $modelo->categoria->nome ?? 'Sem categoria' }})

                </option>
            @endforeach
        </select>

        @error('modelo_id')
            <p class="text-sm font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <label for="faixa_etaria" class="text-sm font-semibold text-slate-700">Faixa etária</label>
        <select name="faixa_etaria" id="faixa_etaria"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none">
            <option value="">Selecione uma faixa etária</option>
            @foreach ($faixasEtarias as $faixaEtaria)
                <option value="{{ $faixaEtaria->value }}" @selected((string) old('faixa_etaria', $produto->faixa_etaria?->value ?? '') === (string) $faixaEtaria->value)>
                    {{ $faixaEtaria->label() }}
                </option>
            @endforeach
        </select>

        @error('faixa_etaria')
            <p class="text-sm font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <label for="genero" class="text-sm font-semibold text-slate-700">Gênero</label>
        <select name="genero" id="genero"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none">
            <option value="">Selecione um gênero</option>
            @foreach ($generos as $genero)
                <option value="{{ $genero->value }}" @selected((string) old('genero', $produto->genero?->value ?? '') === (string) $genero->value)>
                    {{ $genero->label() }}
                </option>
            @endforeach
        </select>

@error('genero')
    <p class="text-sm font-medium text-red-600">{{ $message }}</p>
@enderror
</div>


<div class="space-y-2">
    <label for="imagem" class="text-sm font-semibold text-slate-700">Imagem (URL)</label>
    <input type="text" name="imagem_apresentacao" id="imagem"
        value="{{ old('imagem_apresentacao', $produto->imagem_apresentacao ?? '') }}"
        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none"
        placeholder="Cole a URL da imagem (ex: site TACO)">

    @error('imagem_apresentacao')
        <p class="text-sm font-medium text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="space-y-2">
    <label for="descricao" class="text-sm font-semibold text-slate-700">Descrição</label>
    <textarea name="descricao" id="descricao" rows="4"
        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none"
        placeholder="Descreva o produto em português...">{{ old('descricao', $produto->descricao ?? '') }}</textarea>

    @error('descricao')
        <p class="text-sm font-medium text-red-600">{{ $message }}</p>
    @enderror
</div>
</div>

<div class="flex items-center gap-3 pt-4">
    <button type="submit"
        class="cursor-pointer rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-500">
        {{ $botao }}
    </button>

    <a href="{{ route('admin.produtos.index') }}"
        class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-200">
        Cancelar
    </a>
</div>
