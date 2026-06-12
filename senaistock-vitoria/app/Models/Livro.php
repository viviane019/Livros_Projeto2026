<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = ['titulo', 'isbn', 'materia', 'curso', 'editora', 'quantidade_minima', 'estoque', 'status'];

    public function entradasEstoque()
    {
        return $this->hasMany(EntradaEstoque::class);
    }

    public function saidasEstoque()
    {
        return $this->hasMany(SaidaEstoque::class);
    }

    public function retiradas()
    {
        return $this->hasMany(Retirada::class);
    }

    public function historicoMovimentacoes()
    {
        return $this->hasMany(HistoricoMovimentacao::class);
    }

    // Verificar se está em estoque crítico
    public function estaEmEstoqueCritico()
    {
        return $this->estoque < $this->quantidade_minima;
    }
}