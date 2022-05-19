@extends('template')
@section('title','Galeria')

@section('content')
    <h1 class="bg-success bg-opacity-25 text-success text-center">Galería</h1>
    @isset($clientes)
        <div class="row row-cols-1 row-cols-sm-2  row-cols-md-3 row-cols-lg4 row-cols-xl-5 row-cols-xxl-6 g-4  ">
            @forelse($clientes as $cl)
                <div class="col">
                    <div class="card h-100">

                        <a class= "nav-link p-0 m-0 text-center " href="{{route('clientes.show', $cl->id)}}">
                            @isset($cl->user->foto)
                            <img  src="{{asset($cl->user->foto)}}" class="col-12" alt="imagen cliente" >
                            @endisset
                        </a>

                    <div class="card-footer mt-auto">
                        <a class= "nav-link p-0 m-0 text-center " href="{{route('clientes.show', $cl->id)}}">
                        <h5 class="card-title">{{$cl->user->nombre}}, {{$cl->user->apellido}}</h5>
                        </a>
                    </div>
                    </div>
                </div>
            @empty <li>No hay clientes</li>
            @endforelse

        </div>
    @endisset

@endsection

