@extends('template')
@section('title','Clientes')
@section("css")
<link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >

@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center">Clientes</h1>
<div class="d-flex m-2">
    <div class="form-check me-3 ">
        <label class="form-check-label" for="todos">Todos los clientes</label>
        <input class="form-check-input" type="radio" name='radio' id="todos" >
    </div>
    <div class="form-check me-3">
        <label class="form-check-label" for="baja">Clientes de baja</label>
        <input class="form-check-input" type="radio" name='radio' id="baja" >
    </div>
    <div class="form-check me-3">
        <label class="form-check-label" for="alta">Clientes de alta</label>
        <input class="form-check-input" type="radio" name='radio' id="alta" >
    </div>
</div>
<div class= "mb-4 d-flex flex-column bg-light">
    <h4 class="text-success ps-2 pt-1">Ocultar campos:</h4>
        <div class="row row-cols-2 row-cols-md-4 ps-4" id="filtros">
            <div class="d-xxl-flex">
                <div class="form-check me-3 ">
                    <label class="form-check-label" for="nombre">Nombre</label>
                    <input class="form-check-input" type="checkbox" id="nombre" >
                </div>
                <div class="form-check me-3">
                    <label class="form-check-label" for="apellidos">Apellidos</label>
                    <input class="form-check-input" type="checkbox"  id="apellido" >
                </div>
                <div class="form-check me-3">
                    <label class="form-check-label" for="domicilio">Domicilio</label>
                    <input class="form-check-input" type="checkbox"  id="domicilio" >
                </div>
            </div>
            @if(auth()->user()->tipo !== 'Limpiador')
                <div class="d-xxl-flex ">
                    <div class="form-check me-3">
                        <label class="form-check-label" for="dni">DNI</label>
                        <input class="form-check-input" type="checkbox"  id="dni" >
                    </div>
                    <div class="form-check me-3">
                        <label class="form-check-label" for="fnac">Fecha nacimiento</label>
                        <input class="form-check-input" type="checkbox"  id="fnac" >
                    </div>
                    <div class="form-check me-3">
                        <label class="form-check-label" for="sip">SIP</label>
                        <input class="form-check-input" type="checkbox" id="sip" >
                    </div>
                </div>
            @endif
            <div class="d-xxl-flex  ">
                <div class="form-check me-3">
                    <label class="form-check-label" for="nacionalidad">Nacionalidad</label>
                    <input class="form-check-input" type="checkbox"  id="nacionalidad" >
                </div>
                <div class="form-check me-3">
                    <label class="form-check-label" for="idioma">Idioma</label>
                    <input class="form-check-input" type="checkbox" id="idioma" >
                </div>
                <div class="form-check me-3">
                    <label class="form-check-label" for="tel">Teléfono</label>
                    <input class="form-check-input" type="checkbox" id="tel" >
                </div>
            </div>
            <div class="d-xxl-flex ">
                <div class="form-check me-3">
                    <label class="form-check-label" for="email">E-mail</label>
                    <input class="form-check-input" type="checkbox" id="email" >
                </div>
                <div class="form-check me-3">
                    <label class="form-check-label" for="alta">Fecha alta</label>
                    <input class="form-check-input" type="checkbox" id="f_alta" >
                </div>
                <div class="form-check me-3">
                    <label class="form-check-label" for="baja">Fecha baja</label>
                    <input class="form-check-input" type="checkbox" id="f_baja" >
                </div>
            </div>

    </div>
    <button type = "reset" class="btn btn-danger btn-sm justify-self-end align-self-end   m-2" id="borrar">Limpiar filtros</button>


</div>
<div class="table-responsive mb-4">

    @isset($clientes)
    <table class = "table table-sm table-striped" id="tabla">
        <thead>
        <tr class="text-center">
            <th>Detalles</th>
            <th class= "nombre"> Nombre</th>
            <th class= "apellido"> Apellidos</th>
            <th class= "domicilio"> Domicilio</th>
            @if(auth()->user()->tipo !== 'Limpiador')
                <th class= "dni"> DNI</th>
                <th class= "f_nac"> Fecha nacimiento</th>

                <th class= "sip"> SIP</th>
            @endif
            <th class= "nac"> Nacionalidad</th>
            <th class= "idioma">Idioma</th>
            <th class= "tel"> Telefono</th>
            <th class= "email"> E-mail</th>
            <th class= "f-a"> Fecha de&nbsp;alta</th>
            <th class= "text-center f-b"> Fecha de&nbsp;baja</th>
        </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cl)
                <tr class="text-center" id="{{$cl->id}}">
                    <td><a class= "nav-link p-0 m-0 " href="{{route('clientes.show', $cl->id)}}"><i class="bi bi-eye"></i> Ver</a></td>
                    <td class= "nombre">{{$cl->user->nombre}}</td>
                    <td class= "apellido">{{$cl->user->apellido}}</td>
                    <td class= "domicilio">{{$cl->user->domicilio}}</td>
                    @if(auth()->user()->tipo !== 'Limpiador')
                        <td class= "dni">{{$cl->user->dni}}</td>
                        <td class= "text-center f_nac">{{ Carbon\Carbon::parse($cl->user->fecha_nac)->format('d/m/Y')}}</td>

                        <td class= "sip">@isset(($cl->sip)){{Crypt::decryptString($cl->sip)}}@endisset</td>
                    @endif
                    <td class= "nac">{{$cl->nacionalidad}}</td>
                    <td class= "idioma">{{$cl->idioma}}</td>
                    <td class= "tel">{{$cl->user->tel}}</td>
                    <td class= "email">{{$cl->user->email}}</td>
                    <td class= "text-center f-a">{{ Carbon\Carbon::parse($cl->user->created_at)->format('d/m/Y')}}</td>
                    <td class= "text-center f-b f_b">@isset(($cl->user->fecha_baja)){{Carbon\Carbon::parse($cl->user->fecha_baja)->format('d/m/Y')}}@endisset</td>
                </tr>
            @empty <li>No elements to be shown</li>
            @endforelse
        </tbody>
    </table>

    @endisset

</div>
@endsection
@section('js')

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/clientes.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/tabla.js') }}"></script>

@endsection


