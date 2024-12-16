@extends('site/layout')
@section('title', 'Login')
@section('conteudo')

    
   
    @if($errors->any())
      @foreach ($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
    @endif

    <x-site.alert />
   
    <div class="max-w-4xl mx-auto font-[sans-serif] p-6">
        <div class="text-center">
            <h1 class="text-gray-800 text-3xl font-extrabold">Faça seu cadastro!</h1>
          <h4 class="text-gray-800 text-base font-semibold mt-6">Preencha as informações abaixo para criar um cadastro.</h4>
        </div>
  
        <form action="{{ route('users.store') }}" method="POST">
          @csrf

          <div class="grid sm:grid-cols-2 gap-8 mt-8">
            <div>
              <label class="text-gray-800 text-sm mb-2 block">Nome</label>
              <input name="firstname" type="text" class="bg-white w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Digite seu nome..." />
            </div>
            <div>
              <label class="text-gray-800 text-sm mb-2 block">Sobrenome</label>
              <input name="lastname" type="text" class="bg-white w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Digite seu sobrenome..." />
            </div>
        </div>
        <div class="grid sm:grid-cols-2 gap-8 mt-8">
            <div>
              <label class="text-gray-800 text-sm mb-2 block">Email</label>
              <input name="email" type="text" class="bg-white w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Digite seu email..." />
            </div>
         
            <div>
              <label class="text-gray-800 text-sm mb-2 block">Senha</label>
              <input name="password" type="password" class="bg-white w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Digite sua senha..." />
            </div>
            {{-- <div>
              <label class="text-gray-800 text-sm mb-2 block">Confirme seu senha</label>
              <input name="cpassword" type="password" class="bg-white w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Confirme sua senha..." />
            </div> --}}
        </div>
  
          <div class="mt-4">

            <div class="flex my-4 items-start">
                <div class="flex items-center h-5">
                  <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                </div>
                <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Eu aceito os <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">termos e condições</a> do site.</label>
              </div>

            <button type="submit" class=" justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 tracking-wider focus-visible:outline-indigo-600">Cadastrar</button>
          </div>
        </form>
      </div>

    {{-- <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <h1 class="text-gray-800 text-3xl font-extrabold">Faça seu cadastro!</h1>
          <form class="space-y-6" action="" method="POST">
            @csrf

            <div>
              <label for="text" class="block text-sm/6 font-medium text-gray-900">Nome</label>
              <div class="mt-2">
                <input type="text" name="firstname" id="email" autocomplete="email" placeholder="Digite seu email..." required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-400 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div>
                <label for="text" class="block text-sm/6 font-medium text-gray-900">Sobrenome</label>
                <div class="mt-2">
                  <input type="text" name="lastname" id="email" autocomplete="email" placeholder="Digite seu email..." required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-400 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
              </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="text-sm">
                  <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                </div>
              </div>
              <div class="mt-2">
                <input type="password" name="password" id="password" placeholder="Digite sua senha..." autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-400 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>
      
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastrar</button>
            </div>
          </form>
      
          <p class="mt-10 text-center text-sm/6 text-gray-500">
            
          </p>
        </div>
        
      </div> --}}


@endsection
