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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id('id_venda');
            $table->foreignId('usuario_id')->constrained('usuarios', 'id_usuario');
            $table->foreignId('variacao_produto_id')->constrained('variacoes_produtos', 'id_variacao_produto');
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 10, 2);
            $table->decimal('valor_total', 10, 2);
            $table->string('cep', 9);
            $table->string('estado', 2);
            $table->string('cidade');
            $table->string('bairro');
            $table->string('rua');
            $table->string('numero', 20);
            $table->string('complemento')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
