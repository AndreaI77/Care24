@extends('template')
@section('title','Detalles')
@section('content')
    <div class="card mb-4">

        <div class='bg-success bg-opacity-25 text-success text-center p-2'>
            <h1>Detalles de la incidencia:</h1>
        </div>
        <div class="card-body">
            <div class= '  p-2 border-bottom'>

                    <p><span class="fw-bolder">Reportado por:  </span>{{$incidencia->empleado->user->nombre}}, {{$incidencia->empleado->user->apellido}} </p>
                    <p><span class="fw-bolder">Cliente:  </span>{{$incidencia->cliente->user->nombre}}, {{$incidencia->cliente->user->apellido}} </p>
                    <p><span class="fw-bolder">Fecha de la incidencia:  </span>{{Carbon\Carbon::parse($incidencia->fecha)->format('d/m/Y')}} </p>
                    <p><span class="fw-bolder">Tipo de incidencia:  </span>{{$incidencia->tipo}} </p>
                    <p><span class="fw-bolder">Estado:  </span>{{$incidencia->estado}} </p>
                    <p><span class="fw-bolder">Título:  </span>{{Crypt::decryptString($incidencia->titulo)}} </p>

            </div>
            <div class= "  ps-3 mt-3 ">
                <p><span class="fw-bolder"> Mensaje:  <br/></span>{{Crypt::decryptString($incidencia->descripcion)}} </p>


            </div>
        </div>
        <div class="card-footer p-3">

                <form action= "{{route('incidencias.destroy', $incidencia->id)}}" id="form" method="POST">
                    @method('DELETE')
                    @csrf
                    <button  type="submit" class="btn btn-danger  fw-bolder float-start w-25" name="borrar" id="borrar"><i class="bi bi-x-circle"></i>Eliminar</Button>
                    </form>
                <a class="btn btn-success text-warning fw-bolder float-end w-25" href="{{route('incidencias.edit', $incidencia->id)}}"><i class="bi bi-pencil-square"></i> Editar</a>
                <a class="btn btn-outline-success  fw-bolder float-end me-5  w-25" href="{{route('incidencias.index')}}"><i class="bi bi-arrow-left"></i> Volver</a>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/borrar.js') }}" ></script>
@endsection

