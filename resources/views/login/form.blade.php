@extends('site/layout')
@section('title', 'Login')
@section('conteudo')

    
   
    @if($errors->any())
      @foreach ($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
    @endif

    <x-site.alert />
   

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <h1 class="text-gray-800 text-3xl font-extrabold">Faça seu login!</h1>
          <form class="space-y-6" action="{{ route('login.auth') }}" method="POST">
            @csrf

            <div>
              <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
              <div class="mt-2">
                <input type="email" name="email" id="email" autocomplete="email" placeholder="Digite seu email..." required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-400 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
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
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
            </div>
          </form>
      
          <p class="mt-10 text-center text-sm/6 text-gray-500">
            
          </p>
        </div>
        
      </div>


@endsection
