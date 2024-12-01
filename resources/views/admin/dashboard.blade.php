@extends('site/layout')
@section('title', 'Dashboard | Admin')
@section('conteudo')

    <x-site.alert />
   
    @if($errors->any())
      @foreach ($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
    @endif

    <h1>Olá! {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}!</h1>

@endsection