<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarrinhoItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carrinho_itens';
    protected $primaryKey = 'id_carrinho_item';

    protected $fillable = [
        'carrinho_id',
        'variacao_produto_id',
        'quantidade',
        'preco_unitario_momento',
    ];

    public function carrinho()
    {
        return $this->belongsTo(Carrinho::class, 'carrinho_id', 'id_carrinho');
    }

    public function variacaoProduto()
    {
        return $this->belongsTo(VariacaoProduto::class, 'variacao_produto_id', 'id_variacao_produto');
    }
}
