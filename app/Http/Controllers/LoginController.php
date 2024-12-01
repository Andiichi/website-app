<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function auth(Request $request){

        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            //intended é para voltar ao dashboard apos o login, pois é a rota que ele pretendia acessar
            return redirect()->intended(route('admin.dashboard'));

        } 
        
        // Redireciona com a mensagem de sucesso
       return redirect()
       ->back()
       ->with('type', 'danger')
       ->with('message', "<strong>Email ou senha inválidos!</strong> Por favor, verificar!");
        


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

}
