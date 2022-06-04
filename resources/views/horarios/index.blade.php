@extends('template')
@section('title','Horarios')
@section("css")
    <link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center mb-3">Agenda</h1>
<div class= "row row-cols-1  row-cols-lg-2  p-3">
    <div class= "col d-inline-flex justify-content-start   mb-3 bg-light p-3 ">
        <div class='row me-5' id ="check1">
            <label for="check">Ver todo:</label>
            <input type='checkbox' name='check' id='check' checked>
        </div>
        <div class='row ' id ="fecha1">
            <label for="fecha">Elige fecha:</label>
            <input type='date' name='fecha' id='fecha' value="">
        </div>
    </div>
    <div class= " col d-inline-flex justify-content-start  mb-3 bg-light p-3 ">
        @if (auth()->user()->tipo != 'Cuidador' && (auth()->user()->tipo != 'Limpiador') )
            <div class= 'row me-5' id ="emp1">
                <label for="emp">Empleado:</label>
                <select name="emp"  id="emp" >
                    <option value="" selected hidden disabled>Selecciona empleado</option>
                </select>
            </div>
        @endif
        @if (auth()->user()->tipo != 'cliente')
            <div class= 'row me-3' id ="clt1">
                <label for="clt">Cliente:</label>
                <select name="clt"  id="clt" >
                    <option value="" selected hidden disabled>Selecciona cliente</option>
                </select>
            </div>
        @endif
    </div>
</div>
<div class="table-responsive mb-4">

    @isset($servicios)

        <table class = "table table-sm table-striped" id='tabla'>
            <thead>
                <tr>
                    <th class="text-center">Detalles</th>
                    <th class="text-center fecha">Fecha</th>
                    <th class="text-center h-i"> Hora inicio</th>
                    <th class="text-center h-f"> Hora final</th>
                    @if (auth()->user()->tipo != 'cliente')
                        <th class="text-center cliente"> Cliente</th>
                    @endif
                    @if(auth()->user()->tipo != 'Cuidador' && (auth()->user()->tipo != 'Limpiador'))
                        <th class="text-center empleado"> Empleado</th>
                    @endif
                    <th class="text-center tipo"> Tipo de&nbsp;servicio</th>
                    <th class="text-center estado"> Estado</th>
                    <th class="text-center h_c"> Hora cita</th>
                    <th class="text-center lugar">Lugar</th>
                    <th class="text-center espec"> Especialidad</th>

                </tr>
            </thead>
            <tbody >
                    @forelse($servicios as $cl)
                        @php
                            $datos = false;
                            $ct = false;
                         @endphp
                            <tr class="text-center" id="{{$cl->id}}">
                                @forelse($citas as $cita)
                                    @if($cita->servicio_id == $cl->id)
                                        <td><a class= "nav-link p-0 m-0 text-center" href="{{route('citas.show', $cita->id)}}"><i class="bi bi-eye"></i> Ver</a> </td>
                                        @php $ct = true; @endphp
                                    @endif
                                @empty
                                @endforelse
                                @if($ct == false)
                                    <td><a class= "nav-link p-0 m-0 text-center" href="{{route('servicios.show', $cl->id)}}"><i class="bi bi-eye"></i> Ver</a> </td>
                                @endif
                                <td class="fecha">{{Carbon\Carbon::parse($cl->fecha)->format('d/m/Y')}} </td>

                                <td class="h-i">{{Carbon\Carbon::parse($cl->hora_inicio)->format('H:i')}} </td>
                                <td class="h-f">{{Carbon\Carbon::parse($cl->hora_final)->format('H:i')}} </td>
                                @if(auth()->user()->tipo != 'cliente')
                                    <td class="cliente">{{$cl->cliente->user->nombre}}, {{$cl->cliente->user->apellido}} </td>
                                @endif
                                @if(auth()->user()->tipo != 'Cuidador' && (auth()->user()->tipo != 'Limpiador'))
                                    <td class="empleado">{{$cl->empleado->user->nombre}}, {{$cl->empleado->user->apellido}} </td>
                                @endif
                                <td class="tipo">{{$cl->tipo}} </td>
                                <td class="estado">{{$cl->estado}} </td>
                                @forelse($citas as $cita)
                                    @if($cita->servicio_id == $cl->id)
                                        <td class="h_c">{{Carbon\Carbon::parse($cita->hora_cita)->format('H:i')}}</td>
                                        <td class="lugar">{{$cita->lugar}} </td>
                                        <td class="espec">{{Crypt::decryptString($cita->especialidad->nombre)}} </td>
                                        @php $datos = true; @endphp
                                    @endif
                                @empty

                                @endforelse
                                @if($datos == false)
                                    <td class="h_c"></td>
                                    <td class="lugar"></td>
                                    <td class="espec"></td>
                                @endif
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
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/tabla.js') }}" ></script>


@endsection
