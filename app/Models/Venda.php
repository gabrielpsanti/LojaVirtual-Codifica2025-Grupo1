<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vendas';
    protected $primaryKey = 'id_venda';

    protected $fillable = [
        'usuario_id',
        'variacao_produto_id',
        'quantidade',
        'preco_unitario',
        'valor_total',
        'cep',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'complemento',
    ];

    public function variacaoProduto()
    {
        return $this->belongsTo(VariacaoProduto::class, 'variacao_produto_id', 'id_variacao_produto');
    }
}
