<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'modelos';
    protected $primaryKey = 'id_modelo';

    protected $fillable = [
        'nome',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id_categoria');
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'modelo_id', 'id_modelo');
    }
}
