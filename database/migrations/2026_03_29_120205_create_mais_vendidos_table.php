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
        Schema::create('mais_vendidos', function (Blueprint $table) {
            $table->id('id_mais_vendido');
            $table->foreignId('variacao_produto_id')->constrained('variacoes_produtos', 'id_variacao_produto');
            $table->integer('quantidade_vendas');
            $table->integer('ranking')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mais_vendidos');
    }
};
