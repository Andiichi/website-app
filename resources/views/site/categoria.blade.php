@extends('site/layout')
@section('title', 'Categoria: '.$categoria->nome)

@section('conteudo')


    @component('site.components.header-page')
        {{ 'Lista da Categoria: ' }} <strong class="text-blue-800">{{ Str::upper($categoria->nome) }}</strong>
    @endcomponent

    @if ($produto->isNotEmpty())
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
                    @slot('form_adicionar')

                     {{-- formulario que levará as infos pelo carrinhocontroller --}}
                     <form action="{{ route('site.addcarrinho') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{ $produtoCategoria->id }}">
                        <input type="hidden" name="name" value="{{ $produtoCategoria->nome }}">
                        <input type="hidden" name="price" value="{{ $produtoCategoria->preco }}">
                        <input type="hidden" name="img" value="{{ $produtoCategoria->imagem }}">
                        <input type="hidden" name="qnt" value="1">

                        <!-- Botão "add" com animação de transformação -->
                        <button 
                        class="w-full flex items-center justify-center gap-3 mt-16 px-6 py-3 bg-blue-400 text-base text-white font-semibold rounded-xl transition-transform duration-500 ease-in-out hover:scale-[1.02] hover:bg-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-white inline-block" width="20px" height="20px" viewBox="0 0 512 512">
                          <path
                            d="M164.96 300.004h.024c.02 0 .04-.004.059-.004H437a15.003 15.003 0 0 0 14.422-10.879l60-210a15.003 15.003 0 0 0-2.445-13.152A15.006 15.006 0 0 0 497 60H130.367l-10.722-48.254A15.003 15.003 0 0 0 105 0H15C6.715 0 0 6.715 0 15s6.715 15 15 15h77.969c1.898 8.55 51.312 230.918 54.156 243.71C131.184 280.64 120 296.536 120 315c0 24.812 20.188 45 45 45h272c8.285 0 15-6.715 15-15s-6.715-15-15-15H165c-8.27 0-15-6.73-15-15 0-8.258 6.707-14.977 14.96-14.996zM477.114 90l-51.43 180H177.032l-40-180zM150 405c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm167 15c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm0 0"
                            data-original="#000000"></path>
                        </svg>
                        Add to cart
                    </button>
                     
                    </form>

                @endslot
                @endcomponent
            @endforeach



            <div class="container flex flex-col  mx-auto p-4">
                {{ $produto->links() }}
            </div>
        @else
            <div class="container flex flex-col  mx-auto p-4 mb-4 text-md text-red-800 rounded-lg bg-red-100 dark:bg-gray-800 dark:text-red-400 shadow-md"
                role="alert">
                <span class="font-medium">Erro!</span> Não tem itens na categoria para serem exibidos.
            </div>

    @endif

    </div>

@endsection
