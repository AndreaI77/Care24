@extends('template')
@section('title','Perfil')
@section('content')


            <div class="row justify-content-center ">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-2 border-success rounded-lg mt-3 mb-5">
                        <div class="card-header">
                            <h3 class="text-center text-success fw-bolder my-4">Mis datos:</h3>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" action="{{route('perfil.update', auth()->user()->id)}}" method="post" novalidate>
                                @csrf
                                @method('PUT')

                                <div class="row mb-3 g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating  ">
                                            <input class="form-control" id="nombre" name= "nombre" type="text" value="{{auth()->user()->nombre}}" disabled />
                                            <label for="nombre">Nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating ">
                                            <input class="form-control" id="apellidos" name= "apellidos" type="text" value="{{auth()->user()->apellido}}"  disabled />
                                            <label for="apellidos">Apellidos</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating ">
                                            <input class="form-control" id="domicilio" name= "domicilio" type="text" value="{{auth()->user()->domicilio}}"  disabled />
                                            <label for="domicilio">domicilio</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating ">
                                            <input class="form-control" id="dni" name= "dni" type="text" value="{{auth()->user()->dni}}"  disabled />
                                            <label for="dni">DNI/NIE</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating ">
                                            <input class="form-control" id="fecha_nac" name= "fecha_nac" type="text" value={{Carbon\Carbon::parse(auth()->user()->fecha_nac)->format('d/m/Y')}}  disabled />
                                            <label for="fecha_nac">Fecha de nacimiento</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating ">
                                            <input class="form-control" id="tel" name= "tel" type="tel" value="{{auth()->user()->tel}}"  disabled />
                                            <label for="tel">Teléfono</label>
                                        </div>
                                    </div>
                                    @if(auth()->user()->tipo === 'cliente')
                                        <div class="col-md-6">
                                            <div class="form-floating ">
                                                <input class="form-control" id="sip" name= "sip" type="text" value="{{Crypt::decryptString($user->sip)}}"  disabled />
                                                <label for="sip">SIP</label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-floating mb-3 ">
                                    <input class="form-control" name="email" id="email" type="email" value="{{auth()->user()->email}}"  disabled />
                                    <label for="email">Email</label>
                                </div>

                                <input class="form-check-input" type="checkbox" id="chbox" name="chbox" value="Contraseña">
                                <label class="form-check-label" for="chbox">Cambiar contraseña</label><br>
                                <div class="d-flex justify-content-end">
                                    <a href= "{{route('inicio')}}" class="btn btn-outline-success  m-3 "><i class="bi bi-arrow-left"></i> Salir</a>
                                </div>
                                <div class="row mt-3" id="passwords">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="pass" name="pass" minlength='8' type="password" placeholder="Create a password" required />
                                            <label for="pass">Nueva Contraseña</label>
                                            <div class="invalid-feedback text-danger">
                                                ¡Rellene la contraseña! min. 8 carácteres
                                            </div>
                                            @if($errors->has('pass'))
                                            <div class='text-danger '>
                                            {{$errors->first('pass')}}
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="password_confirmation" minlength='8' name="password_confirmation" type="password" placeholder="Confirm password" value="" required />
                                            <label for="password_confirmation">Repita Nueva Contraseña</label>
                                            <div class="invalid-feedback text-danger">
                                                ¡Las contraseñas no coinciden!
                                            </div>
                                            @if($errors->has('password_confirmation'))
                                            <div class='text-danger '>
                                            {{$errors->first('password_confirmation')}}
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0 d-flex justify-content-center">
                                        <input class="btn btn-success text-warning fv-bolder" type="submit" id="enter" value="Modificar contraseña" name="enter" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/perfil.js') }}" ></script>
@endsection
