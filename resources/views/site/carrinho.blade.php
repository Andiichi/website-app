@extends('site/layout')
@section('title', 'Carrinho')
@section('conteudo')

    {{-- @dump(session()->all()) //metodo para debugar retorno session/flash --}}

    <x-site.alert />

    {{-- <x-site.banner /> --}}

    {{-- verificar se existe valor no carrinho --}}
    @if ($itens->count() == 0)

        @include('site.components.carrinho-vazio')
    @else
        <div class="font-sans max-w-5xl max-md:max-w-xl mx-auto p-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-12">Seu carrinho possui <strong>{{ $itens->count() }}</strong>
                produto(s)!</h2>

            <div class="grid md:grid-cols-3 gap-4 mt-8">
                <div class="md:col-span-2 space-y-4">
                    @foreach ($itens as $item)
                
                        <div class="flex gap-4 bg-white px-4 py-6 rounded-md shadow-[0_2px_12px_-3px_rgba(6,81,237,0.3)]">
                            <div class="flex gap-4">
                                <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0">
                                    <img src='{{ $item->options->image }}'
                                        class="w-full h-full rounded-full object-contain" />
                                </div>

                                <div class="flex flex-col gap-4">
                                    <div>
                                        <h3 class="text-base font-bold text-gray-800 text-pretty">
                                            {{ $item->name }}
                                        </h3>
                                        <p class="text-sm font-semibold text-gray-500 mt-2 flex items-center gap-2">
                                            Categoria: <strong>{{ $item->options->categoria }}</strong>

                                    </div>

                                    <div class="mt-auto flex items-center gap-3">
                                        <form action="{{ route('site.atualizarcarrinho', $item->rowId) }}" method="POST"
                                            enctype="multipart/form-data">
                                            
                                            <label for="counter-input"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Choose
                                                quantity:</label>
                                            <div class="relative flex items-center">
                                                <button type="button" id="decrement-button"
                                                   
                                                    class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                    </svg>
                                                </button>

                                                <input type="text" id="counter-input" 
                                                    class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                                    placeholder="" name="qty" data-csrf='{{ csrf_token() }}' value="{{ $item->qty }}" data-rowId='{{ $item->rowId }}' required />

                                                <button type="button" id="increment-button"
                                                    
                                                    class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                            {{-- <input type="number" name="qty" value="{{ $item->qty }}"
                                                class="text-md h-10 w-14 p-2" min="1" required />

                                            <button type="hidden"
                                                class=" text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-2  inline-flex items-center justify-center h-9 w-9 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                                                aria-label="Close">
                                                <span class="sr-only">update</span>
                                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="update-alt"
                                                    class="icon glyph">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M12,3A9,9,0,0,0,6,5.32V3A1,1,0,0,0,4,3V8a1,1,0,0,0,.92,1H10a1,1,0,0,0,0-2H7.11A7,7,0,0,1,19,12a1,1,0,0,0,2,0A9,9,0,0,0,12,3Z">
                                                        </path>
                                                        <path
                                                            d="M19.08,15H14a1,1,0,0,0,0,2h2.89A7,7,0,0,1,5,12a1,1,0,0,0-2,0,9,9,0,0,0,15,6.68V21a1,1,0,0,0,2,0V16A1,1,0,0,0,19.08,15Z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </button> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="ml-auto flex flex-col">
                                <div class="flex items-start gap-4 justify-end">
                                    <form action="{{ route('site.removercarrinho', $item->rowId) }}" method="POST">
                                        @csrf
                                        <button type="hidden">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 cursor-pointer hover:fill-red-600  fill-gray-400 inline-block"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                    data-original="#000000"></path>
                                                <path
                                                    d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                    data-original="#000000"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <h3 class="font-bold text-gray-800 mt-auto"><span class="text-[0.6rem] pr-1">R$</span><span
                                        class="text-xl">{{ number_format($item->price, 2, ',', '.') }}</span></h3>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="bg-white rounded-md px-4 py-6 h-max shadow-[0_2px_12px_-3px_rgba(6,81,237,0.3)]">
                    <ul class="text-gray-800 space-y-4">
                        <li class="flex flex-wrap gap-2 text-sm font-medium">
                            Subtotal<span class="text-[0.6rem] ml-auto mt-1">R$</span><span class="text-xl">{{ \Cart::subtotal(); }}</span>
                            </h3>
                        </li>
                        <li class="flex flex-wrap gap-2 text-sm font-medium">
                            Tx. Tributos<span class="text-[0.6rem] ml-auto mt-1">R$</span><span
                                class="text-xl">{{ \Cart::tax(); }}</span></h3>
                        </li>
                        <li class="flex flex-wrap gap-2 text-sm font-medium">
                            Frete<span class="text-[0.6rem] ml-auto mt-1">R$</span><span class="text-xl">206.00</span></h3>
                        </li>
                        <hr class="border-gray-300" />
                        <li class="flex flex-wrap gap-2 text-xl font-bold">
                            Total<span class="text-[0.6rem] ml-auto mt-1">R$</span><span id='totalcarrinho' class="text-xl">
                                {{ $total = Cart::total(2, ',', '.') }}

                            </span></h3>
                        </li>

                    </ul>

                    <div class="mt-8 space-y-2">
                        <a href="/">
                            <button type="button"
                                class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-gray-800 hover:bg-gray-900 text-white rounded-md">
                                Comprar
                            </button>
                        </a>
                        <a href="{{ route('site.list-products') }}">
                            <button type="button"
                                class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-transparent hover:bg-gray-100 text-gray-800 border border-gray-300 rounded-md">
                                Continuar comprando
                            </button>
                        </a>
                        <hr class="border-gray-300 pb-2" />
                        <a href="{{ route('site.limparcarrinho') }}">
                            <button type="button"
                                class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-red-700 hover:bg-red-600 text-white rounded-md">
                                Limpar carrinho
                            </button>
                        </a>
                    </div>

                    {{-- <div class="mt-4 flex flex-wrap justify-center gap-4">
                           
                            <img src='https://readymadeui.com/images/master.webp' alt="card1" class="w-10 object-contain" />
                            <img src='https://readymadeui.com/images/visa.webp' alt="card2" class="w-10 object-contain" />
                            <img src='https://readymadeui.com/images/american-express.webp' alt="card3" class="w-10 object-contain" />
                        </div> --}}
                </div>
            </div>

        </div>

        {{-- <table id="table-carrinho-customers"
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
                                {{-- formatação para transformar em R$ 99.06 por R$ 99,06 
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
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="update-alt"
                                            class="icon glyph">
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
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                    </button>
                                </form>
                            @endslot
                        @endcomponent
                    @endforeach

                </tbody>
            </table> --}}
        </div>

        {{-- <div class="flex gap-4 justify-between mt-10 mx-auto">
            <a href="{{ route('site.list-products') }}">
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-md shadow-md text-sm p-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800   ring-blue-500/50">
                <span class="material-symbols-outlined px-2">arrow_back</span>
                <span class="mr-4">Continuar comprando</span>
            </button>
        </a>

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
 --}}

    @endif

@endsection
