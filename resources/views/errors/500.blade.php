@extends('site/layout')

@section('title', '500 Internal Server Error')

@section('conteudo')

<main class="grid min-h-full mx-auto place-items-center bg-white px-6 py-16 sm:py-12 lg:px-8">
    <div class="text-center">
        {{-- Imagem de Erro 404 --}}
        <img src="https://http.cat/500" alt="Erro 500" class="w-[28rem] mx-auto">

        {{-- Mensagem de Erro --}}
        <p class="mt-6 text-lg font-medium text-gray-500 sm:text-xl">
            Erro no servidor.
        </p>

        {{-- Botões de Navegação --}}
        <div class="mt-10 flex flex-col md:flex-row items-center justify-center gap-x-6 gap-y-4">
            <a href="/produtos" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Voltar a Home
            </a>
            <a href="#" class="text-sm font-semibold text-gray-900">
                Contatar o suporte <span aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </div>
</main>

  
  

@endsection
