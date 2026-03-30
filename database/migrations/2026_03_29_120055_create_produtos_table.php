<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id('id_produto');
            $table->foreignId('usuario_id')->constrained('usuarios', 'id_usuario');
            $table->foreignId('modelo_id')->constrained('modelos', 'id_modelo');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->enum('faixa_etaria', ['infantil', 'juvenil', 'adulto']);
            $table->enum('genero', ['masculino', 'feminino', 'unissex']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
