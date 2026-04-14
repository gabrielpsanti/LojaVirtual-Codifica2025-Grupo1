<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModeloRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $modelo = $this->route('modelo');

        return [
            'nome' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('modelos', 'nome')
                    ->where(fn($query) => $query->where('categoria_id', $this->input('categoria_id')))
                    ->ignore($modelo->id_modelo, 'id_modelo'),
            ],
            'categoria_id' => ['required', 'integer', 'exists:categorias,id_categoria'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome do modelo.',
            'nome.min' => 'O nome do modelo deve ter pelo menos 3 caracteres.',
            'nome.max' => 'Nome muito grande.',
            'nome.unique' => 'Já existe um modelo com esse nome para a categoria selecionada.',
            'categoria_id.required' => 'Selecione a categoria do modelo.',
            'categoria_id.exists' => 'A categoria selecionada é inválida.',
        ];
    }
}
