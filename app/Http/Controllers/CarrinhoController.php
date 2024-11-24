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
    
    public function adicionarCarrinho(Request $request)
{
    try {
        // Adiciona o produto ao carrinho
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qnt,
            'options' => [
                'image' => $request->img,
                'slug' => $request->slug,
            ],
        ]);

        // Redireciona com a mensagem de sucesso
        return redirect('carrinho')
        ->with('type', 'success')
        ->with('message', "Produto <strong>'" . e($request->name) . "'</strong> adicionado com sucesso!");
    } catch (\Exception $e) {

        // Em caso de erro, redireciona com mensagem de erro
        return redirect()
        ->back()
        ->with('type', 'danger')
        ->with('message', "Algo deu errado! Por favor, tente novamente. Erro: <strong>". e($e->getMessage()) ."'</strong> ");
    }
}

public function removerCarrinho($id)
{
    try {
        
    // Lógica para remover o item do carrinho com o ID
    \Cart::remove($id);


        // Redireciona com a mensagem de sucesso
        return redirect('carrinho')
        ->with('type', 'success')
        ->with('message', "Produto removido do carrinho com sucesso!");
    } catch (\Exception $e) {

        // Em caso de erro, redireciona com mensagem de erro
        return redirect()
        ->back()
        ->with('type', 'danger')
        ->with('message', "Algo deu errado! Por favor, tente novamente. Erro: <strong>". e($e->getMessage()) ."'</strong> ");
    }
    
}

public function atualizarCarrinho (Request $request)
{
    try {
        // Adiciona o produto ao carrinho
        \Cart::update($rowId, $request->qty);


        // Redireciona com a mensagem de sucesso
        return redirect('carrinho')
        ->with('type', 'success')
        ->with('message', "Produto atualizado do carrinho com sucesso!");
    } catch (\Exception $e) {

        // Em caso de erro, redireciona com mensagem de erro
        return redirect()
        ->back()
        ->with('type', 'danger')
        ->with('message', "Algo deu errado! Por favor, tente novamente. Erro: <strong>". e($e->getMessage()) ."'</strong> ");
    }
    
}

}