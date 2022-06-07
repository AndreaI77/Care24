@extends('template')
@section('title','Editar')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('incidencias.update', $incidencia->id)}}" method="post"  novalidate >
    @csrf
    @method('PUT')
    <h1 class="bg-success bg-opacity-25 text-success text-center">Actualizar incidencia</h1>
    <div class= " p-3 ps-lg-5 pe-lg-5">
        <h4> Autor: {{ $incidencia->empleado->user->nombre }}, {{ $incidencia->empleado->user->apellido }}</h4>
        <div class= "row row-cols-lg-2">
            <div class= "col-lg-6 row row-cols-sm-2">
                <div class= "col-lg-6">
                    <label class= "form-label fw-bolder " for="cliente">Cliente:<span class="text-danger">*</span></label>
                    <select class="form-control" name="cliente" required id="cliente">
                        @foreach($clientes as $cl)
                            @if($cl->user->fecha_baja == null || $cl->user->fecha_baja == "")
                            <option value="{{$cl->id}}" @if("{{$incidencia->cliente_id}}" === "{{$cl->id}}") selected @endif>{{$cl->user->nombre}}, {{$cl->user->apellido}}</option>
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
                <div class= "col-lg-6 mt-2 mt-sm-0">
                    <label class= "form-label fw-bolder" for="fecha">Fecha de la incidencia: <span class="text-danger">*</span></label>
                    <input class="form-control " type="date"  name="fecha" id="fecha"  value="{{$incidencia->fecha}}" required>
                    <div class="invalid-feedback">La fecha es obligatoria .</div>
                    @if($errors->has('fecha'))
                        <div class='text-danger mens'>
                        {{$errors->first('fecha')}}
                        </div>
                    @endif
                </div>

            </div>
            <div class= "col-lg-6 row row-cols-sm-2">
                <div class= "col-lg-6 mt-2 mt-lg-0 ">
                    <label class= "form-label fw-bolder" for="estado">Estado:<span class="text-danger">*</span></label>
                    <select class="form-control" name="estado" required id="estado">
                        <option value="Activo" @if($incidencia->estado === "Activo") selected @endif>Activo</option>
                        @if(auth()->user()->tipo == 'Administrativo')
                            <option value="Archivado" @if($incidencia->estado === "Archivado") selected @endif>Archivado</option>
                        @endif
                    </select>
                </div>
                <div class= "col-lg-6 mt-2 mt-lg-0">
                    <label class= "form-label fw-bolder" for="estado">Tipo de incidencia:<span class="text-danger">*</span></label>

                    <select class="form-control" name="tipo" required id="tipo">
                        <option value="" selected hidden disabled>Elige una opción</option>
                        <option value="Médica" @if($incidencia->tipo === "Médica") selected @endif>Médica</option>
                        <option value="No médica" @if($incidencia->tipo === "No médica") selected @endif>No médica</option>
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

        <div class= "mt-3">
            <label class= "form-label fw-bolder" for="titulo">Título: <span class="text-danger">*</span></label>
            <input class="form-control " type="text" minLength='5' name="titulo" id="titulo"  value="{{Crypt::decryptString($incidencia->titulo)}}" required>
            <div class="invalid-feedback">El título es obligatorio (min. 5 carácteres).</div>
            @if($errors->has('titulo'))
                <div class='text-danger mens'>
                {{$errors->first('titulo')}}
                </div>
            @endif
        </div>
        <div class= "mt-3">
            <label class= "form-label fw-bolder" for="descripcion">Mensaje: <span class="text-danger">*</span></label>
            <textarea class= "form-control" name="descripcion" rows="10" cols="50" required>{{Crypt::decryptString($incidencia->descripcion)}}</textarea>
            <div class="invalid-feedback">El mensaje es obligatorio.</div>
            @if($errors->has('descripcion'))
                <div class='text-danger mens'>
                {{$errors->first('descripcion')}}
                </div>
            @endif
        </div>

    </div>

    <button type="submit" class="btn btn-success text-warning mt-3 mb-3 float-end" name="enter" id="enter"><i class="bi bi-save"></i> Guardar</button>
    <a href= "{{route('incidencias.show',$incidencia->id)}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Salir sin guardar</a>
</form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" defer></script>

@endsection



