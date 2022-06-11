@extends('template')
@section('title','Nuevo tratamiento')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('tratamientos.store')}}" method="post"  novalidate >
    @csrf
    <h1 class="bg-success bg-opacity-25 text-success text-center">Nuevo tratamiento</h1>
    <div class= "row g-3 p-3 ps-lg-5 pe-lg-5">

        <div class= "col-sm-6">

                <div class= "mt-2 col-lg-8">
                    <label class= "form-label fw-bolder " for="cliente">Cliente:<span class="text-danger">*</span></label>
                    <select class="form-control" name="cliente" required id="cliente">
                        <option value="" selected hidden disabled>Elige Cliente</option>
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
                <div class= "mt-2 col-lg-8">
                    <label class= "form-label fw-bolder " for="medicamento">Medicamento:<span class="text-danger">*</span></label>
                    <select class="form-control" name="medicamento" required id="medicamento">
                        <option value="" selected hidden disabled>Elige medicamento</option>
                        @foreach($medicamentos as $med)
                            <option value="{{$med->id}}" @if(old('medicamento') === "{{$med->id}}") selected @endif>{{Crypt::decryptString($med->nombre)}} ({{Crypt::decryptString($med->principio_ac)}}, {{$med->cantidad}} mg)</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Selecciona medicamento</div>
                    @if($errors->has('medicamento'))
                        <div class='text-danger mens'>
                        {{$errors->first('medicamento')}}
                        </div>
                    @endif
                </div>
                <div class='mt-4 '>
                    <a class="btn btn-outline-success mb-2 mt-2   pt-0 pb-0 " href="{{route('medicamentos.create')}}"> Nuevo medicamento</a>
                    <a class="btn btn-outline-success mb-2 mt-2 pt-0 pb-0" href="{{route('medicamentos.index')}}"> Borrar medicamento</a>
                </div>

        </div>
        <div class= "col-sm-6">
            <div class="row row-cols-md-2">

                <div class= "mt-2 col-md-6">
                    <label class= "form-label fw-bolder " for="cantidad">Cantidad:<span class="text-danger">*</span></label>
                    <input class="form-control" type="text"  id="cantidad" name="cantidad" pattern="([0-9]*[.])?[0-9]+" value="{{old('cantidad')}}" required>
                    <div class="invalid-feedback">La cantidad es obligatoria (valor numérico)</div>
                    @if($errors->has('cantidad'))
                        <div class='text-danger '>
                        {{$errors->first('cantidad')}}
                        </div>
                    @endif
                </div>
                <div class= "mt-2 col-md-6">
                    <label class= "form-label fw-bolder " for="hora">Hora de la toma:<span class="text-danger">*</span></label>
                    <input class="form-control" type="time" id="hora" name="hora"  value="{{old('hora')}}" required>
                    <div class="invalid-feedback">La hora es obligatoria</div>
                    @if($errors->has('hora'))
                        <div class='text-danger'>
                        {{$errors->first('hora')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row row-cols-lg-2">
                <div class= "mt-2 col-lg-6">
                    <label class= "form-label fw-bolder me-2" for="fecha_principio">Fecha principio:<span class="text-danger">*</span></label>
                    <input class="form-control" type="date" name="fecha_principio" id="fecha_principio" value="{{old('fecha_principio')}}" required>
                    <div class="invalid-feedback">La fecha del principio es obligatoria</div>
                    @if($errors->has('fecha_principio'))
                        <div class='text-danger mens'>
                        {{$errors->first('fecha_principio')}}
                        </div>
                    @endif
                </div>
                <div class= "mt-2 col-lg-6">
                    <label class= "form-label fw-bolder me-2" for="fecha_fin">Fecha final:</label>
                    <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" value="{{old('fecha_fin')}}">
                    <span class="">(no se indica en caso de tratamientos crónicos)</span>
                    <div class="invalid-feedback">La fecha final no puedes ser anterior a la fecha del principio</div>
                    @if($errors->has('fecha_fin'))
                        <div class='text-danger mens'>
                        {{$errors->first('fecha_fin')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class= "">
            <label class= "form-label fw-bolder" for="descripcion">Descripción:</label>
            <textarea class= "form-control" name="descripcion" rows="3" cols="50">{{old('descripcion')}}</textarea>
        </div>

    </div>

    <button type="submit" class="btn btn-success text-warning mt-3 mb-3 float-end" name="enter" id="enter"><i class="bi bi-save"></i> Guardar</button>
    <a href= "{{route('tratamientos.index')}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Volver</a>
</form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/valTratamiento.js') }}" ></script>

@endsection
