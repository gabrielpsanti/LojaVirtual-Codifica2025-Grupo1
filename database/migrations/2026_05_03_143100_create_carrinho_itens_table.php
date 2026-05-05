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
        Schema::create('carrinho_itens', function (Blueprint $table) {
            $table->id('id_carrinho_item');
            $table->foreignId('carrinho_id')->constrained('carrinhos', 'id_carrinho');
            $table->foreignId('variacao_produto_id')->constrained('variacoes_produtos', 'id_variacao_produto');
            $table->integer('quantidade');
            $table->decimal('preco_unitario_momento', 10, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['carrinho_id', 'variacao_produto_id'], 'carrinho_item_unico_por_variacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrinho_itens');
    }
};
