<?php

namespace App\Models;

use App\Enums\FaixaEtariaProduto;
use App\Enums\GeneroProduto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produtos';
    protected $primaryKey = 'id_produto';

    protected $fillable = [
        'modelo_id',
        'nome',
        'descricao',
        'faixa_etaria',
        'genero',
    ];

    protected function casts(): array
    {
        return [
            'faixa_etaria' => FaixaEtariaProduto::class,
            'genero' => GeneroProduto::class,
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id_usuario');
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo_id', 'id_modelo');
    }

    public function variacoes()
    {
        return $this->hasMany(VariacaoProduto::class, 'produto_id', 'id_produto');
    }
}
