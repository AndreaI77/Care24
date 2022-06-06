@extends('template')
@section('title','Horarios')
@section("css")
    <link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
@endsection

@section('content')

<h1 class="bg-success bg-opacity-25 text-success text-center mb-3">Agenda:</h1>
<form action="">
<div class='d-flex justify-content-end bg-light me-2 ms-2 p-1 pe-2'>
    <button type = "reset" class="btn btn-danger btn-sm    mt-2" id="borrar">Borrar filtros</button>
</div>
<div class= "row row-cols-1  row-cols-lg-2 bg-light me-2 ms-2 mb-3 p-3 pt-0">

    <div class= "col d-inline-flex justify-content-start ">

        <div class='row ' id ="fecha1">
            <label for="fecha">Elige fecha:</label>
            <input type='date' name='fecha' id='fecha' value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
        </div>
        @if (auth()->user()->tipo == 'cliente')
            <div class= 'row ms-5 me-5' id ="emp1">
                <label for="emp">Empleado:</label>
                <select name="emp"  id="emp" >
                    <option value="" selected hidden >Selecciona empleado</option>
                    @foreach($empleados as $em)
                        @if(($em->user->fecha_baja == null || $em->user->fecha_baja == "") && $em->user_id != 1)
                            <option value="{{$em->user->nombre}}, {{$em->user->apellido}}" >{{$em->user->nombre}}, {{$em->user->apellido}} </option>
                        @endif
                    @endforeach
                </select>
            </div>
        @endif

        @if (auth()->user()->tipo == 'Cuidador' || (auth()->user()->tipo == 'Limpiador') )
            <div class= 'row ms-5 me-3' id ="clt1">
                <label for="clt">Cliente:</label>
                <select name="clt"  id="clt" >
                    <option value="" selected hidden >Selecciona cliente</option>
                    @foreach($clientes as $cl)
                        @if($cl->user->fecha_baja == null || $cl->user->fecha_baja == "")
                            <option value="{{$cl->user->nombre}}, {{$cl->user->apellido}}" >{{$cl->user->nombre}}, {{$cl->user->apellido}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        @endif

    </div>

    <div class= " col d-inline-flex justify-content-start mt-2 ">
        @if (auth()->user()->tipo == 'Administrativo')
            <div class= 'row me-5' id ="emp1">
                <label for="emp">Empleado:</label>
                <select name="emp"  id="emp" >
                    <option value="" selected hidden >Selecciona empleado</option>
                    @foreach($empleados as $em)
                        @if(($em->user->fecha_baja == null || $em->user->fecha_baja == "") && $em->user_id != 1)
                            <option value="{{$em->user->nombre}}, {{$em->user->apellido}}" >{{$em->user->nombre}}, {{$em->user->apellido}} </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class= 'row me-3' id ="clt1">
                <label for="clt">Cliente:</label>
                <select name="clt"  id="clt" >
                    <option value="" selected hidden >Selecciona cliente</option>
                    @foreach($clientes as $cl)
                    @if($cl->user->fecha_baja == null || $cl->user->fecha_baja == "")
                    <option value="{{$cl->user->nombre}}, {{$cl->user->apellido}}" >{{$cl->user->nombre}}, {{$cl->user->apellido}}</option>
                    @endif
                @endforeach
                </select>
            </div>
        @endif

    </div>

</div>
</form>
<div class=" border m-2  ps-2 pe-2 mb-4" id="agenda">
    <div id="antes"> <span class="fw-bolder">Antes de 8:00</span> </div><hr class="mb-0"/>
    <div id="8"><span class="fw-bolder">8:00</span></div><hr class="mb-0"/>
    <div id="9"><span class="fw-bolder">9:00</span> </div><hr class="mb-0"/>
    <div id="10"><span class="fw-bolder">10:00</span> </div><hr class="mb-0"/>
    <div id="11"><span class="fw-bolder">11:00</span> </div><hr class="mb-0"/>
    <div id="12"><span class="fw-bolder">12:00</span> </div><hr class="mb-0"/>
    <div id="13"><span class="fw-bolder">13:00</span> </div><hr class="mb-0"/>
    <div id="14"><span class="fw-bolder">14:00</span> </div><hr class="mb-0"/>
    <div id="15"><span class="fw-bolder">15:00</span></div><hr class="mb-0"/>
    <div id="16"><span class="fw-bolder">16:00</span> </div><hr class="mb-0"/>
    <div id="17"><span class="fw-bolder">17:00</span> </div><hr class="mb-0"/>
    <div id="18"><span class="fw-bolder">18:00</span> </div><hr class="mb-0"/>
    <div id="19"><span class="fw-bolder">19:00</span> </div><hr class="mb-0"/>
    <div id="20"><span class="fw-bolder">20:00</span> </div><hr class="mb-0"/>
    <div id="21"><span class="fw-bolder">21:00</span> </div><hr class="mb-0"/>
    <div id="despues"><span class="fw-bolder">Después de 22:00</span> </div><hr class="mb-0"/>

</div>
<h2 class="bg-success bg-opacity-25 text-success text-center mb-3">Todos los servicios:</h2>
<div class="table-responsive mb-4">

    @isset($servicios)

        <table class = "table table-sm table-striped" id='tabla'>
            <thead>
                <tr>
                    <th class="text-center">Detalles</th>
                    <th class="text-center fecha">Fecha</th>
                    <th class="text-center h-i"> Hora inicio</th>
                    <th class="text-center h-f"> Hora final</th>
                    {{-- @if (auth()->user()->tipo != 'cliente') --}}
                        <th class="text-center cliente"> Cliente</th>
                    {{-- @endif
                    @if(auth()->user()->tipo != 'Cuidador' && (auth()->user()->tipo != 'Limpiador')) --}}
                        <th class="text-center empleado"> Empleado</th>
                    {{-- @endif --}}
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
                                        <td><a class= "nav-link p-0 m-0 text-center" href="{{route('citas.show', $cita->id)}}"><i class="bi bi-eye"></i> Ver</a></td>
                                        @php $ct = true; @endphp
                                    @endif
                                @empty
                                @endforelse
                                @if($ct == false)
                                    <td><a class= "nav-link p-0 m-0 text-center" href="{{route('servicios.show', $cl->id)}}"><i class="bi bi-eye"></i> Ver</a></td>
                                @endif
                                <td class="fecha">{{Carbon\Carbon::parse($cl->fecha)->format('d/m/Y')}}</td>

                                <td class="h-i">{{Carbon\Carbon::parse($cl->hora_inicio)->format('H:i')}}</td>
                                <td class="h-f">{{Carbon\Carbon::parse($cl->hora_final)->format('H:i')}}</td>
                                {{-- @if(auth()->user()->tipo != 'cliente') --}}
                                    <td class="cliente">{{$cl->cliente->user->nombre}}, {{$cl->cliente->user->apellido}}</td>
                                {{-- @endif
                                @if(auth()->user()->tipo != 'Cuidador' && (auth()->user()->tipo != 'Limpiador')) --}}
                                    <td class="empleado">{{$cl->empleado->user->nombre}}, {{$cl->empleado->user->apellido}}</td>
                                {{-- @endif --}}
                                <td class="tipo">{{$cl->tipo}}</td>
                                <td class="estado">{{$cl->estado}}</td>
                                @forelse($citas as $cita)
                                    @if($cita->servicio_id == $cl->id)
                                        <td class="h_c">{{Carbon\Carbon::parse($cita->hora_cita)->format('H:i')}}</td>
                                        <td class="lugar">{{$cita->lugar}}</td>
                                        <td class="espec">{{Crypt::decryptString($cita->especialidad->nombre)}}</td>
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
