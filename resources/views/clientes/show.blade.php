@extends('template')
@section('title','Detalles')
@section('content')


<div class="card mb-4 ">
    <h1 class="bg-success bg-opacity-25 text-success text-center p-2">{{$cliente->user->nombre}} {{$cliente->user->apellido}} </h1>
    <div class="d-md-flex justify-content-center align-items-center mt-3">
        <div class= "col-md-4  p-3 text-center">
            @isset($cliente->user->foto)
                <img class= "img-fluid " src="{{asset($cliente->user->foto)}}" alt="imagen cliente" width='300'>

            @endisset
        </div>
        <div class= "col-md-8  ps-3">
            <div class= "d-md-flex">
                <div class= " col-md-6 ps-3">
                    <p><span class="fw-bolder">Dni:  </span>{{$cliente->user->dni}} </p>
                    <p><span class="fw-bolder">Nacionalidad:  </span>{{$cliente->nacionalidad}} </p>
                    <p><span class="fw-bolder">Email:  </span>{{$cliente->user->email}} </p>
                    <p><span class="fw-bolder">Teléfono:  </span>{{$cliente->user->tel}} </p>
                    <p><span class="fw-bolder">Domicilio: </span> {{$cliente->user->domicilio}}</p>
                </div>
                <div class= " col-md-6 ps-3 ">
                    <p><span class="fw-bolder"> Fecha nacimiento:  </span>{{$cliente->user->fecha_nac}} </p>
                    <p><span class="fw-bolder">SIP:  </span>{{Crypt::decryptString($cliente->sip)}} </p>
                    <p><span class="fw-bolder">Idiomas:  </span>{{$cliente->idiomas}} </p>
                    <p><span class="fw-bolder">Fecha alta:  </span>{{Carbon\Carbon::parse($cliente->user->created_at)->format('d/m/Y')}} </p>
                    @isset(($cliente->user->fecha_baja))
                    <p><span class="fw-bolder">Fecha baja:  </span>{{Carbon\Carbon::parse($cliente->user->fecha_baja)->format('d/m/Y')}}</p>

                    @endisset
                </div>

            </div>

        </div>
    </div>
    <div class= "col-12 ps-3 mt-1">
        <p><span class="fw-bolder">Datos de salud:  <br/></span>{{Crypt::decryptString($cliente->enfermedades)}} </p>
    </div>
    <div class= "col-12 ps-3 mt-1">
        <p><span class="fw-bolder">Familiares:  <br/></span>{{$cliente->familiares}} </p>
    </div>
    <div class= "col-12 ps-3 mt-1">
        <p><span class="fw-bolder">Otros datos:  <br/></span>{{$cliente->user->datos}} </p>
    </div>
    <div class="card-footer">
        <form action= "{{route('clientes.destroy', $cliente->id)}}" id="form" method="POST">
            @method('DELETE')
            @csrf
            <button  type="submit" class="btn btn-danger  fw-bolder float-start w-25" name="borrar" id="borrar"><i class="bi bi-x-circle"></i> Eliminar</Button>
            </form>
        <a class="btn btn-success text-warning fw-bolder float-end w-25" href="{{route('clientes.edit', $cliente->id)}}"><i class="bi bi-pencil-square"></i> Editar</a>
        <a class="btn btn-outline-success  fw-bolder float-end me-5  w-25" href="{{route('clientes.index')}}"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

@endsection
@section('js')
<script type="text/javascript" src="{{ asset('js/borrar.js') }}" ></script>
@endsection

