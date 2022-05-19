@extends('template')
@section('title','Nueva especialidad')
@section('content')
    <form class="bg-light text-center needs-validation" action="{{route('especialidades.store')}}" method="post"  novalidate >
        @csrf
        <h1 class="bg-success bg-opacity-25 text-success p-2 mb-5 text-center">Nueva especialidad</h1>
        <div class= "mt-3 mb-3">
            <label class= "form-label fw-bolder me-2" for="nombre">Nombre de la especialidad: </label>
            <input type="text" id="nombre" name="nombre"  value="{{old('nombre')}}" required>
            <div class="invalid-feedback">El nombre es obligatorio</div>
            @if($errors->has('nombre'))
                <div class='text-danger mens'>
                {{$errors->first('nombre')}}
                </div>
            @endif
        </div>
        <a href= "{{route('citas.create')}}" class="btn btn-outline-success  m-3 "><i class="bi bi-arrow-left"></i> Volver</a>
        <button type="submit" class="btn btn-success text-warning mt-3 mb-3 " name="enter" id="enter"><i class="bi bi-save"></i> Guardar</button>

    </form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" defer></script>

@endsection

