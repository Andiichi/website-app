@extends('site/layout')
@section('title', 'Carrinho')
@section('conteudo')

    {{-- @dump(session()->all()) //metodo para debugar retorno session/flash --}}

    <x-alert />


    <h1 class="text-2xl mb-5 font-semibold">
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

        <table id="table-carrinho-customers" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-md text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
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
                    @endcomponent
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="flex gap-4  mt-4 mx-auto">
        <button type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <span class="material-symbols-outlined px-2">arrow_back</span>
            <span class="mr-4">Continuar comprando</span>
        </button>

        </button>

        <button type="button"
            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2 text-center inline-flex items-center  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            <span class="material-symbols-outlined px-2">delete_forever</span>
            <span class="mr-4">Limpar carrinho</span>
        </button>

        <button type="button"
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2 text-center inline-flex items-center  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            <span class="material-symbols-outlined px-2">check</span>
            <span class="mr-4">Finalizar pedido</span>
        </button>
    </div>

    </div>



@endsection
