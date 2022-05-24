@extends('template')
@section('title','Editar servicio')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('servicios.update', $servicio->id)}}" method="post"  novalidate >
    @csrf
    @method('PUT')
    <h1 class="bg-success bg-opacity-25 text-success text-center">Editar servicio</h1>
    <div class= "row g-3 p-3">
        <div class= "col-sm-6">
            <div class= "">
                <label class= "form-label fw-bolder me-2" for="estado">Tipo del servicio:<span class="text-danger">*</span></label>

                <select name="tipo" required id="tipo">

                    <option value="Limpieza" {{ $servicio->tipo === "Limpieza" ? 'selected' : ''}}>Limpieza</option>
                    <option value="Cuidados" @if( $servicio->tipo === "Cuidados") selected @endif>Cuidados</option>
                    <option value="Otros" @if($servicio->tipo === "Otros") selected @endif>Otros</option>
                </select>

            </div>
            <div class= "mt-2">
                <label class= "form-label fw-bolder me-2" for="estado">Estado:<span class="text-danger">*</span></label>

                <select name="estado" required id="estado">

                    <option value="Pendiente" @if($servicio->estado === "Pendiente") selected @endif>Pendiente</option>
                    <option value="Atendido" @if($servicio->estado === "Atendido") selected @endif>Atendido</option>
                    <option value="Archivado" @if($servicio->estado === "Archivado") selected @endif>Archivado</option>
                </select>

            </div>
            <div class= "mt-2">
                <label class= "form-label fw-bolder me-2" for="cliente">Cliente:<span class="text-danger">*</span></label>

                <select name="cliente" required id="cliente">
                    <option value="" selected hidden disabled>Elige Cliente</option>
                    @foreach($clientes as $cl)
                        @if($cl->user->fecha_baja == null || $cl->user->fecha_baja == "")
                        <option value={{$cl->id}} @if($servicio->cliente_id == $cl->id) selected @endif>{{$cl->user->nombre}}, {{$cl->user->apellido}}</option>
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
            <div class= "mt-2">
                <label class= "form-label fw-bolder me-2" for="empleado">Empleado: <span class="text-danger">*</span></label>

                <select name="empleado" required id="empleado">
                    <option value="" selected hidden disabled>Selecciona empleado</option>
                    @foreach($empleados as $em)
                        @if(($em->user->fecha_baja == null || $em->user->fecha_baja == "") && $em->user_id != 1)
                        <option value="{{$em->id}};{{$em->puesto}}" @if($servicio->empleado_id  == $em->id) selected @endif >{{$em->user->nombre}}, {{$em->user->apellido}}</option>
                        @endif

                    @endforeach
                </select>
                <div class="invalid-feedback">Selecciona empleado</div>
                @if($errors->has('empleado'))
                    <div class='text-danger mens'>
                    {{$errors->first('empleado')}}
                    </div>
                @endif
            </div>
        </div>
        <div class= "col-sm-6">

            <div class= "d-flex ">
                <label class= "form-label fw-bolder me-2" for="fecha">Fecha:<span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="fecha" id="fecha" value="{{$servicio->fecha}}" required>
                <div class="invalid-feedback">La fecha es obligatoria</div>
                @if($errors->has('fecha'))
                    <div class='text-danger mens'>
                    {{$errors->first('fecha')}}
                    </div>
                @endif
            </div>
            <div class= "mt-2">
                <label class= "form-label fw-bolder me-2" for="hora_inicio">Desde:<span class="text-danger">*</span></label>
                <input type="time" id="hora_inicio" name="hora_inicio"  value={{Carbon\Carbon::parse($servicio->hora_inicio)->format('H:i')}} required>
                <div class="invalid-feedback">La hora de inicio es obligatoria</div>
                @if($errors->has('hora_inicio'))
                    <div class='text-danger mens'>
                    {{$errors->first('hora_inicio')}}
                    </div>
                @endif
            </div>
            <div class= "mt-2">
                <label class= "form-label fw-bolder me-2" for="hora_final">Hasta:<span class="text-danger">*</span></label>
                <input type="time" id="hora_final" name="hora_final"  value={{Carbon\Carbon::parse($servicio->hora_final)->format('H:i')}} required>
                <div class="invalid-feedback">La hora final es obligatoria</div>
                @if($errors->has('hora_final'))
                    <div class='text-danger mens'>
                    {{$errors->first('hora_final')}}
                    </div>
                @endif
            </div>
        </div>
        <div class= "col-lg-6">
            <label class= "form-label fw-bolder" for="descripcion">Descripción:</label>
            <textarea class= "form-control" name="descripcion" rows="3" cols="50">{{Crypt::decryptString($servicio->descripcion)}}</textarea>
        </div>
        <div class= "col-lg-6">
            <label class= "form-label fw-bolder" for="comentario">Comentario:</label>
            <textarea class= "form-control" name="comentario" rows="3" cols="50">{{Crypt::decryptString($servicio->comentario)}}</textarea>

        </div>
        {{-- <div class= "col-lg-6">
            <label class= "form-label fw-bolder" for="valoracion">Valoración:</label>
            <div class="star_content">
                <input name="rate" value="1" type="radio" class="star"/>
                <input name="rate" value="2" type="radio" class="star"/>
                <input name="rate" value="3" type="radio" class="star"/>
                <input name="rate" value="4" type="radio" class="star" checked="checked"/>
                <input name="rate" value="5" type="radio" class="star"/>
            </div>

        </div> --}}

    </div>

    <button type="submit" class="btn btn-success text-warning mt-3 mb-3 float-end" name="enter" id="enter"><i class="bi bi-save"></i> Actualizar</button>
    <a href= "{{route('servicios.show', $servicio->id)}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Volver</a>
</form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/select.js') }}" ></script>


@endsection

