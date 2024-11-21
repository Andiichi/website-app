<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Cart; //usando o package 'hardevine/shoppingcart'

class CarrinhoController extends Controller
{
    //
    public function carrinhoLista(){
        $itens = \Cart::content();
        // dd($itens);

        return view('site/carrinho', compact('itens'));
    }
    //
    public function adicionaCarrinho(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qnt,
            'options' => [
                'image'=> $request->img
                ]
        ]);
      
        return redirect('/carrinho')->with('sucesso', 'Produto adicionado com sucesso!');
    }
}
