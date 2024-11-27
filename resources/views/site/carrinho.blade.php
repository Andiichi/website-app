@extends('site/layout')
@section('title', 'Carrinho')
@section('conteudo')

    {{-- @dump(session()->all()) //metodo para debugar retorno session/flash --}}

    <x-alert />

    {{-- verificar se existe valor no carrinho --}}
    @if ($itens->count() == 0)

    <div class="grid min-h-full mx-auto place-items-center py-12 ">
        <div class="text-center">
            {{-- Mensagem de Erro --}}
            <h1 class="mb-6 text-3xl font-bold text-gray-800">
                Seu carrinho está vazio!
            </h1>
            <svg viewBox="0 0 24 24" class="w-[12rem] mx-auto py-6 opacity-20"  fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 5L19 12H7.37671M20 16H8L6 3H3M11 3L13.5 5.5M13.5 5.5L16 8M13.5 5.5L16 3M13.5 5.5L11 8M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                
            {{-- Mensagem de Erro --}}
            <p class="mt-6 text-lg font-medium text-gray-500 sm:text-xl">
                Aproveite nossas promoções e comece a economizar!
            </p>
    
            {{-- Botões de Navegação --}}
            <div class="mt-10 flex flex-col md:flex-row items-center justify-center gap-x-6 gap-y-4">
                <a href="{{ route('site.list-products') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Lista de produtos!
                </a>
                <a href="/" class="text-sm font-semibold text-gray-900">
                    Contatar o nosso suporte <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>
    </div>

    @else
        

    <h1 class="text-3xl my-8 pl-2 font-semibold">
        Seu carrinho possui <strong>{{ $itens->count() }}</strong> produto(s)!
    </h1>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto">

        @if ($itens->isNotEmpty())
            <div id="erro"
                class="container flex-col  -mt-20 mx-auto p-4 mb-4 text-md text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 "
                role="alert">
                <span class="font-medium">Erro</span> Não foi possível realizar operação.
            </div>
        @endif

        <table id="table-carrinho-customers"
            class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-md  text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-24 py-3">
                        <span class="sr-only">
                            Image
                        </span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-12 py-3">
                        Quantidade
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Preço
                    </th>
                    <th scope="col" class="px-10 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($itens as $item)
                    @component('site/components/table-carrinho')
                        @slot('produto_id')
                            {{ $item->rowId }}
                        @endslot
                        @slot('produto_imagem')
                            {{ $item->options->image }}
                        @endslot
                        @slot('produto_nome')
                            {{ $item->name }}
                        @endslot
                        @slot('produto_preco')
                            {{-- formatação para transformar em R$ 99.06 por R$ 99,06 --}}
                            R$ {{ number_format($item->price, 2, ',', '.') }}
                        @endslot

                        @slot('produto_quantidade')
                            {{ $item->qty }}
                        @endslot

                        @slot('produto_input_qty')
                            <form action="{{ route('site.atualizarcarrinho', $item->rowId) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="number" name="qty" value="{{ $item->qty }}" class="text-md h-10 w-14 p-2"
                                    min="1" required />

                                <button type="hidden"
                                    class=" text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-2  inline-flex items-center justify-center h-9 w-9 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                                    aria-label="Close">
                                    <span class="sr-only">update</span>
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="update-alt" class="icon glyph">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M12,3A9,9,0,0,0,6,5.32V3A1,1,0,0,0,4,3V8a1,1,0,0,0,.92,1H10a1,1,0,0,0,0-2H7.11A7,7,0,0,1,19,12a1,1,0,0,0,2,0A9,9,0,0,0,12,3Z">
                                            </path>
                                            <path
                                                d="M19.08,15H14a1,1,0,0,0,0,2h2.89A7,7,0,0,1,5,12a1,1,0,0,0-2,0,9,9,0,0,0,15,6.68V21a1,1,0,0,0,2,0V16A1,1,0,0,0,19.08,15Z">
                                            </path>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        @endslot



                        @slot('produto_remove')
                            <form action="{{ route('site.removercarrinho', $item->rowId) }}" method="POST">
                                @csrf
                                <button type="hidden"
                                    class=" text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-2  inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                                    aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </form>
                        @endslot
                    @endcomponent
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="flex gap-4 justify-between mt-10 mx-auto">
        <button type="button"
            class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-md shadow-md text-sm p-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800   ring-blue-500/50">
            <span class="material-symbols-outlined px-2">arrow_back</span>
            <span class="mr-4">Continuar comprando</span>
        </button>

        </button>

        <a href="{{ route('site.limparcarrinho') }}">
            <button type="button"
                class="text-white bg-red-700 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-md shadow-md  text-sm p-2 text-center inline-flex items-center  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 ring-red-500/50">

                <span class="material-symbols-outlined px-2">delete_forever</span>
                <span class="mr-4">Limpar carrinho</span>
            </button>
        </a>

        <button type="button" src=''
            class="text-white bg-green-700 hover:bg-green-600  focus:ring-4 focus:outline-none focus:ring-gray-800  font-medium rounded-md shadow-md  text-sm p-2 text-center inline-flex items-center  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800  ring-green-500/50">
            <span class="material-symbols-outlined px-2">check</span>
            <span class="mr-4">Finalizar pedido</span>
        </button>

    </div>

    
    @endif

@endsection
