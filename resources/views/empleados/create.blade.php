@extends('template')
@section('title','Nuevo empleado')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('empleados.store')}}" method="POST" enctype="multipart/form-data" novalidate >
    @csrf
    <h1 class="bg-success bg-opacity-25 text-success text-center">Nuevo empleado</h1>
    <div class= "row g-3 p-3">

    <div class= "col-sm-4">
        <label class= "form-label fw-bolder" for="nombre"><span class="text-danger">*</span>Nombre:</label>
        <input class="form-control " type="text" minlength='2' name="nombre" id="nombre" autofocus value="{{old('nombre')}}" required>

        <div class="invalid-feedback">El nombre es obligatorio (min. 2 carácteres)</div>
        @if($errors->has('nombre'))
            <div class='text-danger mens'>
               {{$errors->first('nombre')}}
            </div>
        @endif
    </div>
    <div class= "col-sm-8">
        <label class= "form-label fw-bolder" for="apellido"><span class="text-danger">*</span>Apellidos:</label>
        <input class="form-control" type="text" minlength='3' name="apellido" id="apellido" required value="{{old('apellido')}}">
        <div class="invalid-feedback">El apellido es obligatorio</div>
        @if($errors->has('apellido'))
            <div class='text-danger mens'>
            {{$errors->first('apellido')}}
            </div>
        @endif
    </div>
    <div class= "col-12">
        <label class= "form-label fw-bolder" for="domicilio"><span class="text-danger">*</span>Domicilio:</label>
        <input class="form-control" type="text" name="domicilio" minlength="10" id="domicilio" required value="{{old('domicilio')}}">
        <div class="invalid-feedback">El domicilio es obligatorio (min. 10 carácteres)</div>
        @if($errors->has('domicilio'))
            <div class='text-danger mens'>
            {{$errors->first('domicilio')}}
            </div>
        @endif
    </div>
    <div class= "col-sm-3">
        <label class= "form-label fw-bolder" for="DNI"><span class="text-danger">*</span>DNI/NIE:</label>
        <input class="form-control" type="text" name="DNI" id="DNI" minlength='8' required value="{{old('DNI')}}">
        <div class="invalid-feedback">El DNI/NIE es obligatorio (min. 8 carácteres)</div>
        @if($errors->has('DNI'))
            <div class='text-danger mens'>
            {{$errors->first('DNI')}}
            </div>
        @endif
    </div>

    <div class= "col-sm-3">
        <label class= "form-label fw-bolder" for="fecha_nacimiento">Fecha nacimiento:</label>
        <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{old('fecha_nac')}}">
        @if($errors->has('fecha_nacimiento'))
            <div class='text-danger mens'>
            {{$errors->first('fecha_nacimiento')}}
            </div>
        @endif
    </div>
    <div class= "col-sm-6">
        <label class= "form-label fw-bolder" for="idiomas">Idiomas:</label>
        <input class="form-control" type="text" name="idiomas" id="idiomas" value="{{old('idiomas')}}">

    </div>

    <div class= "col-sm-5" >
        <label class= "form-label fw-bolder" for="email"><span class="text-danger">*</span>Email:</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="usuario@ejemplo.com" required value="{{old('email')}}">
        <div class="invalid-feedback">El e-mail es obligatorio</div>
        @if($errors->has('email'))
            <div class='text-danger mens'>
            {{$errors->first('email')}}
            </div>
        @endif
    </div>
    <div class= "col-sm-3">
        <label class= "form-label fw-bolder" for="tel"><span class="text-danger">*</span>Teléfono:</label>
        <input class="form-control" type="tel" name="tel" pattern='[0-9]{9}' placeholder='000000000' id="tel" value="{{old('tel')}}" required>
        <div class="invalid-feedback">El teléfono es obligatorio</div>
        @if($errors->has('tel'))
            <div class='text-danger mens'>
            {{$errors->first('tel')}}
            </div>
        @endif
    </div>
    <div class= "col-sm-4 col-lg-3">
        <label class= "form-label fw-bolder me-2" for="puesto"><span class="text-danger">*</span>Puesto:</label>

        <select class="form-control" name="puesto" required id="puesto">
            <option value="" selected hidden disabled>Elige una opción</option>
            <option value="Administrativo" @if(old('puesto')=== "Administrativo") selected @endif>Administrativo</option>
            <option value="Cuidador" @if(old('puesto')=== "Cuidador") selected @endif>Cuidador</option>
            <option value="Limpiador" @if(old('puesto')=== "Limpiador") selected @endif>Limpiador</option>
        </select>
        <div class="invalid-feedback">Selecciona una opción</div>
        @if($errors->has('puesto'))
            <div class='text-danger mens'>
            {{$errors->first('puesto')}}
            </div>
        @endif

    </div>

    <div class= "col-lg-6">
        <label class= "form-label fw-bolder" for="foto">Foto:</label>
        <input class="form-control" type="file" name="foto" id="foto" value="{{old('foto')}}">

    </div>
    <div class= "col-lg-6">
        <label class= "form-label fw-bolder" for="datos">Otros datos:</label>
        <textarea class= "form-control" name="datos" rows="3" cols="50">{{old('datos')}}</textarea>

    </div>
    </div>
    <button type="submit" name="enter" id="enter" class="btn btn-success text-warning mt-3 mb-3 float-end"><i class="bi bi-save"></i> Guardar</button>
    <a href= "{{route('empleados.index')}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Salir sin guardar</a>
</form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/valEmpleados.js') }}" defer></script>

@endsection
