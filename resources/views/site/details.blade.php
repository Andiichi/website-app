@extends('site/layout')
@section('title', 'Detalhes')
@section('conteudo')


    {{-- component dinamico para o breadcrumb --}}
    @component('site/components/breadcrumb-nav')
        @slot('produto_categoria_nome')
            {{ $produto->categoria->nome }}
        @endslot
        @slot('produto_nome')
            {{ Str::limit($produto->nome, 15) }}
        @endslot
    @endcomponent


    <div
        class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 grid grid-cols-3 md-grid-cols-1">
        <a href="#" class="">
            <img class="rounded-l-lg " src="{{ $produto->imagem }}" alt="{{ $produto->nome }}" />
        </a>
        <div class="p-2 col-span-2">
            <div class="mb-4">
                <b>Categoria:</b>
                <span
                    class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                    <svg class="w-2.5 h-2.5 me-1.5" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                        fill="#233876 ">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <rect class="st0" width="128" height="128"></rect>
                                <rect x="192" class="st0" width="128" height="128"></rect>
                                <rect x="384" class="st0" width="128" height="128"></rect>
                                <rect y="192" class="st0" width="128" height="128"></rect>
                                <rect x="192" y="192" class="st0" width="128" height="128"></rect>
                                <rect x="384" y="192" class="st0" width="128" height="128"></rect>
                                <rect y="384" class="st0" width="128" height="128"></rect>
                                <rect x="192" y="384" class="st0" width="128" height="128"></rect>
                                <rect x="384" y="384" class="st0" width="128" height="128"></rect>
                            </g>
                        </g>
                    </svg>
                    {{ $produto->categoria->nome }}
                </span>
            </div>

            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $produto->nome }}
                </h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ $produto->descricao }}
            </p>

            <div class="flex flex-col gap-20 mt-1">
                <div class="flex flex-row gap-4 mt-1">
                    <span class="text-2xl italic my-auto p-2">Preço: </span>
                    <div
                        class="text-2xl my-auto p-2 text-md font-bold text-center rounded-lg bg-gray-200 pointer-events-auto w-36 mr-4">
                        {{-- formatação para transformar em R$ 99.06 por R$ 99,06 --}}
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </div>

                    {{-- formulario que levará as infos pelo carrinhocontroller --}}
                    <form action="{{ route('site.addcarrinho') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $produto->id }}">
                        <input type="hidden" name="name" value="{{ $produto->nome }}">
                        <input type="hidden" name="price" value="{{ $produto->preco }}">
                        <input type="hidden" name="img" value="{{ $produto->imagem }}">
                        <input type="hidden" name="categoria" value="{{ $produto->categoria->nome }}">
                 
                        <label for="counter-input"
                            class="block mb-1 text-md font-medium text-gray-900 dark:text-white">
                            Escolha a quantidade
                        </label>

                        <div class="relative flex justify-center items-center">

                            <button type="button" id="decrement-button" data-input-counter-decrement="counter-input"
                                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-full h-6 w-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>

                            <input type="text" id="counter-input" data-input-counter
                                class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-md font-bold focus:outline-none focus:ring-0 max-w-[2.8rem] text-center"
                                placeholder="" name="qnt" value="1" required min="1"/>

                            <button type="button" id="increment-button" data-input-counter-increment="counter-input"
                                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-full h-6 w-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>

                </div>


                <!-- Botão "add" com animação de transformação -->
                <div class="flex mt-2">
                    <button
                        class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-center rounded-lg  focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800  bg-blue-500 text-white transition-transform duration-500 ease-in-out hover:scale-110 hover:bg-indigo-500">
                        Adicionar
                        <span class="material-symbols-outlined ml-1">
                            shopping_cart
                        </span>
                    </button>
                </div>
                </form>

            </div>
            <p class="text-sm text-end italic mt-7 text-gray-500 dark:text-gray-400">
                Postado por {{ $produto->user->firstname }} <br>
            </p>
        </div>
    </div>


@endsection
