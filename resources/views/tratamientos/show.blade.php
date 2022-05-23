@extends('template')
@section('title','Detalles')
@section('content')
    <div class="card mb-4">

        <div class='bg-success bg-opacity-25 text-success text-center p-2'>
            <h1>Detalles del tratamiento:</h1>
        </div>
        <div class="card-body">
            <div class= 'row row-cols-sm-2  p-2 border-bottom'>
                <div class= " col-md-6 ps-3 ">
                    <p><span class="fw-bolder">Cliente:  </span>{{$tratamiento->cliente->user->nombre}}, {{$tratamiento->cliente->user->apellido}} </p>
                    <p><span class="fw-bolder">Medicamento:  </span>{{Crypt::decryptString($tratamiento->medicamento->nombre)}} {{$tratamiento->medicamento->cantidad}} mg </p>
                    <p><span class="fw-bolder">Cantidad:  </span> {{$tratamiento->cantidad}} </p>
                    <p><span class="fw-bolder">Hora de la toma: </span> {{Carbon\Carbon::parse($tratamiento->hora)->format('H:i')}}</p>


                </div>
                <div class= " col-md-6 ps-3">
                    <p><span class="fw-bolder">Fecha de inicio:  </span>{{Carbon\Carbon::parse($tratamiento->fecha_principio)->format('d/m/Y')}} </p>
                    <p><span class="fw-bolder">Fecha final: </span> @isset(($cl->fecha_fin)){{Carbon\Carbon::parse($cl->fecha_fin)->format('d/m/Y')}} @endisset</p>
                </div>
            </div>
            <div class= " col-md-6 ps-3 mt-3 ">
                <p><span class="fw-bolder"> Descripción:  <br/></span>{{Crypt::decryptString($tratamiento->descripcion)}} </p>
            </div>
        </div>
        <div class="card-footer p-3">
            @if(auth()->user()->tipo !== 'cliente')
                <form action= "{{route('tratamientos.destroy', $tratamiento->id)}}" id="form" method="POST">
                    @method('DELETE')
                    @csrf
                    <button  type="submit" class="btn btn-danger  fw-bolder float-start w-25" name="borrar" id="borrar"><i class="bi bi-x-circle"></i>Eliminar</Button>
                    </form>
                <a class="btn btn-success text-warning fw-bolder float-end w-25" href="{{route('tratamientos.edit', $tratamiento->id)}}"><i class="bi bi-pencil-square"></i> Editar</a>
            @endif
                <a class="btn btn-outline-success  fw-bolder float-end me-5  w-25" href="{{route('tratamientos.index')}}"><i class="bi bi-arrow-left"></i> Volver</a>

        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/borrar.js') }}" ></script>
@endsection

