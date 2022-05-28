@extends('template')
@section('title','Tratamientos')
@section("css")
<link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center">Tratamientos </h1>

<div class="table-responsive">

    @isset($tratamientos)
    <table class = "table table-sm table-striped" id="tabla">
        <thead>
        <tr>
            <th class="text-center">Detalles</th>
            <th class="text-center cliente"> Cliente</th>
            <th class="text-center medicamento"> Medicamento</th>
            <th class="text-center fecha_principio">Fecha principio</th>
            <th class="text-center fecha_fin">Fecha final</th>
            <th class="text-center cantidad"> Cantidad</th>
            <th class="text-center hora"> Hora de la toma</th>
            {{-- <th class="text-center descrip"> Descripción</th> --}}
        </tr>
        </thead>
        <tbody>
            @forelse($tratamientos as $trat)
                <tr class="text-center" id="{{$trat->id}}">

                    <td><a class= "nav-link p-0 m-0 text-center" href="{{route('tratamientos.show', $trat->id)}}"><i class="bi bi-eye"></i> Ver</a> </td>
                    <td class="cliente">{{$trat->cliente->user->nombre}}, {{$trat->cliente->user->apellido}} </td>
                    <td class="empleado">{{Crypt::decryptString($trat->medicamento->nombre)}} ({{$trat->medicamento->cantidad}}) </td>
                    <td class="fecha_principio">{{Carbon\Carbon::parse($trat->fecha_principio)->format('d/m/Y')}} </td>
                    <td class="fecha_fin"> @isset(($trat->fecha_fin)){{Carbon\Carbon::parse($trat->fecha_fin)->format('d/m/Y')}} @endisset</td>
                    <td class="cantidad">{{$trat->cantidad}} </td>
                    <td class="hora">{{Carbon\Carbon::parse($trat->hora)->format('H:i')}} </td>
                    {{-- <td class="descrip">@isset(($trat->servicio->descripcion)){{Crypt::decryptString($trat->servicio->descripcion)}} @endisset</td> --}}
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

