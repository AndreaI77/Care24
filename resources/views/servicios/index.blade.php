@extends('template')
@section('title','Servicios')
@section("css")
    <link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center">Servicios</h1>

<div class="table-responsive">

    @isset($servicios)
    <table class = "table table-sm table-striped" id="tabla">
        <thead>
        <tr>
            <th class="text-center">Detalles</th>
            <th class="text-center fecha">Fecha</th>
            <th class="text-center cliente"> Cliente</th>
            <th class="text-center empleado"> Empleado</th>
            <th class="text-center h-i"> Hora inicio</th>
            <th class="text-center h-f"> Hora final</th>
            <th class="text-center tipo"> Tipo de&nbsp;servicio</th>
            <th class="text-center estado"> Estado</th>
            {{-- <th class="text-center descrip"> Descripción</th>
            <th class="text-center comentario">Comentario cliente</th> --}}
            <th class="text-center valoracion"> Valoración</th>

        </tr>
        </thead>
        <tbody>
            @forelse($servicios as $cl)
                @if($cl->tipo != "Cita médica")
                    <tr class="text-center" id="{{$cl->id}}">
                        <td><a class= "nav-link p-0 m-0 text-center" href="{{route('servicios.show', $cl->id)}}"><i class="bi bi-eye"></i> Ver</a> </td>
                        <td class="fecha">{{Carbon\Carbon::parse($cl->fecha)->format('d/m/Y')}} </td>
                        <td class="cliente">{{$cl->cliente->user->nombre}}, {{$cl->cliente->user->apellido}} </td>
                        <td class="empleado">{{$cl->empleado->user->nombre}}, {{$cl->empleado->user->apellido}} </td>
                        <td class="h-i">{{Carbon\Carbon::parse($cl->hora_inicio)->format('H:i')}} </td>
                        <td class="h-f">{{Carbon\Carbon::parse($cl->hora_final)->format('H:i')}} </td>
                        <td class="tipo">{{$cl->tipo}} </td>
                        <td class="estado">{{$cl->estado}} </td>
                        {{-- <td class="descrip">@isset(($cl->descripcion)){{Crypt::decryptString($cl->descripcion)}} @endisset</td>
                        <td class="comentario">{{Crypt::decryptString($cl->comentario)}} </td> --}}
                        <td class="valoracion">{{$cl->valoracion}} </td>
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
    <script type="text/javascript" src="{{ asset('js/tabla.js') }}"></script>


@endsection


