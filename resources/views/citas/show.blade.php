@extends('template')
@section('title','Detalles')
@section('content')
    <div class="card mb-4">

        <div class='bg-success bg-opacity-25 text-success text-center p-2'>
            <h1>Detalles cita médica:</h1>
        </div>
        <div class="card-body">
            <div class= 'row row-cols-sm-2  p-2 border-bottom'>
                <div class= " col-md-6 ps-3 ">
                    <p><span class="fw-bolder">Cliente:  </span>{{$cita->servicio->cliente->user->nombre}}, {{$cita->servicio->cliente->user->apellido}} </p>
                    <p><span class="fw-bolder">Empleado:  </span>{{$cita->servicio->empleado->user->nombre}}, {{$cita->servicio->empleado->user->apellido}} </p>
                    <p><span class="fw-bolder">Estado:  </span>{{$cita->servicio->estado}} </p>
                    <p><span class="fw-bolder">Especialidad:  </span>{{Crypt::decryptString($cita->especialidad->nombre)}} </p>
                    <p><span class="fw-bolder">Lugar:  </span>{{$cita->lugar}} </p>
                </div>
                <div class= " col-md-6 ps-3">
                    <p><span class="fw-bolder">Fecha:  </span>{{Carbon\Carbon::parse($cita->servicio->fecha)->format('d/m/Y')}} </p>
                    <p><span class="fw-bolder">Desde: </span> {{Carbon\Carbon::parse($cita->servicio->hora_inicio)->format('H:i')}}</p>
                    <p><span class="fw-bolder">Hasta: </span> {{Carbon\Carbon::parse($cita->servicio->hora_final)->format('H:i')}}</p>
                    <p><span class="fw-bolder">Hora cita: </span> {{Carbon\Carbon::parse($cita->hora_cita)->format('H:i')}}</p>

                </div>
            </div>
            <div class= " col-md-6 ps-3 mt-3 ">
                <p><span class="fw-bolder"> Descripción:  <br/></span>{{Crypt::decryptString($cita->servicio->descripcion)}} </p>
                <p><span class="fw-bolder">Comentario:  <br/></span>{{Crypt::decryptString($cita->servicio->comentario)}}</p>

            </div>
        </div>
        <div class="card-footer p-3">
            <div>
                @if(auth()->user()->tipo === 'empleado')
                    <form action= "{{route('citas.destroy', $cita->id)}}" id="form" method="POST">
                        @method('DELETE')
                        @csrf
                        <button  type="submit" class="btn btn-danger  fw-bolder float-start w-25" name="borrar" id="borrar"><i class="bi bi-x-circle"></i>Eliminar</Button>
                    </form>

                    <a class="btn btn-success text-warning fw-bolder float-end w-25" href="{{route('citas.edit', $cita->id)}}"><i class="bi bi-pencil-square"></i> Editar</a>

                @endif
                @if(auth()->user()->tipo === 'cliente' && $cita->servicio->estado != 'Pendiente')
                    <a class="btn btn-success text-warning fw-bolder float-end w-25" href="{{route('comentarios.edit',$cita->servicio_id)}}"><i class="bi bi-pencil-square"></i> Valorar</a>

                @endif
                    <a class="btn btn-outline-success  fw-bolder float-end me-5  w-25" href="{{route('citas.index')}}"><i class="bi bi-arrow-left"></i> Volver</a>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/borrar.js') }}" ></script>
@endsection



