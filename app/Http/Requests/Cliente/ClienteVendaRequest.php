<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class ClienteVendaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'variacao_produto_id' => ['required', 'integer', 'exists:variacoes_produtos,id_variacao_produto'],
            'quantidade' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'variacao_produto_id.required' => 'Selecione uma variação válida do produto.',
            'variacao_produto_id.exists' => 'A variação selecionada é inválida.',
            'quantidade.required' => 'Informe a quantidade.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade mínima é 1.',
        ];
    }
}
