@extends('template')
@section('title','Editar')
@section('content')

    @if( $empleado->user_id != 1)
        <form class="bg-light border rounded needs-validation" action="{{route('empleados.update', $empleado->id)}}" method="post"  novalidate >
            @csrf
            @method('PUT')
            <h1 class="bg-success bg-opacity-25 text-success text-center">Editar empleado</h1>
            <div class= "row g-3 p-3">
                <input type= "hidden" name ="user_id" id="user_id" value = {{$empleado->user->id}}>
                <div class= "col-sm-4">
                    <label class= "form-label fw-bolder" for="nombre">Nombre:</label>
                    <input class="form-control " type="text" minLength='2' name="nombre" id="nombre" autofocus value="{{$empleado->user->nombre}}" required>

                    <div class="invalid-feedback">El nombre es obligatorio (min. 2 carácteres)</div>
                    @if($errors->has('nombre'))
                        <div class='text-danger mens'>
                        {{$errors->first('nombre')}}
                        </div>
                    @endif
                </div>
                <div class= "col-sm-8">
                    <label class= "form-label fw-bolder" for="apellido"><span class="text-danger">*</span>Apellidos:</label>
                    <input class="form-control" type="text" name="apellido" id="apellido" required value="{{$empleado->user->apellido}}">
                    <div class="invalid-feedback">El apellido es obligatorio</div>
                    @if($errors->has('apellido'))
                        <div class='text-danger mens'>
                        {{$errors->first('apellido')}}
                        </div>
                    @endif
                </div>
                <div class= "col-12">
                    <label class= "form-label fw-bolder" for="domicilio"><span class="text-danger">*</span>Domicilio:</label>
                    <input class="form-control" type="text" name="domicilio" minLength="10" id="domicilio" required value="{{$empleado->user->domicilio}}">
                    <div class="invalid-feedback">El domicilio es obligatorio (min. 10 carácteres)</div>
                    @if($errors->has('domicilio'))
                        <div class='text-danger mens'>
                        {{$errors->first('domicilio')}}
                        </div>
                    @endif
                </div>
                <div class= "col-sm-3">
                    <label class= "form-label fw-bolder" for="DNI"><span class="text-danger">*</span>DNI/NIE:</label>
                    <input class="form-control" type="text" name="DNI" id="DNI" required value="{{$empleado->user->dni}}">
                    <div class="invalid-feedback">El DNI/NIE es obligatorio.</div>
                    @if($errors->has('DNI'))
                        <div class='text-danger mens'>
                        {{$errors->first('DNI')}}
                        </div>
                    @endif
                </div>

                <div class= "col-sm-3">
                    <label class= "form-label fw-bolder" for="fecha_nacimiento">Fecha nacimiento:</label>
                    <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$empleado->user->fecha_nac}}">
                    <div class="invalid-feedback">La fecha de nacimiento debe ser anterior a hoy.</div>
                    @if($errors->has('fecha_nacimiento'))
                    <div class='text-danger mens'>
                    {{$errors->first('fecha_nacimiento')}}
                    </div>
                @endif
                </div>
                <div class= "col-sm-6">
                    <label class= "form-label fw-bolder" for="idiomas">Idiomas:</label>
                    <input class="form-control" type="text" name="idiomas" id="idiomas" value="{{$empleado->idiomas}}">

                </div>

                <div class= "col-sm-5" >
                    <label class= "form-label fw-bolder" for="email"><span class="text-danger">*</span>Email:</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="usuario@ejemplo.com" required value="{{$empleado->user->email}}">
                    <div class="invalid-feedback">El e-mail es obligatorio.</div>
                    @if($errors->has('email'))
                        <div class='text-danger mens'>
                        {{$errors->first('email')}}
                        </div>
                    @endif
                </div>
                <div class= "col-sm-3">
                    <label class= "form-label fw-bolder" for="tel"><span class="text-danger">*</span>Teléfono:</label>
                    <input class="form-control" type="tel" name="tel" pattern='[0-9]{9,}' placeholder='000000000' id="tel" value="{{$empleado->user->tel}}" required>
                    <div class="invalid-feedback">El teléfono es obligatorio. ( min 9 cifras)</div>
                    @if($errors->has('tel'))
                        <div class='text-danger mens'>
                        {{$errors->first('tel')}}
                        </div>
                    @endif
                </div>

                <div class= "col-sm-4">
                    <label class= "form-label fw-bolder me-2" for="puesto"><span class="text-danger">*</span>Puesto:</label>

                    <select name="puesto" required id="puesto">

                        <option value="Administrativo" {{ $empleado->puesto == "Administrativo" ? 'selected' : ''}}>Administrativo</option>
                        <option value="Cuidador" {{ $empleado->puesto == "Cuidador" ? 'selected' : ''}}>Cuidador</option>
                        <option value="Limpiador"  {{ $empleado->puesto == "Limpiador" ? 'selected' : ''}}>Limpiador</option>
                    </select>
                    <div class="invalid-feedback">Selecciona una opción</div>
                    @if($errors->has('puesto'))
                        <div class='text-danger mens'>
                        {{$errors->first('puesto')}}
                        </div>
                    @endif

                </div>

                <div class= "col-lg-6">
                    <label class= "form-label fw-bolder" for="foto">Cambiar foto:</label>
                    <input class="form-control mb-2" type="file" name="foto" id="foto" value="{{old('foto')}}">
                    @if("{{$empleado->user->foto}}" != null && "{{$empleado->user->foto}}" != "")
                        <img src="{{ asset($empleado->user->foto)}}" width='150' alt="">
                    @endif
                </div>
                <div class= "col-lg-6">
                    <label class= "form-label fw-bolder" for="datos">Otros datos:</label>
                    <textarea class= "form-control" name="datos" rows="3" cols="50">
                        {{$empleado->user->datos}}
                    </textarea>
                    <div class= "">
                        <label class= "form-label fw-bolder" for= "fecha_alta">Fecha de alta:</label>

                        <input class="form-control" type="date" name=fecha_alta id= "fecha_alta" value="{{Carbon\Carbon::parse($empleado->user->created_at)->format('Y-m-d')}}" disabled>
                    </div>
                    <div class= "">
                        <label class= "form-label fw-bolder" for="fecha_nac">Fecha de baja:</label>
                        <input class="form-control" type="date" name="fecha_baja" id="fecha_baja"
                        @if($empleado->user->fecha_baja != null && $empleado->user->fecha_baja != "")
                            value="{{Carbon\Carbon::parse($empleado->user->fecha_baja)->format('Y-m-d')}}"
                        @else value="";
                        @endif>

                        <div class="invalid-feedback">Fecha de baja no puede sera anterior a la fecha de alta.</div>
                        @if($errors->has('fecha_baja'))
                        <div class='text-danger mens'>
                        {{$errors->first('fecha_baja')}}
                        </div>
                    @endif
                    </div>
                </div>


            </div>
            <button type="submit" name="enter" id="enter" class="btn btn-success text-warning mt-3 mb-3 float-end"><i class="bi bi-save"></i> Guardar cambios</button>
            <a href= "{{route('empleados.show', $empleado->id)}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Salir sin guardar</a>

        </form>
    @else
        <h1 class="text-danger text-center">Usuario no accesible</h1>
    @endif
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('js/valid.js') }}" defer></script>
@endsection
