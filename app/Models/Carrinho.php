<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrinho extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carrinhos';
    protected $primaryKey = 'id_carrinho';

    protected $fillable = [
        'usuario_id',
        'flag_ativo',
    ];

    protected $casts = [
        'flag_ativo' => 'boolean',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id_usuario');
    }

    public function itens()
    {
        return $this->hasMany(CarrinhoItem::class, 'carrinho_id', 'id_carrinho');
    }
}
