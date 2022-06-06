@extends('template')
@section('title','Especialidades')
@section("css")
<link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
@endsection

@section('content')
    <h1 class="bg-success bg-opacity-25 text-success text-center">Especialidades</h1>
    <div class= 'd-flex justify-content-center m-5'>
        <div class="col-md-8 col-lg-6   ">

            @isset($especialidades)
            <table class = "table table-sm table-striped" id="tabla">
                <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th ></th>

                </tr>
                </thead>
                <tbody >
                    @forelse($especialidades as $cl)
                        <tr  id="{{$cl->id}}">

                            <td class="text-center">{{Crypt::decryptString($cl->nombre)}}</td>
                            <td class="text-start">
                                <form action= "{{route('especialidades.destroy', $cl->id)}}" class="form" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button  type="submit" class="btn btn-danger btn-sm" name="borrar" id="{{$cl->id}}"><i class="bi bi-x-circle"></i> Eliminar</Button>
                                </form>
                            </td>
                        </tr>


                    @empty <li>No hay elementos</li>
                    @endforelse
                </tbody>
            </table>

            @endisset
            <a href= "{{route('citas.create')}}" class="btn btn-outline-success float-end mt-3 "><i class="bi bi-arrow-left"></i> Volver</a>
        </div>

    </div>

@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tabla.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/confirm.js') }}" ></script>
@endsection



