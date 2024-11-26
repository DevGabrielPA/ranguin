<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

   public function store(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ], [
        'email.required'    => 'Campo Obrigatório',
        'email.email'       => 'Email inválido',
        'password.required' => 'Obrigatório senha'
    ]);

    $credentials = $request->only('email', 'password');
    $authenticated = Auth::attempt($credentials);
    if (!$authenticated) {
        return redirect()->route('login.index')->withErrors(['error' => 'E-mail ou senha inválidos.']);
    }
 return redirect('/home')->with('success', 'Login realizado com sucesso!');
    
}


    public function destroy() {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
