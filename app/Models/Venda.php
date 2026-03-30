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
        'valor_total',
    ];

    public function itens()
    {
        return $this->hasMany(ItemVenda::class, 'venda_id', 'id_venda');
    }
}
