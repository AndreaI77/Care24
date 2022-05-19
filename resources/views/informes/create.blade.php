@extends('template')
@section('title','Nuevo informe')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('informes.store')}}" method="post"  novalidate >
    @csrf
    <h1 class="bg-success bg-opacity-25 text-success text-center">Nuevo informe</h1>
    <div class= " p-3">
        <div class= "">

            <h4 class="text-success text-center"> Autor: {{ auth()->user()->nombre }}, {{ auth()->user()->apellido }}</h4>
        </div>

        <input type="hidden" name="estado" id='estado' value='activo'/>
        <div>
            <label class= "form-label fw-bolder" for="titulo">Título: <span class="text-danger">*</span></label>
            <input class="form-control " type="text" minLength='5' name="titulo" id="titulo" autofocus value="{{old('titulo')}}" required>
            <div class="invalid-feedback">El título es obligatorio (min. 5 carácteres).</div>
            @if($errors->has('titulo'))
                <div class='text-danger mens'>
                {{$errors->first('titulo')}}
                </div>
            @endif
        <div class= "mt-3">
            <label class= "form-label fw-bolder" for="descripcion">Mensaje: <span class="text-danger">*</span></label>
            <textarea class= "form-control" name="descripcion" rows="10" cols="50" required>{{old('descripcion')}}</textarea>
            <div class="invalid-feedback">El mensaje es obligatorio.</div>
            @if($errors->has('descripcion'))
                <div class='text-danger mens'>
                {{$errors->first('descripcion')}}
                </div>
            @endif
        </div>

    </div>

    <button type="submit" class="btn btn-success text-warning mt-3 mb-3 float-end" name="enter" id="enter"><i class="bi bi-save"></i> Guardar</button>
    <a href= "{{route('informes.index')}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Salir sin guardar</a>
</form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" defer></script>

@endsection

