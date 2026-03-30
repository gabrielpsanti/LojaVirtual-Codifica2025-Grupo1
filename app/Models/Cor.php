<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cores';
    protected $primaryKey = 'id_cor';

    protected $fillable = [
        'nome',
    ];

    public function variacoesProdutos()
    {
        return $this->hasMany(VariacaoProduto::class, 'cor_id', 'id_cor');
    }
}
