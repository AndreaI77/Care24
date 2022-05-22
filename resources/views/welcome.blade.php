@extends('template')
@section('title','Home')
@section('content')
<div class="text-center">
    <h1 class="text-success">Bienvenido {{ auth()->user()->nombre }}.</h1>
    <p class="fs-4">No olvides cerrar la sesión antes de salir de la aplicación.</p>
    <img src="{{asset('img/logo2.png')}}" alt="logo" width="300">
</div>
@endsection
