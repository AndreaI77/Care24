@extends('template')
@section('title','Home')
@section('content')
<div class="text-center">
    <h1>Bienvenido {{ auth()->user()->nombre }}.</h1>
    <p>No olvide cerrar la sesión antes de salir de la aplicación.</p>
</div>
@endsection
