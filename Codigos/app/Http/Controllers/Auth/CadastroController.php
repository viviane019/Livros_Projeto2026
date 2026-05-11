<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    public function show()
    {
        return view('auth.cadastro');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'nr'       => 'required|string|unique:users,nr',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'nr'       => $request->nr,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Conta criada com sucesso!');
    }
}