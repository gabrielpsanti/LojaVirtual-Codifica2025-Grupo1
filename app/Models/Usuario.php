<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'flag_admin'
    ];

    protected $hidden = [
        'senha',
    ];

    protected function casts(): array
    {
        return [
            'flag_admin' => 'boolean',
        ];
    }
    
    public function getAuthPassword(): string
    {
        return $this->senha;
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'usuario_id', 'id_usuario');
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'usuario_id', 'id_usuario');
    }
}
