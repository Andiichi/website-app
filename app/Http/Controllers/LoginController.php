<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return redirect()->intended('dashboard');

        } 
        
        // Redireciona com a mensagem de sucesso
       return redirect()->back()
       ->with('type', 'danger')
       ->with('message', "Email ou senha invalido, por favor, verificar!");
        


    }
}
