<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaisVendido extends Model
{
    protected $table = 'mais_vendidos';
    protected $primaryKey = 'id_mais_vendido';

    protected $fillable = [
        'variacao_produto_id',
        'quantidade_vendas',
        'ranking',
        'updated_at'
    ];

    public function variacao()
    {
        return $this->belongsTo(VariacaoProduto::class, 'variacao_produto_id', 'id_variacao_produto');
    }
}
