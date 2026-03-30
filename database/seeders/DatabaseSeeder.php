<?php

namespace Database\Seeders;




use Illuminate\Database\Seeder;
use Database\Seeders\CategoriaSeeder;
use Database\Seeders\TamanhoSeeder;




class DatabaseSeeder extends Seeder {
public function run(): void
{
$this->call(CategoriaSeeder::class);
$this->call(TamanhoSeeder::class);
}
}