<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
      User::firstOrCreate(
    ['email' => 'admin@senai.com'],
    [
        're' => '00000',
        'name' => 'Admin',
        'password' => Hash::make('password'),
        'perfil' => 'coordenador',
        'ativo' => 1,
    ]
);

User::firstOrCreate(
    ['email' => 'coordenador@senai.com'],
    [
        're' => '11111',
        'name' => 'Coordenador',
        'password' => Hash::make('password'),
        'perfil' => 'coordenador',
        'ativo' => 1,
    ]
);

User::firstOrCreate(
    ['email' => 'secretaria@senai.com'],
    [
        're' => '22222',
        'name' => 'Secretaria',
        'password' => Hash::make('password'),
        'perfil' => 'secretaria',
        'ativo' => 1,
    ]
);

User::firstOrCreate(
    ['email' => 'professor@senai.com'],
    [
        're' => '33333',
        'name' => 'Professor',
        'password' => Hash::make('password'),
        'perfil' => 'professor',
        'ativo' => 1,
    ]
);
    }
}