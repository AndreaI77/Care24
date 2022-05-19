@extends('template')
@section('title','empleados')
@section("css")
<link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
{{-- <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"> --}}
@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center">Empleados</h1>

<div class="table-responsive">

    @isset($empleados)
    <table class = "table table-sm table-striped" id="tabla">
        <thead>
        <tr class= "text-center">
            <th>Detalles</th>
            <th> Nombre</th>
            <th> Apellidos</th>
            <th> Domicilio</th>
            <th> DNI</th>
            <th> E-mail</th>
            <th> Telefono</th>
            <th> Fecha nacimiento</th>
            <th>Puesto</th>
            <th>Idiomas</th>
            <th> Fecha de&nbsp;alta</th>
            <th> Fecha de&nbsp;baja</th>


        </tr>
        </thead>
        <tbody>
            @forelse($empleados as $empleado)
                <tr id="{{$empleado->id}}">
                    <td><a class= "nav-link p-0 m-0 text-center" href="{{route('empleados.show', $empleado->id)}}"><i class="bi bi-eye"></i> Ver</a> </td>
                    <td>{{$empleado->user->nombre}} </td>
                    <td>{{$empleado->user->apellido}} </td>
                    <td>{{$empleado->user->domicilio}} </td>
                    <td>{{$empleado->user->dni}} </td>
                    <td>{{$empleado->user->email}} </td>
                    <td>{{$empleado->user->tel}} </td>
                    <td class= "text-center">{{ Carbon\Carbon::parse($empleado->user->fecha_nac)->format('d/m/Y')}} </td>
                    <td>{{$empleado->puesto}} </td>
                    <td>{{$empleado->idiomas}} </td>
                    <td class= "text-center">{{ Carbon\Carbon::parse($empleado->user->created_at)->format('d/m/Y')}} </td>
                    <td class= "text-center"> @isset(($empleado->user->fecha_baja))
                        {{Carbon\Carbon::parse($empleado->user->fecha_baja)->format('d/m/Y')}}

                        @endisset
                    </td>


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
    <script type="text/javascript" src="{{ asset('js/tabla.js') }}"></script>


@endsection
