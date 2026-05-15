<?php

use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Cadastro
Route::get('/cadastro', [CadastroController::class, 'show'])->name('cadastro');
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');

// Login
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//dashboard
Route::get('/dashboard', function () { return view('dashboard'); })->middleware('auth')->name('dashboard');

// estoque
Route::get('/estoque', function () { return view('estoque'); })->middleware('auth')->name('estoque');



