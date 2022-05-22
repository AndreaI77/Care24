@extends('template')
@section('title','Recuperación')
@section('content')

    <div class="row justify-content-center">
        @if (!empty($error))
            <h1 class="text-danger text-center"> {{ $error }} </h1>
        @endif
        <div class="col-lg-5">
            <div class="card shadow-lg border-2 border-success rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center my-4">Recuperación de contraseña</h3></div>
                <div class="card-body">
                    <p class=" mb-3 ">Inserta tu DNI/NIE y tu e-mail</p>
                    <form action="{{route('recup')}}" method="POST"  class = 'needs-validation' novalidate>
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" name="dni" id="dni" type="text" required />
                            <label for="dni">DNI/NIE</label>
                            <div class="invalid-feedback">El DNI/NIE es obligatorio.</div>

                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="email" type="email" required  />
                            <label for="email">E-mail</label>
                            <div class="invalid-feedback">E-mail es obligatorio.</div>

                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="" href="{{route('login')}}">Volver a login</a>
                            <button type="submit" class="btn btn-success text-warning" name="enter" id='enter' >Enviar <i class="bi bi-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" ></script>
@endsection




