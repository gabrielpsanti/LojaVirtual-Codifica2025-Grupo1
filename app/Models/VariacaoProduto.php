<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariacaoProduto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'variacoes_produtos';
    protected $primaryKey = 'id_variacao_produto';

    protected $fillable = [
        'produto_id',
        'cor_id',
        'tamanho_id',
        'imagem',
        'estoque',
        'preco',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id_produto');
    }

    public function cor()
    {
        return $this->belongsTo(Cor::class, 'cor_id', 'id_cor');
    }

    public function tamanho()
    {
        return $this->belongsTo(Tamanho::class, 'tamanho_id', 'id_tamanho');
    }
}
