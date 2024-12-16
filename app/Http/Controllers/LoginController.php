<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function auth(Request $request)
{
    // dd('Método chamado');
    $credenciais = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    if (Auth::attempt($credenciais, $request->remember)) {
        $request->session()->regenerate();
        return redirect() // Redireciona com a mensagem de sucesso
        ->intended(route('admin.dashboard'))
        ->with('type', 'success')
        ->with('message', "<strong>Olá!</strong> Login feito com sucesso!");
       
    
    } else {
        return redirect()
            ->back()
            ->with('type', 'danger')
            ->with('message', "<strong>Email ou senha inválidos!</strong> Por favor, verificar!");
    }

}

    public function logout(Request $request): RedirectResponse
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 

    // Redireciona com a mensagem de sucesso
    return redirect(route('home'))
    ->with('type', 'success')
    ->with('message', "<strong>Até breve!</strong> logout feito com sucesso!");
}

public function create()
{
    return view('login.create');
}


}
