@extends('template')
@section('title','Citas')
@section("css")
<link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center">Citas</h1>

<div class="table-responsive">

    @isset($citas)
    <table class = "table table-sm table-striped" id="tabla">
        <thead>
        <tr>
            <th class="text-center">Detalles</th>
            <th class="text-center fecha">Fecha</th>
            <th class="text-center cliente"> Cliente</th>
            <th class="text-center empleado"> Acompañante</th>
            <th class="text-center lugar"> Lugar</th>
            <th class="text-center especialidad"> Especialidad</th>
            <th class="text-center h-i"> Hora recogida</th>
            <th class="text-center h-f"> Hora final</th>
            <th class="text-center tipo"> Hora de&nbsp;cita</th>
            <th class="text-center estado"> Estado</th>
            <th class="text-center descrip"> Descripción</th>
            <th class="text-center comentario">Comentario cliente</th>
            <th class="text-center valoracion"> Valoración</th>

        </tr>
        </thead>
        <tbody>
            @forelse($citas as $cl)
                <tr class="text-center" id="{{$cl->id}}">
                    <td><a class= "nav-link p-0 m-0 text-center" href="{{route('citas.show', $cl->id)}}"><i class="bi bi-eye"></i> Ver</a> </td>
                    <td class="fecha">{{Carbon\Carbon::parse($cl->servicio->fecha)->format('d/m/Y')}} </td>
                    <td class="cliente">{{$cl->servicio->cliente->user->nombre}}, {{$cl->servicio->cliente->user->apellido}} </td>
                    <td class="empleado">{{$cl->servicio->empleado->user->nombre}}, {{$cl->servicio->empleado->user->apellido}} </td>
                    <td class="lugar">{{$cl->lugar}} </td>
                    <td class="especialidad">{{Crypt::decryptString($cl->especialidad->nombre)}} </td>
                    <td class="h-i">{{Carbon\Carbon::parse($cl->servicio->hora_inicio)->format('H:i')}} </td>
                    <td class="h-f">{{Carbon\Carbon::parse($cl->servicio->hora_final)->format('H:i')}} </td>
                    <td class="h-c">{{Carbon\Carbon::parse($cl->hora_cita)->format('H:i')}} </td>
                    <td class="estado">{{$cl->servicio->estado}} </td>
                    <td class="descrip">@isset(($cl->servicio->descripcion)){{Crypt::decryptString($cl->servicio->descripcion)}} @endisset</td>
                    <td class="comentario">{{Crypt::decryptString($cl->servicio->comentario)}} </td>
                    <td class="valoracion">{{$cl->servicio->valoracion}} </td>
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



