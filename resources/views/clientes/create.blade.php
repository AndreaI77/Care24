@extends('template')
@section('title','Nuevo Cliente')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('clientes.store')}}" method="post" enctype="multipart/form-data" novalidate >
    @csrf
    <h1 class="bg-success bg-opacity-25 text-success text-center">Nuevo cliente</h1>
    <div class= "row g-3 p-3">

    <div class= "col-sm-4">
        <label class= "form-label fw-bolder" for="nombre"><span class="text-danger">*</span>Nombre:</label>
        <input class="form-control " type="text" minLength='2' name="nombre" id="nombre" autofocus value="{{old('nombre')}}" required>

        <div class="invalid-feedback">El nombre es obligatorio (min. 2 carácteres)</div>
        @if($errors->has('nombre'))
            <div class='text-danger mens'>
               {{$errors->first('nombre')}}
            </div>
        @endif
    </div>
    <div class= "col-sm-8">
        <label class= "form-label fw-bolder" for="apellido"><span class="text-danger">*</span>Apellidos:</label>
        <input class="form-control" type="text" name="apellido" id="apellido" required value="{{old('apellido')}}">
        <div class="invalid-feedback">El apellido es obligatorio</div>
        @if($errors->has('apellido'))
            <div class='text-danger mens'>
            {{$errors->first('apellido')}}
            </div>
        @endif
    </div>
    <div class= "col-12">
        <label class= "form-label fw-bolder" for="domicilio"><span class="text-danger">*</span>Domicilio:</label>
        <input class="form-control" type="text" name="domicilio" minLength="10" id="domicilio" required value="{{old('domicilio')}}">
        <div class="invalid-feedback">El domicilio es obligatorio (min. 10 carácteres)</div>
        @if($errors->has('domicilio'))
            <div class='text-danger mens'>
            {{$errors->first('domicilio')}}
            </div>
        @endif
    </div>
    <div class= "col-sm-6 col-md-3">
        <label class= "form-label fw-bolder" for="DNI"><span class="text-danger">*</span>DNI/NIE:</label>
        <input class="form-control" type="text" name="DNI" id="DNI" minLength='8' required value="{{old('DNI')}}">
        <div class="invalid-feedback">El DNI/NIE es obligatorio (min. 8 carácteres)</div>
        @if($errors->has('DNI'))
            <div class='text-danger mens'>
            {{$errors->first('DNI')}}
            </div>
        @endif
    </div>

    <div class= "col-sm-6 col-md-3">
        <label class= "form-label fw-bolder" for="fecha_nacimiento">Fecha nacimiento:</label>
        <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{old('fecha_nac')}}">
        @if($errors->has('fecha_nacimiento'))
            <div class='text-danger mens'>
            {{$errors->first('fecha_nacimiento')}}
            </div>
        @endif
    </div>
    <div class= "col-sm-6 col-md-3">
        <label class= "form-label fw-bolder" for="nacionalidad">Nacionalidad:</label>
        <input class="form-control" type="text" name="nacionalidad" id="nacionalidad" value="{{old('nacionalidad')}}">

    </div>
    <div class= "col-sm-6 col-md-3">
        <label class= "form-label fw-bolder" for="sip">SIP:</label>
        <input class="form-control" type="text" name="SIP" id="SIP" pattern='[0-9]{6,}'  value="{{old('SIP')}}">
        <div class="invalid-feedback">El sip debe tener un valor numérico con un mínimo de 6 cifras </div>
        @if($errors->has('tel'))
            <div class='text-danger mens'>
            {{$errors->first('tel')}}
            </div>
        @endif
    </div>
    <div class= "col-sm-4">
        <label class= "form-label fw-bolder" for="idiomas">Idioma:</label>
        <input class="form-control" type="text" name="idioma" id="idioma" value="{{old('idioma')}}">

    </div>
    <div class= "col-sm-3">
        <label class= "form-label fw-bolder" for="tel"><span class="text-danger">*</span>Teléfono :</label>
        <input class="form-control" type="tel" name="tel" pattern='[0-9]{9,}' placeholder='000000000' id="tel" value="{{old('tel')}}" required>
        <div class="invalid-feedback">El teléfono es obligatorio </div>
        @if($errors->has('tel'))
            <div class='text-danger mens'>
            {{$errors->first('tel')}}
            </div>
        @endif
    </div>
    <div class= "col-sm-5" >
        <label class= "form-label fw-bolder" for="email"><span class="text-danger">*</span>Email:</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="usuario@ejemplo.com"  value="{{old('email')}}" required>
        <div class="invalid-feedback">El e-mail es obligatorio</div>
        @if($errors->has('email'))
            <div class='text-danger mens'>
            {{$errors->first('email')}}
            </div>
        @endif
    </div>

    <div class= "col-lg-6">
        <label class= "form-label fw-bolder" for="foto">Foto:</label>
        <input class="form-control" type="file" name="foto" id="foto" value="{{old('foto')}}">

    </div>


    <div class= "col-lg-6">
        <label class= "form-label fw-bolder" for="enfermedades">Datos de salud:</label>
        <textarea class= "form-control" name="enfermedades" rows="3" cols="50">{{old('enfermedades')}}</textarea>

    </div>
    <div class= "col-lg-6">
        <label class= "form-label fw-bolder" for="family">Datos de familiares:</label>
        <textarea class= "form-control" name="family" rows="3" cols="50">{{old('family')}}</textarea>

    </div>
    <div class= "col-lg-6">
        <label class= "form-label fw-bolder" for="datos">Otros datos:</label>
        <textarea class= "form-control" name="datos" rows="3" cols="50">{{old('datos')}}</textarea>

    </div>
    <div class= "col-12 d-md-flex border border-1 border-success bg-secondary bg-opacity-25  rounded p-2 text-center">
        <div class= "col-md-6" id='divcoor'>
            <h5> Añadir domicilio al mapa</h5>
            <button class= "btn btn-outline-success m-3"name= "coor" id= "coor">Obtener coordenadas del domicilio</button>
            <input class="form-control" type="hidden" name="coordenadax" id="coordenadax" value="{{old('coordenadax')}}">
            <input class="form-control" type="hidden" name="coordenaday" id="coordenaday" value="{{old('coordenaday')}}">

        </div>
        <div class= "col-md-6">
            <p> Con el botón se obtienen las coordenadas de la posición actual,
                por lo tanto debe ser usado desde el domicilio del cliente.
                Si no está en el domicilio del cliente al crear el registro,
                se puede añadir o cambiar más tarde desde la opción "editar" en la ficha del cliente.
            </p>
        </div>

    </div>
    </div>
    </div>
    <button type="submit" class="btn btn-success text-warning mt-3 mb-3 float-end" name="enter" id="enter"><i class="bi bi-save"></i> Guardar</button>
    <a href= "{{route('clientes.index')}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Salir sin guardar</a>
</form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/servicioCrear.js') }}" ></script>
    {{-- <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" defer></script> --}}
    <script type="text/javascript" src="{{ asset('js/coordenadas.js') }}" ></script>

@endsection
