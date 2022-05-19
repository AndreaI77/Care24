@extends('template')
@section('title','Currículum Vitae')
@section('content')

    <div class="d-lg-flex  w-100 pt-3">
        <div class="d-flex col col-sm-9 col-lg-5 justify-content-center align-items-center mx-auto  text-center fw-bolder">
             <div >
             <p>Rellene este formulario de contacto para resolver cualquier duda o pedir presupuesto sin compromiso.
             </p>
             <p>
                Si lo que desea es enviar su currículum, haga click <a href="{{route('envioCV')}}">aquí</a>
             </p>
             <img class=" d-none d-lg-block mt-5 mx-auto img-fluid "src="{{asset('img/logo2Trans.png')}}" alt="logo" >
            </div>
        </div>
        <div class="d-flex col  col-sm-9 col-md-7 col-lg-6 col-xl-5 col-lg-5 justify-content-center align-items-center mx-auto p-4">

            <form class="row g-3 border border-3 border-success rounded p-2 bg-light needs-validation" action= "{{route('contact.store')}}" method="POST" novalidate>
                @csrf
                <h1 class="m-0 text-center"> Contacto:<img class="float-end d-lg-none" src="../../public/img/logo2.png" alt="logo" width="50"></h1>

                <div>
                    <label class="form-label" for="nombre">Tu nombre:</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="{{old('nombre')}}" autofocus required>
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
                    <input class="form-control" type="email" name="email" id="email" placeholder="usuario@ejemplo.com" value="{{old('email')}}">

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
                    <label for="mensaje" class="form-label">Escribe tu mensaje:</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required>{{old('mensaje')}}</textarea>
                    <div class="invalid-feedback">¿Sobre que quieres que te informemos?.</div>
                    @if($errors->has('mensaje'))
                        <div class='text-danger mens'>
                        {{$errors->first('mensaje')}}
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
                    <a href="{{route('condiciones')}}">Ver Términos y condiciones</a>
                    <button type="submit" class="float-end mt-0 btn btn-success text-warning fw-bolder" id="enter" name="enter">Enviar <i class="bi bi-arrow-right"></i></button>
                </div>
            </form>
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

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script src="{{ asset('js/cookies.js') }}"></script>
        <script src="{{ asset('js/main.js')}}" defer></script>
    @endsection

