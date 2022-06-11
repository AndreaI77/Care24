@extends('template')
@section('title','Servicios')
@section("css")
{{-- <script src="https://kit.fontawesome.com/b4f304c53c.js" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center">Comentarios:</h1>



    @isset($servicios)


        <div class="row row-cols-1 row-cols-lg-2  g-4">
            <div class= "col" id="chart">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col">
                @forelse($servicios as $cl)
                    @if(Crypt::decryptString($cl->comentario) != "")
                        <div >
                            <div class="card mb-3 border border-warning  ">
                                <input type= "hidden" class='tarjeta' name= "valor" value= "{{$cl->valoracion}}"/>
                                <div class="card-header pb-0">
                                    <p class="float-end mb-0 text-muted">Valorado por: {{$cl->cliente->user->nombre}}</p>
                                    <p class= "mb-0 ">
                                        @foreach(range(1,5) as $i)
                                            <span class="text-primary" >

                                                @if($cl->valoracion >0)

                                                    <i class="bi bi-star-fill"></i>
                                                @else
                                                <i class="bi bi-star"></i>

                                                @endif
                                            @php $cl->valoracion--; @endphp
                                            </span>
                                        @endforeach
                                        {{-- @foreach(range(1,5) as $i)
                                            <span class="fa-stack text-primary" style="width:1em">
                                                <i class="far fa-star fa-stack-1x"></i>

                                                @if($cl->valoracion >0)
                                                    @if($cl->valoracion >0.5)
                                                        <i class="fas fa-star fa-stack-1x"></i>
                                                    @else
                                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                                    @endif
                                                @endif
                                                @php $cl->valoracion--; @endphp
                                            </span>
                                        @endforeach --}}
                                    </p>

                                </div>
                                <div class="card-body">
                                    <p class="card-text float-end ">
                                        Fecha del servicio: {{Carbon\Carbon::parse($cl->fecha)->format('d/m/Y')}}<br/>
                                    </p>
                                    <h5 class="card-title">Tipo de servicio: {{$cl->tipo}} </h5>

                                    <p class="card-text">
                                        <strong>Comentario:</strong> <br/>
                                        {{Crypt::decryptString($cl->comentario)}}
                                    </p>
                                </div>
                                <div class="card-footer bg-success bg-opacity-25">

                                </div>
                            </div>
                        </div>
                    @endif
                @empty <li>No hay comentarios</li>
                @endforelse
            </div>
        </div>

    @endisset


@endsection
@section('js')
    {{-- <script type="text/javascript" src="{{ asset('js/coment.js') }}" defer></script> --}}
    <script type="text/javascript" src="{{ asset('js/chart.js') }}" defer></script>

@endsection
