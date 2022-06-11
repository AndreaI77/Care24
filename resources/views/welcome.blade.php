@extends('template')
@section('title','Home')
@section('content')

<div class="text-center">
    <p class="float-end">{{Carbon\Carbon::now()->format('d/m/Y')}} </p>
    <h1 class="text-success">Bienvenid@ {{ auth()->user()->nombre }}.</h1>

    <p class="fs-4">No olvides cerrar la sesión antes de salir de la aplicación.</p>
    <img src="{{asset('img/logo2.png')}}" alt="logo" width="300">
</div>
<section>
    <a class="invisible enlace" data-bs-toggle="offcanvas" href="#offcanvasBottom" role="button" aria-controls="offcanvasExample">
        Link
    </a>
    <div class="offcanvas offcanvas-bottom text-center max-vh-20 " tabindex="-1" id="offcanvasBottom"  aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header ms-auto">
            <button type="button " class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small">
            <h5 class="" >Política de cookies</h5>
            <p>Esta página usa cookies para mejorar su experiencia y proporcionar funcionalidades adicionales. </p>
            <div>
            <a href="{{route('cookies')}}">Detalles</a>
            <a class="ms-3 me-3" href="{{route('privacidad')}}">Política de privacidad</a>
            <a class="btn btn-success text-warning "  data-bs-toggle="offcanvas" href="#offcanvasBottom" role="button" aria-controls="offcanvasExample">
                Aceptar
            </a>
            </div>

        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="{{ asset('js/cookies.js') }}"></script>
@endsection
