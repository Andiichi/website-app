@extends('site/layout')

{{-- <-- Esse é um comentario de templates blade
    
Tem dois jeitos para adicionar uma @section:
@section('title', 'Esse é o titulo da pagina')
ou 
@section('title') Essa é a pagina HOME @endsection
--}}

@section('title', 'Home')

@section('conteudo')

<h2 class="text-4xl font-extrabold text-gray-800 mb-12">Lista de produtos</h2>  

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Início do Card -->
        @foreach ($produtos as $produto)
            @component('site/components/card-produto')
                @slot('produto_nome')
                    {{ $produto->nome }}
                @endslot
                @slot('produto_preco')
                    {{-- formatação para transformar em R$ 99.06 por R$ 99,06 --}}
                    R$ {{ number_format($produto->preco, 2, ',', '.') }}
                @endslot
                @slot('produto_imagem')
                    {{ $produto->imagem }}
                @endslot
                @slot('produto_slug')
                    {{ $produto->slug }}
                @endslot
                @slot('produto_categoria')
                    {{ $produto->categoria->nome }}
                @endslot

                @slot('produto_form_add')
                  
                        {{-- formulario que levará as infos pelo carrinhocontroller --}}
                        <form action="{{ route('site.addcarrinho') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $produto->id }}">
                            <input type="hidden" name="name" value="{{ $produto->nome }}">
                            <input type="hidden" name="price" value="{{ $produto->preco }}">
                            <input type="hidden" name="img" value="{{ $produto->imagem }}">
                            <input type="hidden" name="categoria" value="{{ $produto->categoria->nome }}">
                            <input type="hidden" name="qnt" value="1">

                            <div class=" w-10 h-10 flex items-center justify-center rounded-full cursor-pointer ml-auto">
                                <button
                                    class="inline-flex items-center p-2 mr-4 text-sm font-medium text-center rounded-full  focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800  bg-blue-500 text-white transition-transform duration-500 ease-in-out hover:scale-110 hover:bg-indigo-500">
                                    <span class="material-symbols-outlined ml-1">
                                        shopping_cart
                                    </span>
                                </button>
                            </div>
                        </form>
                 
                @endslot
            @endcomponent
        @endforeach
    </div>
        <div class="container flex flex-col  mx-auto py-8">
            {{ $produtos->links() }}
        </div>
  
@endsection
