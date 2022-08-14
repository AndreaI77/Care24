@extends('template')
@section('title','Currículum Vitae')
@section("css")
<script type="text/javascript">
    function callbackThen(response){
    // read HTTP status
    console.log(response.status);
    // read Promise object
    response.json().then(function(data){
    console.log(data);
    });
    }
    function callbackCatch(error){
    console.error('Error:', error)
    }
    </script>
    {!! htmlScriptTagJsApi([

    'callback_then' => 'callbackThen',

    'callback_catch' => 'callbackCatch'

    ]) !!}
@endsection
@section('content')

        <div class="d-lg-flex w-100 pt-3">
            <div class="d-flex col col-lg-5 justify-content-center align-items-center mx-auto text-center p-4 pt-0">
                <div>
                <h2 class="text-success">Sobre nuestro equipo</h2>
                <p>
                    Nuestro equipo está formado por profesionales de la asistencia a domicilio y dependencia.
                    Buscamos personas implicadas en nuestro proyecto y que su pasión sea la atención personal y el cuidado de los demás.
                    <br/>Necesitamos profesionales con un alto grado de empatía y de comprensión de las necesidades de las personas que requieren sus
                    cuidados.
                </p>
                <p>Si es tu caso, nos encantaría que te unieses a nuestro equipo.</p>
                <img class=" d-none d-lg-block mt-5 mx-auto "src="{{asset('img/logo2Trans.png')}}" alt="logo">
            </div>
            </div>
            <div class="d-flex col col-lg-5 justify-content-center align-items-center mx-auto  p-4">

                    <div>
                        <form class="row g-3 border border-3 border-success rounded p-2 bg-light needs-validation" action="" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <h1 class="m-0 text-center"> Trabaja con nosotros:<img class="float-end d-lg-none" src="{{asset('img/logo2.png')}}" alt="logo" width="50"></h1>
                            <div>
                                <label class="form-label" for="nombre">Tu nombre:</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" value="{{old('nombre')}}"  autofocus required>
                                <div class="invalid-feedback">Introduce tu nombre.</div>

                                @if($errors->has('nombre'))
                                    <div class='text-danger mens'>
                                    {{$errors->first('nombre')}}
                                    </div>
                                @endif

                            </div>
                            <div>
                                <label for="apellidos" class="form-label">Tus apellidos:</label>
                                <input class="form-control" type="text" name="apellidos" id="apellidos" value="{{old('apellidos')}}" required>
                                <div class="invalid-feedback">Introduce tus apellidos.</div>
                                @if($errors->has('apellidos'))
                                    <div class='text-danger mens'>
                                    {{$errors->first('apellidos')}}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <label for="email" class="form-label">Tu email:</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="usuario@ejemplo.com" value="{{old('email')}}" required>
                                <div class="invalid-feedback">Introduce tu e-mail</div>
                                @if($errors->has('email'))
                                    <div class='text-danger mens'>
                                    {{$errors->first('email')}}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <label for="tel" class="form-label">Tu teléfono:</label>
                                <input class="form-control" type="tel" pattern="[0-9]{9,}" name="tel" id="tel" value="{{old('tel')}}" required>
                                <div class="invalid-feedback">Introduce tu teléfono (min. 9 números).</div>
                                @if($errors->has('tel'))
                                    <div class='text-danger mens'>
                                    {{$errors->first('tel')}}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <label for="puesto" class="form-label">¿Que categoría laboral te interesa?:</label>
                                <div class="invalid-feedback">Elige una categoría.</div>
                                <input class="form-control" type="text" name="puesto" id="puesto" placeholder="administrativo, cuidadora..." required value="{{old('puesto')}}">
                                @if($errors->has('puesto'))
                                    <div class='text-danger mens'>
                                    {{$errors->first('tel')}}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <label for="mensaje" class="form-label">Escribe tu mensaje (opcional):</label>
                                <textarea class="form-control" name="mensaje" id="mensaje" rows="3">{{old('mensaje')}}</textarea>
                                @if($errors->has('mensaje'))
                                    <div class='text-danger mens'>
                                    {{$errors->first('mensaje')}}
                                    </div>
                                @endif
                            </div>
                            <h2 class="fs-4 text-success">Sube tu currículum aquí:</h2>
                            <p class='small'>(Tipos permitidos: PDF, DOC, DOCX)</p>
                            <div class="m-3 w-100">

                                <input type="hidden" name="MAX_FILE_SIZE" value="4000000" />
                                <input type="file" id="cv" name="cv" accept= ".pdf, .doc, .docx" required>
                                <div class="invalid-feedback">¡Selecciona un archivo!</div>
                                @if($errors->has('cv'))
                                    <div class='text-danger mens'>
                                    {{$errors->first('cv')}}
                                    </div>
                                @endif
                            </div>
                            <div class="col">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" value="" name="invalidCheck" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                      Acepto términos y condiciones
                                    </label>
                                    <div class="invalid-feedback">
                                      Debes aceptar los términos y condiciones!
                                    </div>
                                </div>
                                <button type="submit" class="float-end mt-0 btn btn-success text-warning fw-bolder" id="enter" name="enter" >Enviar <i class="bi bi-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
        <section>
            <a class="invisible enlace" data-bs-toggle="offcanvas" href="#offcanvasBottom" role="button" aria-controls="offcanvasExample">
                Link with href
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

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

            <script src="{{ asset('js/cookies.js') }}"></script>
            <script src="{{ asset('js/main.js')}}" defer></script>
        @endsection
