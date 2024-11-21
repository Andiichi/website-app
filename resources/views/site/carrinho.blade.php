@extends('site/layout')
@section('title', 'Carrinho')
@section('conteudo')





@if ($mensagem = Session::get('sucesso'))
<div id="alert-border-3" class="flex container-fluid items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ms-3 text-sm font-medium">
        {{$mensagem}}
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
 @endif

<h1 class="text-2xl mb-5 font-semibold">Seu carrinho possui {{ $itens->count() }} produto(s)!</h1>
@if ($itens->isNotEmpty())
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto">
   
<div id="erro" class="container flex-col  -mt-20 mx-auto p-4 mb-4 text-md text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 " role="alert">
    <span class="font-medium">Erro</span> Não foi possível realizar operação.
  </div>
    @else
        
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

     @slot('produto_imagem')  {{ $item->options->image }}  @endslot
        @slot('produto_nome')  {{ $item->name }}  @endslot
        @slot('produto_preco') 
        {{-- formatação para transformar em R$ 99.06 por R$ 99,06 --}}
        R$ {{ number_format($item->price, 2, ',', '.') }}
        @endslot

        @slot('produto_quantidade')  {{ $item->qty }}  @endslot

     @endcomponent
     
    @endforeach
           
        </tbody>
    </table>
</div>

<div class="flex gap-4  mt-4 mx-auto">
    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <span class="material-symbols-outlined px-2">arrow_back</span>
        <span class="mr-4">Continuar comprando</span>
        </button>
      
    </button>

  <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2 text-center inline-flex items-center  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
      <span class="material-symbols-outlined px-2">delete_forever</span>
      <span class="mr-4">Limpar carrinho</span>
  </button>

  <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2 text-center inline-flex items-center  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
      <span class="material-symbols-outlined px-2">check</span>
      <span class="mr-4">Finalizar pedido</span>
  </button>
</div>
  
  
</div>


@endsection
