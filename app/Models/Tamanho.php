<?php
namespace Database\Seeders;




use Illuminate\Database\Seeder;
use App\Models\Tamanho;






class TamanhoSeeder extends Seeder {
public function run(): void {
Tamanho::create(['nome' => 'P']);
Tamanho::create(['nome' => 'M']);
Tamanho::create(['nome' => 'G']);
}
}
