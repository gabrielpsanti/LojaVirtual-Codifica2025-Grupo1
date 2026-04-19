<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
  public function run(): void
  {
    Categoria::create(['nome' => 'Camisas']);
    Categoria::create(['nome' => 'Calças']);
  }
}
