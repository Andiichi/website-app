<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Categoria;

class SiteController extends Controller
{
    // pagina inicial do nosso site
    public function products()
    {
        
        $produtos = Produto::paginate(4);

        return view('site/list-products', compact('produtos'));
    }


    public function details($slug){

        $produto = Produto::where('slug', $slug)->first();

        return view('site/details', compact('produto'));
    }

    public function categoria($id){
        
        //busca a categoria de forma automática pelo id
        $categoria = Categoria::find($id);

        //listando os produtos de acordo com o id da categoria e encadeado a condição get
        $produto = Produto::where('id_categoria', $id)->paginate(5);
        return view('site/categoria', compact('produto', 'categoria'));
    }

}
