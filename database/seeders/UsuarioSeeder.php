<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criação de 20 usuários para preenchimento. UsuarioAdmin criado em outro Seeder (flag_Admin = 1)
        Usuario::Factory(20)->create();
    }
}
