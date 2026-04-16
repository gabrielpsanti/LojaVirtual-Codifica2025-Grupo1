<?php

namespace App\Http\Requests\Admin;

use App\Enums\FaixaEtariaProduto;
use App\Enums\GeneroProduto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProdutoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $produto = $this->route('produto');

        return [
            'nome' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('produtos', 'nome')
                    ->where(fn($query) => $query
                        ->where('modelo_id', $this->input('modelo_id'))
                        ->whereNull('deleted_at'))
                    ->ignore($produto?->id_produto, 'id_produto'),
            ],
            'descricao' => ['nullable', 'string'],
            'modelo_id' => ['required', 'integer', 'exists:modelos,id_modelo'],
            'faixa_etaria' => ['required', 'integer', Rule::in(array_column(FaixaEtariaProduto::cases(), 'value'))],
            'genero' => ['required', 'integer', Rule::in(array_column(GeneroProduto::cases(), 'value'))],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome do produto.',
            'nome.min' => 'O nome do produto deve ter pelo menos 3 caracteres.',
            'nome.max' => 'Nome muito grande.',
            'nome.unique' => 'Já existe um produto com esse nome para o modelo selecionado.',
            'descricao.string' => 'A descrição do produto é inválida.',
            'modelo_id.required' => 'Selecione o modelo do produto.',
            'modelo_id.exists' => 'O modelo selecionado é inválido.',
            'faixa_etaria.required' => 'Selecione a faixa etária.',
            'faixa_etaria.integer' => 'A faixa etária selecionada é inválida.',
            'faixa_etaria.in' => 'A faixa etária selecionada é inválida.',
            'genero.required' => 'Selecione o gênero.',
            'genero.integer' => 'O gênero selecionado é inválido.',
            'genero.in' => 'O gênero selecionado é inválido.',
        ];
    }
}
