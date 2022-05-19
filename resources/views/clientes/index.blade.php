@extends('template')
@section('title','Clientes')
@section("css")
<link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
{{-- <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"> --}}
@endsection

@section('content')
<h1 class="bg-success bg-opacity-25 text-success text-center">Clientes</h1>

<div class="table-responsive">

    @isset($clientes)
    <table class = "table table-sm table-striped" id="tabla">
        <thead>
        <tr class="text-center">
            <th>Detalles</th>
            <th> Nombre</th>
            <th> Apellidos</th>
            <th> Domicilio</th>
            <th> DNI</th>
            <th> Fecha nacimiento</th>
            <th> Nacionalidad</th>
            <th> SIP</th>
            <th>Idioma</th>
            <th> Telefono</th>
            <th> E-mail</th>
            <th> Fecha de&nbsp;alta</th>
            <th> Fecha de&nbsp;baja</th>
        </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cl)
                <tr id="{{$cl->id}}">
                    <td><a class= "nav-link p-0 m-0 text-center" href="{{route('clientes.show', $cl->id)}}"><i class="bi bi-eye"></i> Ver</a> </td>
                    <td class= "nombre">{{$cl->user->nombre}} </td>
                    <td class= "apellido">{{$cl->user->apellido}} </td>
                    <td class= "domicilio">{{$cl->user->domicilio}} </td>
                    <td class= "dni">{{$cl->user->dni}} </td>
                    <td class= "text-center f_nac">{{ Carbon\Carbon::parse($cl->user->fecha_nac)->format('d/m/Y')}} </td>
                    <td class= "nac">{{$cl->nacionalidad}} </td>
                    <td class= "sip">@isset(($cl->sip)){{Crypt::decryptString($cl->sip)}}@endisset </td>
                    <td class= "idioma">{{$cl->idioma}} </td>
                    <td class= "tel">{{$cl->user->tel}} </td>
                    <td class= "email">{{$cl->user->email}} </td>
                    <td class= "text-center f-a">{{ Carbon\Carbon::parse($cl->user->created_at)->format('d/m/Y')}} </td>
                    <td class= "text-center f-b"> @isset(($cl->user->fecha_baja))
                        {{Carbon\Carbon::parse($cl->user->fecha_baja)->format('d/m/Y')}}

                        @endisset

                    </td>


                </tr>

            @empty <li>No elements to be shown</li>
            @endforelse
        </tbody>
    </table>

    @endisset

</div>
@endsection
@section('js')

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tabla.js') }}"></script>

@endsection


