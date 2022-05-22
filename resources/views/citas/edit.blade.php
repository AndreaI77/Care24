@extends('template')
@section('title','Editar cita')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('citas.update', $cita->id)}}" method="post"  novalidate >
    @csrf
    @method('PUT')
    <h1 class="bg-success bg-opacity-25 text-success text-center">Editar cita médica</h1>
    <div class= "row g-3 p-3">
        <div class= "col-sm-6">
            <div class= "">

                <label class= "form-label fw-bolder me-2" for="estado">Especialidad:<span class="text-danger">*</span></label>

                <select name="especialidad" required id="especialidad" >
                    <option value="" selected hidden disabled>Elige especialidad</option>
                    @foreach($especialidades as $es)
                        <option value="{{$es->id}}" @if("{{$cita->especialidad_id}}" == "{{$es->id}}") selected @endif>{{Crypt::decryptString($es->nombre)}}</option>

                    @endforeach
                </select>
                <div class="invalid-feedback">Selecciona especialidad</div>
                @if($errors->has('especialidad'))
                    <div class='text-danger mens'>
                    {{$errors->first('especialidad')}}
                    </div>
                @endif
                <div class='mt-2'>
                    <a class="btn btn-outline-success mb-2 me-2 pt-0 pb-0" href="{{route('especialidades.create')}}"> Nueva especialidad</a>
                    <a class="btn btn-outline-success mb-2 me-2 pt-0 pb-0" href="{{route('especialidades.index')}}"> Borrar especialidad</a>
                </div>
            </div>
            <div class= "mt-2">
                <label class= "form-label fw-bolder me-2" for="estado">Estado:<span class="text-danger">*</span></label>

                <select name="estado" required id="estado">

                    <option value="Pendiente" @if($cita->servicio->estado === "Pendiente") selected @endif>Pendiente</option>
                    <option value="Atendido" @if($cita->servicio->estado === "Atendido") selected @endif>Atendido</option>
                    <option value="Archivado" @if($cita->servicio->estado === "Archivado") selected @endif>Archivado</option>
                </select>

            </div>
            <div class= "mt-2">
                <label class= "form-label fw-bolder me-2" for="cliente">Cliente:<span class="text-danger">*</span></label>

                <select name="cliente" required id="cliente">
                    <option value="" selected hidden disabled>Elige Cliente</option>
                    @foreach($clientes as $cl)
                        @if($cl->user->fecha_baja == null || $cl->user->fecha_baja == "")
                        <option value={{$cl->id}} @if($cita->servicio->cliente_id == $cl->id) selected @endif>{{$cl->user->nombre}}, {{$cl->user->apellido}}</option>
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
                        @if($em->user->fecha_baja == null || $em->user->fecha_baja == "")
                        <option value={{$em->id}} @if($cita->servicio->empleado_id  == $em->id) selected @endif >{{$em->user->nombre}}, {{$em->user->apellido}}</option>
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
                <input class="form-control" type="date" name="fecha" id="fecha" value="{{$cita->servicio->fecha}}" required>
                <div class="invalid-feedback">La fecha es obligatoria</div>
                @if($errors->has('fecha'))
                    <div class='text-danger mens'>
                    {{$errors->first('fecha')}}
                    </div>
                @endif
            </div>
            <div class="row row-cols-lg-2">
                <div class= "mt-2">
                    <label class= "form-label fw-bolder me-2" for="hora_inicio">Hora de recogida:<span class="text-danger">*</span></label>
                    <input type="time" id="hora_inicio" name="hora_inicio"  value={{Carbon\Carbon::parse($cita->servicio->hora_inicio)->format('H:i')}} required>
                    <div class="invalid-feedback">La hora de inicio es obligatoria</div>
                    @if($errors->has('hora_inicio'))
                        <div class='text-danger mens'>
                        {{$errors->first('hora_inicio')}}
                        </div>
                    @endif
                </div>
                <div class= "mt-2">
                    <label class= "form-label fw-bolder me-2" for="hora_final">Hora final (aprox.):<span class="text-danger">*</span></label>
                    <input type="time" id="hora_final" name="hora_final"  value={{Carbon\Carbon::parse($cita->servicio->hora_final)->format('H:i')}} required>
                    <div class="invalid-feedback">La hora final es obligatoria</div>
                    @if($errors->has('hora_final'))
                        <div class='text-danger mens'>
                        {{$errors->first('hora_final')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class= "mt-2">
                <label class= "form-label fw-bolder me-2" for="hora_cita">Hora cita:<span class="text-danger">*</span></label>
                <input type="time" id="hora_cita" name="hora_cita"  value="{{Carbon\Carbon::parse($cita->hora_cita)->format('H:i')}}" required>
                <div class="invalid-feedback">La hora de la cita es obligatoria</div>
                @if($errors->has('hora_cita'))
                    <div class='text-danger mens'>
                    {{$errors->first('hora_cita')}}
                    </div>
                @endif
            </div>
            <div class= "col-lg-6">
                <label class= "form-label fw-bolder mt-2" for="Lugar">Lugar:<span class="text-danger">*</span></label>
                <input type="text" id="lugar" name="lugar"  value="{{$cita->lugar}}" required>
                <div class="invalid-feedback">El lugar es obligatorio</div>
                @if($errors->has('lugar'))
                    <div class='text-danger mens'>
                    {{$errors->first('lugar')}}
                    </div>
                @endif
            </div>
        </div>
        <div class= "col-lg-6">
            <label class= "form-label fw-bolder" for="descripcion">Descripción:</label>
            <textarea class= "form-control" name="descripcion" rows="3" cols="50" >{{Crypt::decryptString($cita->servicio->descripcion)}}</textarea>
        </div>
        <div class= "col-lg-6">
            <label class= "form-label fw-bolder" for="comentario">Comentario:</label>
            <textarea class= "form-control" name="comentario" rows="3" cols="50" @if(auth()->user()->tipo !== 'cliente') disabled @endif>{{Crypt::decryptString($cita->servicio->comentario)}}</textarea>

        </div>

    </div>

    <button type="submit" class="btn btn-success text-warning mt-3 mb-3 float-end" name="enter" id="enter"><i class="bi bi-save"></i> Actualizar</button>
    <a href= "{{route('citas.show', $cita->id)}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Salir sin guardar</a>
</form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" defer></script>
@endsection

