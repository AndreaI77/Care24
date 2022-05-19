@extends('template')
@section('title','Care24')
@section('content')

<section class=" bg-light p-0 animate__animated animate__fadeInUp">
    <h1 class=" text-success bg-success bg-opacity-25 text-center w-100 m-0">Términos y condiciones de uso</h1>
    <p class="p-5 mt-5"> Aquí es donde se pone un montón de texto legal, lo suficientemente largo para que nadie se
        atreva a leerlo, incluyendo cláusulas con las que nadie estaría de acuerdo, si las hubiera leído.</p>
</section>


<section>
    <div class="offcanvas offcanvas-bottom text-center max-vh-20 " tabindex="-1" id="offcanvasBottom"  aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header ms-auto">
            <button type="button " class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small">
            <h5 class="" >Política de cookies</h5>
            <p>Esta página usa cookies para mejorar su experiencia y proporcionar funcionalidades adicionales. </p>
            <div>
            <a href="{{route('cookies')}}">Detalles</a>
            <a class="ms-3 me-3" href="Privacidad.html">Política de privacidad</a>
            <a class="btn btn-success text-warning "  data-bs-toggle="offcanvas" href="#offcanvasBottom" role="button" aria-controls="offcanvasExample">
                Aceptar
            </a>
            </div>

        </div>
    </div>
</section>
@endsection
@section('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <script src="{{ asset('js/cookies.js') }}"></script>
@endsection

