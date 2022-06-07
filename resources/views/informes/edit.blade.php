@extends('template')
@section('title','Nuevo informe')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('informes.update',$informe->id)}}" method="post"  novalidate >
    @csrf

    @method('PUT')
    <h1 class="bg-success bg-opacity-25 text-success text-center">Actualizar informe</h1>
    <div class= " p-3 row row-cols-1">
        <div class= "">

            <h4 class="text-success text-center"> Autor: {{ $informe->empleado->user->nombre }}, {{ $informe->empleado->user->apellido }}</h4>
            <h5 class=""> Fecha de informe: {{Carbon\Carbon::parse($informe->fecha)->format('d/m/Y')}}
        </div>
        <div class= "mt-2 col-8 col-sm-6 col-lg-4 col-xl-3">
            <label class= "form-label fw-bolder me-2" for="estado">Estado:<span class="text-danger">*</span></label>

            <select class="form-control" name="estado" required id="estado">
                <option value="Activo" @if($informe->estado === "Activo") selected @endif>Activo</option>
                @if(auth()->user()->tipo == 'Administrativo')
                <option value="Archivado" @if($informe->estado === "Archivado") selected @endif>Archivado</option>
                @endif
            </select>

        </div>


        <div>
            <label class= "form-label fw-bolder" for="titulo">Título: <span class="text-danger">*</span></label>
            <input class="form-control " type="text" minLength='5' name="titulo" id="titulo"  value="{{Crypt::decryptString($informe->titulo)}}" disabled required>
            <div class="invalid-feedback">El título es obligatorio (min. 5 carácteres).</div>
            @if($errors->has('titulo'))
                <div class='text-danger mens'>
                {{$errors->first('titulo')}}
                </div>
            @endif
            <input class="form-control " type="hidden" name="titulo"   value="{{Crypt::decryptString($informe->titulo)}}">
        </div>
        <div class= "mt-3">
            <label class= "form-label fw-bolder" for="descripcion">Mensaje: <span class="text-danger">*</span></label>
            <textarea class= "form-control" name="descripcion" rows="10" cols="50" required disabled>{{Crypt::decryptString($informe->descripcion)}}</textarea>
            <div class="invalid-feedback">El mensaje es obligatorio.</div>
            @if($errors->has('descripcion'))
                <div class='text-danger mens'>
                {{$errors->first('descripcion')}}
                </div>
            @endif
            <input class="form-control " type="hidden" name="descripcion"   value="{{Crypt::decryptString($informe->descripcion)}}">
        </div>

    </div>

    <button type="submit" class="btn btn-success text-warning mt-3 mb-3 float-end" name="enter" id="enter"><i class="bi bi-save"></i> Guardar</button>
    <a href= "{{route('informes.show', $informe->id)}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Salir sin guardar</a>
</form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" defer></script>

@endsection
