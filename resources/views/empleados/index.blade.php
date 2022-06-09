@extends('template')
@section('title','empleados')
@section("css")
<link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
{{-- <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"> --}}
@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center">Empleados</h1>
<div class="d-flex m-2">
    <div class="form-check me-3 ">
        <label class="form-check-label" for="todos">Todos los empleados</label>
        <input class="form-check-input" type="radio" name='radio' id="todos" >
    </div>
    <div class="form-check me-3">
        <label class="form-check-label" for="baja">Empleados de baja</label>
        <input class="form-check-input" type="radio" name='radio' id="baja" >
    </div>
    <div class="form-check me-3">
        <label class="form-check-label" for="alta">Empleados de alta</label>
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
                <div class="form-check ">
                    <label class="form-check-label" for="domicilio">Domicilio</label>
                    <input class="form-check-input" type="checkbox"  id="domicilio" >
                </div>
            </div>

                <div class="d-xxl-flex ">
                    <div class="form-check me-3">
                        <label class="form-check-label" for="dni">DNI</label>
                        <input class="form-check-input" type="checkbox"  id="dni" >
                    </div>
                    <div class="form-check me-3">
                        <label class="form-check-label" for="fnac">Fecha nacimiento</label>
                        <input class="form-check-input" type="checkbox"  id="fnac" >
                    </div>
                    <div class="form-check ">
                        <label class="form-check-label" for="email">E-mail</label>
                        <input class="form-check-input" type="checkbox" id="email" >
                    </div>

                </div>

            <div class="d-xxl-flex  ">
                <div class="form-check me-3 ">
                    <label class="form-check-label" for="tel">Teléfono</label>
                    <input class="form-check-input" type="checkbox" id="tel" >
                </div>
                <div class="form-check me-3">
                    <label class="form-check-label" for="puesto">Puesto</label>
                    <input class="form-check-input" type="checkbox"  id="puesto" >
                </div>
                <div class="form-check ">
                    <label class="form-check-label" for="idioma">Idiomas</label>
                    <input class="form-check-input" type="checkbox" id="idioma" >
                </div>

            </div>
            <div class="d-xxl-flex ">

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

    @isset($empleados)
    <table class = "table table-sm table-striped " id="tabla">
        <thead>
        <tr class= "text-center">
            <th>Detalles</th>
            <th class="nombre">Nombre</th>
            <th class="apellido">Apellidos</th>
            <th class="domicilio">Domicilio</th>
            <th class="dni">DNI</th>
            <th class="f_nac">Fecha nacimiento</th>
            <th class="email">E-mail</th>
            <th class="tel">Telefono</th>
            <th class="puesto">Puesto</th>
            <th class="idioma">Idiomas</th>
            <th class="f-a">Fecha de&nbsp;alta</th>
            <th class="f-b" >Fecha de&nbsp;baja</th>
        </tr>
        </thead>
        <tbody>
            @forelse($empleados as $empleado)
                @if( $empleado->user_id != 1)
                    <tr class= "text-center" id="{{$empleado->id}}">
                        <td><a class= "nav-link p-0 m-0 text-center" href="{{route('empleados.show', $empleado->id)}}"><i class="bi bi-eye"></i> Ver</a></td>
                        <td class="nombre">{{$empleado->user->nombre}}</td>
                        <td class="apellido">{{$empleado->user->apellido}}</td>
                        <td class="domicilio">{{$empleado->user->domicilio}}</td>
                        <td class="dni">{{$empleado->user->dni}}</td>
                        <td class= "f_nac">{{ Carbon\Carbon::parse($empleado->user->fecha_nac)->format('d/m/Y')}}</td>
                        <td class="email">{{$empleado->user->email}}</td>
                        <td class="tel">{{$empleado->user->tel}}</td>
                        <td class="puesto">{{$empleado->puesto}}</td>
                        <td class="idioma">{{$empleado->idiomas}}</td>
                        <td class= "f-a">{{ Carbon\Carbon::parse($empleado->user->created_at)->format('d/m/Y')}}</td>
                        <td class= "f-b f_ba">@isset(($empleado->user->fecha_baja)){{Carbon\Carbon::parse($empleado->user->fecha_baja)->format('d/m/Y')}}@endisset</td>
                    </tr>
                @endif

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
    <script type="text/javascript" src="{{ asset('js/empleados.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/tabla.js') }}"></script>
@endsection
