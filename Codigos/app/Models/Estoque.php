<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{

    use HasFactory;

    protected $table = 'estoques';

    protected $fillable = [
        'codigo',
        'titulo',
        'autor',
        'isbn',
        'capa',
        'categoria',
        'materia',
        'preco',
        'quantidade',
        'quantidade_minima',
        'status',
        'local',
        'fornecedor',
        'descricao',
    ];

    protected $casts = [
        'preco'             => 'decimal:2',
        'quantidade'        => 'integer',
        'quantidade_minima' => 'integer',
    ];

    // ── Categorias disponíveis (SENAI) ─────────────────────
    public static function categorias(): array
    {
        return [
            'Mecânica Industrial'          => 'Mecânica Industrial',
            'Mecânica de Usinagem'         => 'Mecânica de Usinagem',
            'Administração e Logística'    => 'Administração e Logística',
            'Têxteis e de Vestuário'       => 'Têxteis e de Vestuário',
            'Desenvolvimento de Sistemas'  => 'Desenvolvimento de Sistemas',
            'Eletroeletrônica'             => 'Eletroeletrônica',
            'Eletromecânica'               => 'Eletromecânica',
            'Fabricação Mecânica'          => 'Fabricação Mecânica',
            'Construção Civil'             => 'Construção Civil',
            'Alimentos'                    => 'Alimentos',
        ];
    }

    // ── Status label e cor ─────────────────────────────────
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'em_estoque'   => 'Em Estoque',
            'estoque_baixo' => 'Estoque Baixo',
            'critico'      => 'Crítico',
            'esgotado'     => 'Esgotado',
            default        => 'Desconhecido',
        };
    }

    // ── Porcentagem do estoque para barra ──────────────────
    public function getPorcentagemEstoqueAttribute(): int
    {
        if ($this->quantidade_minima <= 0) return 100;
        $max = $this->quantidade_minima * 5;
        return min(100, (int)(($this->quantidade / $max) * 100));
    }

    // ── Atualiza status automaticamente ao salvar ──────────
    protected static function boot(): void
    {
        parent::boot();

        static::saving(function (Estoque $model) {
            if ($model->quantidade <= 0) {
                $model->status = 'esgotado';
            } elseif ($model->quantidade <= ($model->quantidade_minima * 0.3)) {
                $model->status = 'critico';
            } elseif ($model->quantidade <= $model->quantidade_minima) {
                $model->status = 'estoque_baixo';
            } else {
                $model->status = 'em_estoque';
            }
        });
    }
}
