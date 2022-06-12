@extends('template')
@section('title','Editar')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('clientes.update', $cliente->id)}}" method="POST" enctype="multipart/form-data" novalidate >
    @csrf
    @method('PUT')
    <h1 class="bg-success bg-opacity-25 text-success text-center">Editar cliente </h1>
    <div class= "row g-3 p-3">
        <input type= "hidden" name ="user_id" id="user_id" value = {{$cliente->user->id}}>
        <div class= "col-sm-4">
            <label class= "form-label fw-bolder" for="nombre">Nombre:</label>
            <input class="form-control " type="text" minlength='2' name="nombre" id="nombre" autofocus value="{{$cliente->user->nombre}}" required>

            <div class="invalid-feedback">El nombre es obligatorio (min. 2 carácteres)</div>
            @if($errors->has('nombre'))
                <div class='text-danger '>
                {{$errors->first('nombre')}}
                </div>
            @endif
        </div>
        <div class= "col-sm-8">
            <label class= "form-label fw-bolder" for="apellido"><span class="text-danger">*</span>Apellidos:</label>
            <input class="form-control" type="text" minlength='3' name="apellido" id="apellido" required value="{{$cliente->user->apellido}}">
            <div class="invalid-feedback">El apellido es obligatorio</div>
            @if($errors->has('apellido'))
                <div class='text-danger '>
                {{$errors->first('apellido')}}
                </div>
            @endif
        </div>
        <div class= "col-12">
            <label class= "form-label fw-bolder" for="domicilio"><span class="text-danger">*</span>Domicilio:</label>
            <input class="form-control" type="text" name="domicilio" minlength="10" id="domicilio" required value="{{$cliente->user->domicilio}}">
            <div class="invalid-feedback">El domicilio es obligatorio (min. 10 carácteres)</div>
            @if($errors->has('domicilio'))
                <div class='text-danger'>
                {{$errors->first('domicilio')}}
                </div>
            @endif
        </div>
        <div class= "col-sm-6 col-md-3">
            <label class= "form-label fw-bolder" for="DNI"><span class="text-danger">*</span>DNI/NIE:</label>
            <input class="form-control" type="text" name="DNI" id="DNI" minlength='8' required value="{{$cliente->user->dni}}">
            <div class="invalid-feedback">El DNI/NIE es obligatorio (min. 8 carácteres).</div>
            @if($errors->has('DNI'))
                <div class='text-danger '>
                {{$errors->first('DNI')}}
                </div>
            @endif
        </div>

        <div class= "col-sm-6 col-md-3">
            <label class= "form-label fw-bolder" for="fecha_nacimiento">Fecha nacimiento:</label>
            <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$cliente->user->fecha_nac}}">
            <div class="invalid-feedback">La fecha de nacimiento debe ser anterior a hoy.</div>
            @if($errors->has('fecha_nacimiento'))
            <div class='text-danger '>
            {{$errors->first('fecha_nacimiento')}}
            </div>
        @endif
        </div>
        <div class= "col-sm-6 col-md-3">
            <label class= "form-label fw-bolder" for="nacionalidad">Nacionalidad:</label>
            <input class="form-control" type="text" name="nacionalidad" id="nacionalidad" value="{{$cliente->nacionalidad}}">

        </div>
        <div class= "col-sm-6 col-md-3">
            <label class= "form-label fw-bolder" for="sip">SIP:</label>
            <input class="form-control" type="text" name="SIP" id="SIP" pattern='[0-9]{6,}'  value="{{Crypt::decryptString($cliente->sip)}}">
            <div class="invalid-feedback">El sip debe tener un valor numérico con un mínimo de 6 cifras </div>
            @if($errors->has('SIP'))
                <div class='text-danger '>
                {{$errors->first('SIP')}}
                </div>
            @endif
        </div>
        <div class= "col-sm-4 ">
            <label class= "form-label fw-bolder" for="idioma">Idiomas:</label>
            <input class="form-control" type="text" name="idioma" id="idioma" value="{{$cliente->idioma}}">

        </div>
        <div class= "col-sm-3">
            <label class= "form-label fw-bolder" for="tel"><span class="text-danger">*</span>Teléfono:</label>
            <input class="form-control" type="tel" name="tel" pattern='[0-9]{9,}' placeholder='000000000' id="tel" value="{{$cliente->user->tel}}" required>
            <div class="invalid-feedback">El teléfono es obligatorio. ( min 9 cifras)</div>
            @if($errors->has('tel'))
                <div class='text-danger '>
                {{$errors->first('tel')}}
                </div>
            @endif
        </div>
        <div class= "col-sm-5" >
            <label class= "form-label fw-bolder" for="email"><span class="text-danger">*</span>Email:</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="usuario@ejemplo.com" required value="{{$cliente->user->email}}">
            <div class="invalid-feedback">El e-mail es obligatorio.</div>
            @if($errors->has('email'))
                <div class='text-danger '>
                {{$errors->first('email')}}
                </div>
            @endif
        </div>

        <div class= "col-lg-6">
            <label class= "form-label fw-bolder" for="foto">Cambiar foto:</label>
            <input class="form-control mb-2" type="file" name="foto" id="foto" value="">
            @if("{{$cliente->user->foto}}" != null && "{{$cliente->user->foto}}" != "")
                <img src="{{ asset($cliente->user->foto)}}" width='150' alt="">
            @endif
        </div>
        <div class= "col-lg-6">
            <label class= "form-label fw-bolder" for="enfermedades">Datos de salud:</label>
            <textarea class= "form-control" name="enfermedades" rows="3" cols="50">{{Crypt::decryptString($cliente->enfermedades)}}</textarea>
        </div>
        <div class= "col-lg-6">
            <label class= "form-label fw-bolder" for="family">Datos de familiares:</label>
            <textarea class= "form-control" name="family" rows="3" cols="50">{{$cliente->familiares}}</textarea>
        </div>

        <div class= "col-lg-6">
            <label class= "form-label fw-bolder" for="datos">Otros datos:</label>
            <textarea class= "form-control" name="datos" rows="3" cols="50">{{$cliente->user->datos}}</textarea>
        </div>
        <div class= "col-12 d-md-flex border border-1 border-success bg-secondary bg-opacity-25  rounded p-2 text-center">
            <div class= "col-md-6" id='divcoor'>
                <h5> Editar domicilio en el mapa</h5>
                <button class= "btn btn-outline-success m-3"name= "coor" id= "coor">Obtener coordenadas del domicilio</button>
                <input class="form-control" type="hidden" name="coordenadax" id="coordenadax" value="{{$cliente->coordenadax}}">
                <input class="form-control" type="hidden" name="coordenaday" id="coordenaday" value="{{$cliente->coordenaday}}">
            </div>
            <div class= "col-md-6">
                <p> Con el botón se obtienen las coordenadas de la posición actual,
                    por lo tanto debe ser usado desde el domicilio del cliente.

                </p>
            </div>

        </div>
            <div class= "col-sm-6">
                <label class= "form-label fw-bolder" for= "fecha_alta">Fecha de alta:</label>
                <input class="form-control" type="hidden" name=fecha_alta id= "fecha_alta" value="{{Carbon\Carbon::parse($cliente->user->created_at)->format('Y-m-d')}}" >
                <input class="form-control" type="date" name=fecha_alta id= "fecha_alta" value="{{Carbon\Carbon::parse($cliente->user->created_at)->format('Y-m-d')}}" disabled>
            </div>
            <div class= "col-sm-6">
                <label class= "form-label fw-bolder" for="fecha_nac">Fecha de baja:</label>
                <input class="form-control" type="date" name="fecha_baja" id="fecha_baja"
                @if($cliente->user->fecha_baja != null && $cliente->user->fecha_baja != "")
                    value="{{Carbon\Carbon::parse($cliente->user->fecha_baja)->format('Y-m-d')}}"
                @else value="";
                @endif>
                <div class="invalid-feedback">Fecha de baja no puede sera anterior a la fecha de alta.</div>
                @if($errors->has('fecha_baja'))
                <div class='text-danger '>
                {{$errors->first('fecha_baja')}}
                </div>
            @endif
            </div>



    </div>
    <button type="submit" class="btn btn-success text-warning mt-3 mb-3 float-end" name="enter" id="enter" ><i class="bi bi-save"></i> Guardar cambios</button>
    <a href= "{{route('clientes.show', $cliente->id)}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Salir sin guardar</a>

</form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/valClienteEdit.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/coordenadas.js') }}" defer></script>
@endsection
