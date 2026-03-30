<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemVenda extends Model
{
    protected $table = 'item_vendas';
    protected $primaryKey = 'id_item_venda';

    protected $fillable = [
        'venda_id',
        'variacao_produto_id',
        'quantidade',
        'preco_unitario',
    ];

    public function venda()
    {
        return $this->belongsTo(Venda::class, 'venda_id', 'id_venda');
    }

    public function variacaoProduto()
    {
        return $this->belongsTo(VariacaoProduto::class, 'variacao_produto_id', 'id_variacao_produto');
    }
}
