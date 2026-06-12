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
    Schema::table('saida_estoques', function (Blueprint $table) {
        $table->foreignId('usuario_id')->nullable()->after('professor_id')->constrained('users');
    });
}

public function down(): void
{
    Schema::table('saida_estoques', function (Blueprint $table) {
        $table->dropColumn('usuario_id');
    });
    }
};
