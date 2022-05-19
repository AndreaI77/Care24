@extends('template')
@section('title','Nuevo medicamento')
@section('content')
    <form class="bg-light text-center needs-validation" action="{{route('medicamentos.store')}}" method="post"  novalidate >
        @csrf
        <h1 class="bg-success bg-opacity-25 text-success p-2 mb-5 text-center">Nuevo medicamento</h1>
        <div class= "mt-3 mb-3">
            <label class= "form-label fw-bolder me-2" for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre"  value="{{old('nombre')}}" required>
            <div class="invalid-feedback">El nombre es obligatorio</div>
            @if($errors->has('nombre'))
                <div class='text-danger mens'>
                {{$errors->first('nombre')}}
                </div>
            @endif
        </div>
        <div class= "mt-3 mb-3">
            <label class= "form-label fw-bolder me-2" for="nombre">Principio activo: </label>
            <input type="text" id="principio" name="principio"  value="{{old('principio')}}" required>
            <div class="invalid-feedback">El principio activo es obligatorio</div>
            @if($errors->has('principio'))
                <div class='text-danger mens'>
                {{$errors->first('principio')}}
                </div>
            @endif
        </div>
        <div class= "mt-3 mb-3">
            <label class= "form-label fw-bolder me-2" for="nombre">Cantidad (en mg): </label>
            <input type="text" id="cantidad" name="cantidad" value="{{old('cantidad')}}" required>
            <div class="invalid-feedback">El principio activo es obligatorio</div>
            @if($errors->has('cantidad'))
                <div class='text-danger mens'>
                {{$errors->first('cantidad')}}
                </div>
            @endif
        </div>
        <a href= "{{route('tratamientos.create')}}" class="btn btn-outline-success  m-3 "><i class="bi bi-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-success text-warning mt-3 mb-3 " name="enter" id="enter"><i class="bi bi-save"></i> Guardar</button>

    </form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" defer></script>

@endsection

