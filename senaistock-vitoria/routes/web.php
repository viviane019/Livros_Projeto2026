<?php

use App\Filament\Admin\Pages\Auth\Login;

Route::get('/admin/login', function () {
    return view('filament.admin.pages.auth.login');
})->name('login');

Route::post('/admin/login', [Login::class, 'authenticate'])->name('login.authenticate');