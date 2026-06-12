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
        Schema::create('retiradas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livro_id')->constrained('livros');
            $table->foreignId('professor_id')->constrained('users');
            $table->string('turma');
            $table->integer('quantidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retiradas');
    }
};
