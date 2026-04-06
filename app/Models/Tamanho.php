<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tamanho extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tamanhos';
    protected $primaryKey = 'id_tamanho';

    protected $fillable = [
        'nome',
    ];

    public function variacoesProdutos()
    {
        return $this->hasMany(VariacaoProduto::class, 'tamanho_id', 'id_tamanho');
    }
}
