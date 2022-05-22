@extends('template')
@section('title','Servicios')
@section("css")
<link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center">Comentarios:</h1>



    @isset($servicios)

        <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-3 g-4">
            @forelse($servicios as $cl)
                @if(Crypt::decryptString($cl->comentario) != "")
                    <div class="col">
                        <div class="card ">
                            <div class="card-header">
                            <p>Valoración: {{$cl->valoracion}} </p>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Tipo de servicio: {{$cl->tipo}} </h5>
                                <p class="card-text">
                                    Fecha del servicio: {{Carbon\Carbon::parse($cl->fecha)->format('d/m/Y')}} <br/>
                                </p>
                                <p class="card-text">
                                    Comentario: <br/>
                                    {{Crypt::decryptString($cl->comentario)}}
                                </p>
                            </div>
                            <div class="card-footer text-muted">
                                <p class="float-end">Valorado por: {{$cl->cliente->user->nombre}}, {{$cl->cliente->user->apellido}}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @empty <li>No elements to be shown</li>
            @endforelse

        </div>

    @endisset


@endsection
@section('js')

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tabla.js') }}"></script>


@endsection
