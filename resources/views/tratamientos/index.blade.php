@extends('template')
@section('title','Tratamientos')
@section("css")
<link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
<link rel='stylesheet' href="{{ asset('css/link.css') }}" >
@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center mb-0">Tratamientos </h1>
<form action="">
    <div class= " d-flex flex-column bg-light">

        <div class= " d-flex  justify-content-center me-2 ms-2 p-3 pe-2 ">

            <div class='row ' id ="fecha1">
                <label for="fecha">Elige fecha:</label>
                <input type='date' name='fecha' id='fecha' value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>

            @if (auth()->user()->tipo != 'cliente' )
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

                <div class=' d-none d-md-flex justify-self-end align-self-end me-2 ms-2 '>
                    <button type = "reset" class="btn btn-danger btn-sm    mt-2" id="borrar">Reiniciar filtros</button>
                </div>
            @endif
        </div>
        @if (auth()->user()->tipo != 'cliente' )
            <div class=' d-md-none justify-self-end align-self-end  p-2  me-2'>
                <button type = "reset" class="btn btn-danger btn-sm    mt-2" id="borrar">Limpiar filtros</button>
            </div>
        @endif
    </div>
</form>
<div class= "d-flex justify-content-center pt-4 bg-light">
    <div class=" col col-lg-8  border m-2  mb-4" id="agenda">
        <div class="bg-primary bg-opacity-25 ps-2 pe-2  " >
            <div  id="antes"> <span class="fw-bolder">Antes de las 8:00</span> </div><hr class="mb-0"/>
        </div>
        <div class="bg-warning bg-opacity-25 ps-2 pe-2 " >
            <div id="8"><span class="fw-bolder">8:00</span></div><hr class="mb-0"/>
            <div id="9"><span class="fw-bolder">9:00</span> </div><hr class="mb-0"/>
            <div id="10"><span class="fw-bolder">10:00</span> </div><hr class="mb-0"/>
            <div id="11"><span class="fw-bolder">11:00</span> </div><hr class="mb-0"/>
        </div>
        <div class="bg-info bg-opacity-25 ps-2 pe-2 " >
            <div id="12"><span class="fw-bolder">12:00</span> </div><hr class="mb-0"/>
            <div id="13"><span class="fw-bolder">13:00</span> </div><hr class="mb-0"/>
            <div id="14"><span class="fw-bolder">14:00</span> </div><hr class="mb-0"/>
            <div id="15"><span class="fw-bolder">15:00</span></div><hr class="mb-0"/>
            <div id="16"><span class="fw-bolder">16:00</span> </div><hr class="mb-0"/>
        </div>
        <div class="bg-danger bg-opacity-25 ps-2 pe-2 " >
            <div id="17"><span class="fw-bolder">17:00</span> </div><hr class="mb-0"/>
            <div id="18"><span class="fw-bolder">18:00</span> </div><hr class="mb-0"/>
            <div id="19"><span class="fw-bolder">19:00</span> </div><hr class="mb-0"/>
            <div id="20"><span class="fw-bolder">20:00</span> </div><hr class="mb-0"/>
            <div id="21"><span class="fw-bolder">21:00</span> </div><hr class="mb-0"/>
        </div>
        <div class="bg-primary bg-opacity-25 ps-2 pe-2 " >
            <div id="despues"><span class="fw-bolder">Después de las 22:00</span> </div><hr class="mb-0"/>
        </div>
    </div>
</div>
<h2 class="bg-success bg-opacity-25 text-success text-center mt-3 mb-3 ps-2 pe-2 ">Todos los tratamientos:</h2>

<div class="table-responsive mb-4">

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

                    <td><a class= " p-0 m-0 text-center" href="{{route('tratamientos.show', $trat->id)}}"><i class="bi bi-eye"></i> Ver</a></td>
                    <td class="cliente">{{$trat->cliente->user->nombre}}, {{$trat->cliente->user->apellido}}</td>
                    <td class="empleado">{{Crypt::decryptString($trat->medicamento->nombre)}} ({{$trat->medicamento->cantidad}}mg)</td>
                    <td class="fecha_principio">{{Carbon\Carbon::parse($trat->fecha_principio)->format('d/m/Y')}}</td>
                    <td class="fecha_fin">@isset(($trat->fecha_fin)){{Carbon\Carbon::parse($trat->fecha_fin)->format('d/m/Y')}}@endisset</td>
                    <td class="cantidad">{{$trat->cantidad}}</td>
                    <td class="hora">{{Carbon\Carbon::parse($trat->hora)->format('H:i')}}</td>
                    {{-- <td class="descrip">@isset(($trat->servicio->descripcion)){{Crypt::decryptString($trat->servicio->descripcion)}}@endisset</td> --}}
                </tr>

            @empty <li>No elements to be shown</li>
            @endforelse
        </tbody>
    </table>

    @endisset

</div>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/tratamientos.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/tabla.js') }}" defer></script>

@endsection

