@extends('template')
@section('title','Nuevo medicamento')
@section('content')
    <form class="bg-light text-center needs-validation" action="{{route('medicamentos.store')}}" method="post"  novalidate >
        @csrf
        <h1 class="bg-success bg-opacity-25 text-success p-2 mb-5 text-center">Nuevo medicamento</h1>
        <div class= " d-flex flex-column justify-content-center align-items-center ">
        <div class= " mb-2 col-10 col-md-8 col-lg-6 col-xl-4">
            <label class= "form-label fw-bolder me-2" for="nombre">Nombre: </label>
            <input  class="form-control" type="text" id="nombre" name="nombre"  value="{{old('nombre')}}" required>
            <div class="invalid-feedback">El nombre es obligatorio</div>
            @if($errors->has('nombre'))
                <div class='text-danger mens'>
                {{$errors->first('nombre')}}
                </div>
            @endif
        </div>
        <div class= "mt-1 mb-2 col-10 col-md-8 col-lg-6 col-xl-4">
            <label class= "form-label fw-bolder me-2" for="nombre">Principio activo: </label>
            <input class="form-control" type="text" id="principio" name="principio"  value="{{old('principio')}}" required>
            <div class="invalid-feedback">El principio activo es obligatorio</div>
            @if($errors->has('principio'))
                <div class='text-danger mens'>
                {{$errors->first('principio')}}
                </div>
            @endif
        </div>
        <div class= "mt-1 mb-2 col-6 col-md-4 col-lg-2">
            <label class= "form-label fw-bolder me-2" for="nombre">Cantidad (en mg): </label>
            <input class="form-control" type="text" pattern="([0-9]*[.])?[0-9]+" id="cantidad" name="cantidad" value="{{old('cantidad')}}" required>
            <div class="invalid-feedback">La cantidad es obligatoria (debe ser un valor numérico)</div>
            @if($errors->has('cantidad'))
                <div class='text-danger mens'>
                {{$errors->first('cantidad')}}
                </div>
            @endif
        </div>
    </div>
        <a href= "{{route('tratamientos.create')}}" class="btn btn-outline-success  m-3 "><i class="bi bi-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-success text-warning mt-3 mb-3 " name="enter" id="enter"><i class="bi bi-save"></i> Guardar</button>

    </form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/valMed.js') }}" defer></script>

@endsection

