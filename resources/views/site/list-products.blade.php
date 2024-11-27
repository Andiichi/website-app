
@extends('site/layout')

{{-- <-- Esse é um comentario de templates blade
    
Tem dois jeitos para adicionar uma @section:
@section('title', 'Esse é o titulo da pagina')
ou 
@section('title') Essa é a pagina HOME @endsection
--}}

@section('title', 'Home')

@section('conteudo')

@include('site.components.home')

@component('site.components.header-page')
    {{ 'Lista de produtos' }} 
@endcomponent

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

                @slot('form_adicionar')

                     {{-- formulario que levará as infos pelo carrinhocontroller --}}
                     <form action="{{ route('site.addcarrinho') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{ $produto->id }}">
                        <input type="hidden" name="name" value="{{ $produto->nome }}">
                        <input type="hidden" name="price" value="{{ $produto->preco }}">
                        <input type="hidden" name="img" value="{{ $produto->imagem }}">
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

 <!-- Fim do Card -->
</div>

    <div class="container flex flex-col  mx-auto py-8">
        {{ $produtos->links() }}
    </div>

@endsection


