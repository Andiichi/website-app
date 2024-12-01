@extends('site/layout')

@section('title', 'Home')

@section('conteudo')

    <x-site.alert />

    <div class="grid md:grid-cols-2 items-center md:gap-4 mb-0 gap-8 font-[sans-serif] max-w-5xl max-md:max-w-md mx-auto">
        <div class="max-md:order-1 max-md:text-center">

            @if (Auth::check())

            <h3 class="text-gray-800 md:text-4xl text-2xl md:leading-10">
                < Bem-vindo(a), <strong>{{ auth()->user()->firstname }}</strong>! />
            </h3>
            <p class="mt-4 text-sm text-gray-600">
                Agora você tem acesso aos conteúdos exclusivos do 'CursoLaravel'! Clique em produtos e se aventure! 
            </p>

            <a href="{{ route('login.logout') }}"><button type="button"
                class="px-5 py-2.5 mt-8 rounded text-sm outline-none tracking-wide bg-blue-600 text-white hover:bg-blue-700">Logout</button></a>

            @else
                
            <h3 class="text-gray-800 md:text-6xl text-2xl md:leading-10">
                < Bem-vindo! />
            </h3>
            <p class="mt-4 text-sm text-gray-600">
                Para acessar os conteúdos exclusivos do 'CursoLaravel', necessário realizar o login!
            </p>
                <a href="{{ route('login') }}"><button type="button"
                        class="px-5 py-2.5 mt-8 rounded text-sm outline-none tracking-wide bg-blue-600 text-white hover:bg-blue-700">Login</button></a>
                <button type="button"
                    class="px-5 py-2.5 mt-8 rounded text-sm outline-none tracking-wide bg-gray-600 text-white hover:bg-gray-700">Criar
                    uma conta</button>
            @endif

        </div>
        <div class="md:h-[470px]">
            <img src="img/photo.jpg" class="w-full h-full md:object-contain" />
        </div>
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
