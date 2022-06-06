@extends('template')
@section('title','Medicamentos')
@section("css")
<link rel='stylesheet' href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
@endsection

@section('content')
    <h1 class="bg-success bg-opacity-25 text-success text-center">Medicamentos</h1>
    <div class= 'd-flex justify-content-center m-5'>
        <div class="col-md-10 col-lg-8  ">
            <div class="table-responsive">
                @isset($medicamentos)
                <table class = "table table-sm table-striped" id="tabla">
                    <thead>
                    <tr>


                        <th class="text-center">Nombre</th>
                        <th class="text-center">Principio activo</th>
                        <th class="text-center">Cantidad</th>
                        <th ></th>
                    </tr>
                    </thead>
                    <tbody >
                        @forelse($medicamentos as $cl)
                            <tr class="text-center"  id="{{$cl->id}}">

                                <td class="nombre">{{Crypt::decryptString($cl->nombre)}}</td>
                                <td class="principio">{{Crypt::decryptString($cl->principio_ac)}}</td>
                                <td class="cantidad">{{$cl->cantidad}} mg</td>
                                <td class="">
                                    <form action= "{{route('medicamentos.destroy', $cl->id)}}" class="form" method="POST">
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
            </div>
            <a href= "{{route('tratamientos.create')}}" class="btn btn-outline-success float-end mt-3 "><i class="bi bi-arrow-left"></i> Volver</a>
        </div>

    </div>

@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tabla.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/confirm.js') }}" ></script>
@endsection

