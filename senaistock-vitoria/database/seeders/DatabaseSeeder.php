<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Livro;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Criar usuários
        User::create([
            're' => '123456',
            'name' => 'Coordenador',
            'email' => 'coordenador@senai.com',
            'password' => bcrypt('password'),
            'perfil' => 'coordenador',
            'ativo' => true,
        ]);
        User::firstOrCreate(['email' => 'admin@senai.com'], [
        're' => '00000',
        'name' => 'Administrador',
        'password' => bcrypt('password'),
        'perfil' => 'coordenador',
        'ativo' => true,
        ]);

        User::create([
            're' => '789012',
            'name' => 'Secretária',
            'email' => 'secretaria@senai.com',
            'password' => bcrypt('password'),
            'perfil' => 'secretaria',
            'ativo' => true,
        ]);

        User::create([
            're' => '345678',
            'name' => 'Professor',
            'email' => 'professor@senai.com',
            'password' => bcrypt('password'),
            'perfil' => 'professor',
            'ativo' => true,
        ]);

        // Criar livros
        Livro::create([
            'titulo' => 'Java Básico',
            'isbn' => '978-1234567890',
            'materia' => 'Programação',
            'curso' => 'Técnico em TI',
            'editora' => 'TechBooks',
            'quantidade_minima' => 10,
            'estoque' => 8,
        ]);

        Livro::create([
            'titulo' => 'PHP Avançado',
            'isbn' => '978-0987654321',
            'materia' => 'Web',
            'curso' => 'Técnico em TI',
            'editora' => 'WebDev',
            'quantidade_minima' => 10,
            'estoque' => 15,
        ]);
    }
}