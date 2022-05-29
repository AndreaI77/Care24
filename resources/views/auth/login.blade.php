@extends('template')
@section('title','Login')
@section('content')

        <div class="d-flex flex-column ">
            <div class="container">

                <div class="row justify-content-center mt-5 ">
                    @if (!empty($error))
                        <h1 class="text-danger text-center"> {{ $error }} </h1>
                    @endif
                    <div class="col-lg-5 ">
                        <div class="card shadow-lg borderc border-2 border-success rounded-lg ">

                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Iniciar sesión</h3>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{route('login2')}}" method="POST" novalidate>
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="dni" name="dni" type="text" required/>
                                        <label for="dni">DNI/NIE:</label>
                                        <div class="invalid-feedback">El DNI/NIE es obligatorio.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password"  name="password" type="password" required />
                                        <label for="password">Contraseña</label>
                                        <div class="invalid-feedback">La contraseña es obligatoria .</div>
                                    </div>

                                    <input    name="fecha_baja" type="hidden" value="" />
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="{{route('recuperacion')}}">¡He olvidado mi contraseña!</a>
                                        {{-- <a class="small" href="{{route('home')}}">Volver</a> --}}

                                        <button type="submit" class="float-end mt-0 btn btn-success text-warning fw-bolder" id="enter" name="enter">Entrar <i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="offcanvas offcanvas-bottom text-center max-vh-20 " tabindex="-1" id="offcanvasBottom"  aria-labelledby="offcanvasBottomLabel">
                <div class="offcanvas-header ms-auto">
                    <button type="button " class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body small">
                    <h5 class="" >Política de cookies</h5>
                    <p>Esta página usa cookies para mejorar su experiencia y proporcionar funcionalidades adicionales. </p>
                    <div>
                    <a href="../Cookies.html">Detalles</a>
                    <a class="ms-3 me-3" href="../Privacidad.html">Política de privacidad</a>
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
    <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" ></script>
@endsection

