@extends('template')
@section('title','Nueva incidencia')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('incidencias.store')}}" method="post"  novalidate >
    @csrf
    <h1 class="bg-success bg-opacity-25 text-success text-center">Nueva incidencia</h1>
    <div class= " p-3 ps-lg-5 pe-lg-5">
        <h4 class=""> Autor: {{ auth()->user()->nombre }}, {{ auth()->user()->apellido }}</h4>
        <div class= "row row-cols-lg-2">

            <div class= "col-lg-6 ">

                <div class= "col-8 col-lg-6">
                    <label class= "form-label fw-bolder" for="fecha">Fecha de la incidencia: <span class="text-danger">*</span></label>
                    <input class="form-control" type="date"  name="fecha" id="fecha"  value="{{old('fecha')}}" required>
                    <div class="invalid-feedback">Inserte una fecha válida. Debe ser anterior o igual a hoy.</div>
                        @if($errors->has('fecha'))
                            <div class='text-danger mens'>
                            {{$errors->first('fecha')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class= "col-lg-6 row  row-cols-lg-2">
                <input type="hidden" name="estado" id='estado' value='activo'/>

                <div class= "col-10 col-md-8 col-lg-6 mt-2 mt-lg-0">
                    <label class= "form-label fw-bolder me-2" for="cliente">Cliente:<span class="text-danger">*</span></label>

                    <select class="form-control" name="cliente" required id="cliente">
                        <option value="" selected hidden disabled>Selecciona cliente:</option>
                        @foreach($clientes as $cl)
                            @if($cl->user->fecha_baja == null || $cl->user->fecha_baja == "")
                            <option value="{{$cl->id}}" @if(old('cliente') === "{{$cl->id}}") selected @endif>{{$cl->user->nombre}}, {{$cl->user->apellido}}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Selecciona cliente</div>
                    @if($errors->has('cliente'))
                        <div class='text-danger mens'>
                        {{$errors->first('cliente')}}
                        </div>
                    @endif
                </div>
                <div class= "col-10 col-md-8 col-lg-6 mt-2 mt-lg-0">
                    <label class= "form-label fw-bolder me-2" for="estado">Tipo de incidencia:<span class="text-danger">*</span></label>

                    <select class="form-control" name="tipo" required id="tipo">
                        <option value="" selected hidden disabled>Elige una opción</option>
                        <option value="Medica" @if(old('tipo') === "Medica") selected @endif>Médica</option>
                        <option value="No medica" @if(old('tipo') === "No medica") selected @endif>No médica</option>
                    </select>
                    <div class="invalid-feedback">Selecciona el tipo de incidencia</div>
                    @if($errors->has('tipo'))
                        <div class='text-danger mens'>
                        {{$errors->first('tipo')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-3">
            <label class= "form-label fw-bolder" for="titulo">Título: <span class="text-danger">*</span></label>
            <input class="form-control" type="text" minlength='5' name="titulo" id="titulo" autofocus value="{{old('titulo')}}" required>
            <div class="invalid-feedback">El título es obligatorio (min. 5 carácteres).</div>
            @if($errors->has('titulo'))
                <div class='text-danger mens'>
                {{$errors->first('titulo')}}
                </div>
            @endif
        </div>
        <div class= "mt-3">
            <label class= "form-label fw-bolder" for="descripcion">Mensaje: <span class="text-danger">*</span></label>
            <textarea class= "form-control" name="descripcion" id='descrip' rows="10" cols="50" required>{{old('descripcion')}}</textarea>
            <div class="invalid-feedback">El mensaje es obligatorio.</div>
            @if($errors->has('descripcion'))
                <div class='text-danger mens'>
                {{$errors->first('descripcion')}}
                </div>
            @endif
        </div>

    </div>

    <button type="submit" class="btn btn-success text-warning mt-3 mb-3 float-end" name="enter" id="enter"><i class="bi bi-save"></i> Guardar</button>
    <a href= "{{route('incidencias.index')}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Volver</a>
</form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/valincidencia.js') }}" defer></script>

@endsection


