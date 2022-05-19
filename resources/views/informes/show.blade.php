@extends('template')
@section('title','Detalles')
@section('content')
    <div class="card mb-4">

        <div class='bg-success bg-opacity-25 text-success text-center p-2'>
            <h1>Detalles del informe:</h1>
        </div>
        <div class="card-body">
            <div class= '  p-2 border-bottom'>

                    <p><span class="fw-bolder">Autor:  </span>{{$informe->empleado->user->nombre}}, {{$informe->empleado->user->apellido}} </p>
                    <p><span class="fw-bolder">Fecha del informe:  </span>{{Carbon\Carbon::parse($informe->fecha)->format('d/m/Y')}} </p>
                    <p><span class="fw-bolder">Estado:  </span>{{$informe->estado}} </p>
                    <p><span class="fw-bolder">Título:  </span>{{Crypt::decryptString($informe->titulo)}} </p>

            </div>
            <div class= "  ps-3 mt-3 ">
                <p><span class="fw-bolder"> Mensaje:  <br/></span>{{Crypt::decryptString($informe->descripcion)}} </p>


            </div>
        </div>
        <div class="card-footer p-3">
                <form action= "{{route('informes.destroy', $informe->id)}}" id="form" method="POST">
                    @method('DELETE')
                    @csrf
                    <button  type="submit" class="btn btn-danger  fw-bolder float-start w-25" name="borrar" id="borrar"><i class="bi bi-x-circle"></i>Eliminar</Button>
                    </form>
                <a class="btn btn-success text-warning fw-bolder float-end w-25" href="{{route('informes.edit', $informe->id)}}"><i class="bi bi-pencil-square"></i> Editar</a>
                <a class="btn btn-outline-success  fw-bolder float-end me-5  w-25" href="{{route('informes.index')}}"><i class="bi bi-arrow-left"></i> Volver</a>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/borrar.js') }}" ></script>
@endsection

