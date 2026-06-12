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
        Schema::create('entrada_estoques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livro_id')->constrained('livros');
            $table->foreignId('usuario_id')->constrained('users');
            $table->integer('quantidade');
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrada_estoques');
    }
};
