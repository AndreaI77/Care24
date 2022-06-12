@extends('template')
@section('title','Detalles')
@section('content')
    <div class="card mb-4">

        <div class='bg-success bg-opacity-25 text-success text-center p-2'>
            <h1>Detalles servicio:</h1>
        </div>
        <div class="card-body ">
            <div class= 'row row-cols-sm-2  p-2 border-bottom '>
                <div class= " col-md-6 ps-3 ">
                    <p><span class="fw-bolder">Cliente:  </span>{{$servicio->cliente->user->nombre}}, {{$servicio->cliente->user->apellido}} </p>
                    <p><span class="fw-bolder">Empleado:  </span>{{$servicio->empleado->user->nombre}}, {{$servicio->empleado->user->apellido}} </p>
                    <p><span class="fw-bolder">Estado:  </span>{{$servicio->estado}} </p>
                    <p><span class="fw-bolder">Tipo:  </span>{{$servicio->tipo}} </p>
                </div>
                <div class= " col-md-6 ps-3">
                    <p><span class="fw-bolder">Fecha:  </span>{{Carbon\Carbon::parse($servicio->fecha)->format('d/m/Y')}} </p>
                    <p><span class="fw-bolder">Desde: </span> {{Carbon\Carbon::parse($servicio->hora_inicio)->format('H:i')}}</p>
                    <p><span class="fw-bolder">Hasta: </span> {{Carbon\Carbon::parse($servicio->hora_final)->format('H:i')}}</p>

                </div>
            </div>
            <div class="ps-3 mt-3 row row-cols-md-2">
                <div class= " col-md-6  ">
                    <p><span class="fw-bolder"> Descripción:  <br/></span>{{Crypt::decryptString($servicio->descripcion)}} </p>

                </div>
                <div class= " col-md-6 ps-3  ">
                    <p><span class="fw-bolder">Comentario:  <br/></span>@if ($servicio->comentario != "" && $servicio->comentario != null ){{Crypt::decryptString($servicio->comentario)}}@endif</p>
                </div>
            </div>
        </div>
        <div class="card-footer   p-3">
            @if(auth()->user()->tipo == 'Administrativo')
                <form action= "{{route('servicios.destroy', $servicio->id)}}" id="form" method="POST">
                    @method('DELETE')
                    @csrf
                    <button  type="submit" class="btn btn-danger float-start  fw-bolder  " name="borrar" id="borrar"><i class="bi bi-x-circle"></i> Eliminar</Button>
                    </form>
            @endif
            @if(auth()->user()->tipo == 'Administrativo' )
                <a class="btn btn-success text-warning fw-bolder float-end  w-25" href="{{route('servicios.edit', $servicio->id)}}"><i class="bi bi-pencil-square"></i> Editar</a>
            @endif
            @if((auth()->user()->tipo == 'Cuidador' || auth()->user()->tipo == 'Limpiador') && $servicio->estado != 'Archivado' )
                <a class="btn btn-success text-warning fw-bolder float-end  w-25" href="{{route('servicios.edit', $servicio->id)}}"><i class="bi bi-pencil-square"></i> Editar</a>
            @endif

            @if(auth()->user()->tipo === 'cliente' && $servicio->estado == 'Atendido')
                <a class="btn btn-success text-warning fw-bolder float-end w-25" href="{{route('servicios.edit', $servicio->id)}}"><i class="bi bi-pencil-square"></i> Valorar</a>

            @endif

            <a class="btn btn-outline-success  fw-bolder float-end me-5 w-25 " href="{{route('servicios.index')}}"><i class="bi bi-arrow-left"></i> Volver</a>
            @if(auth()->user()->tipo !== 'cliente' && $servicio->estado != 'Archivado')
                <a class="btn btn-success text-warning fw-bolder float-end me-5 w-25 " href="{{route('incidencias.create', $servicio->id)}}"><i class="bi bi-pencil-square"></i> Reportar incidencia</a>
            @endif
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/borrar.js') }}" ></script>
@endsection



