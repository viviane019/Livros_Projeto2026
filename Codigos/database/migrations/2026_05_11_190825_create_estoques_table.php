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
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();

            $table->string('codigo')->unique();           // Ex: 00112
            $table->string('titulo');                     // Nome do livro/material
            $table->string('autor')->nullable();          // Autor
            $table->string('isbn')->nullable();           // ISBN-13
            $table->string('capa')->nullable();           // Imagem da capa (upload)
            $table->string('categoria');                  // Mecânica Industrial, Logística...
            $table->string('materia')->nullable();        // Matéria do SENAI
            $table->decimal('preco', 8, 2)->default(0);  // Preço unitário
            $table->integer('quantidade')->default(0);   // Qtd. atual
            $table->integer('quantidade_minima')->default(10); // Alerta de estoque baixo
            $table->enum('status', ['em_estoque', 'estoque_baixo', 'critico', 'esgotado'])
                  ->default('em_estoque');
            $table->string('local')->nullable();          // Estante A3, Depósito B...
            $table->string('fornecedor')->nullable();     // Nome do fornecedor
            $table->text('descricao')->nullable();        // Descrição

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};
