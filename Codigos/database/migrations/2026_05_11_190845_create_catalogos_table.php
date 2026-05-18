
public function up(): void
{
    Schema::create('catalogos', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->string('autor')->nullable();
        $table->string('isbn')->unique()->nullable();
        $table->string('editora')->nullable();
        $table->string('categoria')->nullable();
        $table->unsignedInteger('ano_publicacao')->nullable();
        $table->unsignedInteger('quantidade')->default(0);
        $table->string('capa')->nullable();
        $table->text('descricao')->nullable();
        $table->timestamps();
    });
}

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
        Schema::create('catalogos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogos');
    }
};

