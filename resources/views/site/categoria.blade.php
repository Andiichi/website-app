@extends('site/layout')
@section('title', 'Home')
@section('conteudo')

<h1 class="text-2xl mb-5"> 
    Lista da Categoria: <span class="font-bold text-3xl text-blue-700">{{ Str::upper($categoria->nome ) }}</span>
</h1>


@if ($produto->isNotEmpty())
<div class="grid grid-cols-1 gap-6 md:grid-cols-4">

  {{-- for de array para Verificar se existem produtos --}}
  @foreach ($produto as $produtoCategoria)
  @component('site/components/card-produto')
  
  @slot('produto_nome')  {{ $produtoCategoria->nome }}  @endslot
  @slot('produto_descricao')  {{ Str::limit($produtoCategoria->descricao, 20, ) }}  @endslot
  @slot('produto_imagem')  {{ $produtoCategoria->imagem }}  @endslot
  @slot('produto_slug')  {{ $produtoCategoria->slug }}  @endslot
  @slot('produto_categoria')  {{ $produtoCategoria->categoria->nome }}  @endslot
  
  @endcomponent
  
  @endforeach

  
  
  <div class="container flex flex-col  mx-auto p-4">
    {{ $produto->links() }}
  </div>
  
  
  @else
  
  <div class="container flex flex-col  mx-auto p-4 mb-4 text-md text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Erro</span> Não tem itens na categoria para serem exibidos.
  </div>
  
  @endif
  
</div>

@endsection
