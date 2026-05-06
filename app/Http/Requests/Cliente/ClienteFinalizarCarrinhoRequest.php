<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFinalizarCarrinhoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cep' => ['required', 'string', 'max:9'],
            'estado' => ['required', 'string', 'size:2'],
            'cidade' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'rua' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:20'],
            'complemento' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'cep.required' => 'O CEP é obrigatório.',
            'cep.max' => 'O CEP deve ter no máximo 9 caracteres.',
            'estado.required' => 'O estado é obrigatório.',
            'estado.size' => 'O estado deve ter 2 caracteres.',
            'cidade.required' => 'A cidade é obrigatória.',
            'bairro.required' => 'O bairro é obrigatório.',
            'rua.required' => 'A rua é obrigatória.',
            'numero.required' => 'O número é obrigatório.',
        ];
    }
}
