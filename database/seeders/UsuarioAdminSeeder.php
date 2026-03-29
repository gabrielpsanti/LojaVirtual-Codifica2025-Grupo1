<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'nome' => 'Admin',
                'senha' => Hash::make('123456'),
                'flag_admin' => true,
            ]
        );
    }
}
