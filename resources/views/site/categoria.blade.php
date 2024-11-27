@extends('site/layout')
@section('title', 'Categoria: ' . $categoria->nome)

@section('conteudo')


    
    @if ($produto->isNotEmpty())
    <h2 class="text-4xl font-extrabold text-gray-800 mb-12">Lista da Categoria: <span class="text-blue-800">{{ Str::upper($categoria->nome) }}</span></h2>  

        <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
            {{-- for de array para Verificar se existem produtos --}}
            @foreach ($produto as $produtoCategoria)
                @component('site/components/card-produto')
                    @slot('produto_nome')
                        {{ $produtoCategoria->nome }}
                    @endslot
                    @slot('produto_preco')
                        {{-- formatação para transformar em R$ 99.06 por R$ 99,06 --}}
                        R$ {{ number_format($produtoCategoria->preco, 2, ',', '.') }}
                    @endslot
                    @slot('produto_imagem')
                        {{ $produtoCategoria->imagem }}
                    @endslot
                    @slot('produto_slug')
                        {{ $produtoCategoria->slug }}
                    @endslot
                    @slot('produto_categoria')
                        {{ $produtoCategoria->categoria->nome }}
                    @endslot

                    @slot('produto_form_add')
                        {{-- formulario que levará as infos pelo carrinhocontroller --}}
                        <form action="{{ route('site.addcarrinho') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $produtoCategoria->id }}">
                            <input type="hidden" name="name" value="{{ $produtoCategoria->nome }}">
                            <input type="hidden" name="price" value="{{ $produtoCategoria->preco }}">
                            <input type="hidden" name="img" value="{{ $produtoCategoria->imagem }}">
                            <input type="hidden" name="categoria" value="{{ $produtoCategoria->categoria->nome }}">
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
            {{ $produto->links() }}
        </div>
    @else
        <div class="container flex flex-col  mx-auto p-11 mb-4 text-xl text-red-800 rounded-lg bg-red-100 dark:bg-gray-800 dark:text-red-400 shadow-md"
            role="alert">
            <span class="font-extrabold">Erro!</span> Não tem itens na categoria para serem exibidos.
        </div>

    @endif

@endsection
