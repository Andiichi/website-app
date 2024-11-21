@extends('site/layout')

{{-- <-- Esse é um comentario de templates blade
    
Tem dois jeitos para adicionar uma @section:
@section('title', 'Esse é o titulo da pagina')
ou 
@section('title') Essa é a pagina HOME @endsection
--}} 

@section('title', 'Home')
@section('conteudo')

<h1 class="text-2xl mb-5 font-semibold">Lista de Produtos:</h1>

<div class="grid grid-cols-1 gap-6 md:grid-cols-4">
    @foreach ($produtos as $produto)
     @component('site/components/card-produto')

        @slot('produto_nome')  {{ $produto->nome }}  @endslot
        @slot('produto_descricao')  {{ Str::limit($produto->descricao, 20, ) }}  @endslot
        @slot('produto_imagem')  {{ $produto->imagem }}  @endslot
        @slot('produto_slug')  {{ $produto->slug }}  @endslot
        @slot('produto_categoria')  {{ $produto->categoria->nome }}  @endslot

     @endcomponent
    @endforeach
  </div>

  <div class="container flex flex-col  mx-auto p-4">
    {{ $produtos->links() }}
  </div>
  
  @endsection



{{-- ANOTAÇÕES
//Estrutura de controle 

@if ($nome == 'andrezza')
    true
@else
 false   
@endif

// O oposto do if - quando a condição for falsa executa 

@unless ($nome == 'rodrigo')
true
@else
 false   
@endunless   

// controle switch
@switch($idade)
@case(32)
a idade esta ok
@break
@case(31)
a idade esta nao ok

@break
@default
idade invalida
@endswitch

// verificar se existe a variavel

@isset($nome)
existe    
@endisset

 // verificar se existe valor na variavel

@empty($nome)
   esta vazia <br>
@endempty

// quando tiver usuario autenticado no sistema

@auth
esta autenticada
@endauth

// quando tiver NÃO usuario autenticado no sistema
@guest
    nao esta autenticado
@endguest

--}}


{{-- Estrutura de repetição 

//usando for
@for ($i = 1; $i <= 10; $i++)
   for - valor do i é <strong>{{ $i }}</strong><br>
@endfor

//usaando while 
@php $i = 0 @endphp

@while ($i <= 10)
    while - valor do i é <strong>{{ $i }}</strong><br>
    @php $i ++ @endphp

@endwhile

//para exibir array
@foreach ($frutas as $item)
{{ $item }}<br>
@endforeach

e caso o array pode esta vazio, faça o seguinte
@forelse ($frutas as $item)
    {{ $item }}
@empty
    o array esta vazio
@endforelse

--}}

{{--    

@include('includes/mensagem', ['titulo'=>'Mensagem de sucesso!'])


@component('components/sidebar')
    @slot('paragrafo')
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, beatae. Error accusantium non facere inventore illo sequi eos ad sapiente assumenda blanditiis distinctio nulla mollitia unde, consequatur quas! Temporibus, autem.
    @endslot
@endcomponent 
--}}




