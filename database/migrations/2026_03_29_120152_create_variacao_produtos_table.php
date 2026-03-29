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
        Schema::create('variacoes_produtos', function (Blueprint $table) {
            $table->id('id_variacao_produto');
            $table->foreignId('produto_id')->constrained('produtos', 'id_produto');
            $table->foreignId('cor_id')->constrained('cores', 'id_cor');
            $table->foreignId('tamanho_id')->constrained('tamanhos', 'id_tamanho');
            $table->string('imagem');
            $table->integer('estoque');
            $table->decimal('preco', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variacoes_produtos');
    }
};
