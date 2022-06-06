@extends('template')
@section('title','Incidencias')
@section("css")
<link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center">Incidencias</h1>

<div class=" table-responsive  ">
    <div class="">
    @isset($incidencias)
    <table class = " mt-3 table table-sm table-striped" id="tabla">
        <thead>
        <tr>
            <th class="text-center">Detalles</th>
            <th class="text-center fecha">Fecha</th>
            <th class="text-center empleado">Autor</th>
            <th class="text-center cliente">Cliente</th>
            <th class="text-center tipo ">Tipo de&nbsp;incidencia</th>
            <th class="text-center comentario">Título</th>
            <th class="text-center estado">Estado</th>
        </tr>
        </thead>
        <tbody>
            @forelse($incidencias as $cl)

                    <tr class="text-center" id="{{$cl->id}}">
                        <td><a class= "nav-link p-0 m-0 text-center" href="{{route('incidencias.show', $cl->id)}}"><i class="bi bi-eye"></i> Ver</a></td>
                        <td class="fecha ">{{Carbon\Carbon::parse($cl->fecha)->format('d/m/Y')}}</td>
                        <td class="empleado">{{$cl->empleado->user->nombre}}, {{$cl->empleado->user->apellido}}</td>
                        <td class="cliente">{{$cl->cliente->user->nombre}}, {{$cl->cliente->user->apellido}}</td>
                        <td class="tipo ">{{$cl->tipo}}</td>
                        <td class="titulo ">{{Crypt::decryptString($cl->titulo)}}</td>
                        <td class="estado">{{$cl->estado}}</td>
                    </tr>

            @empty <li>No elements to be shown</li>
            @endforelse
        </tbody>
    </table>

    @endisset
    </div>
</div>
@endsection
@section('js')

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tabla.js') }}"></script>


@endsection

