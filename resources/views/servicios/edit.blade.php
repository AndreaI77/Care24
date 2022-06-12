@extends('template')
@section('title','Editar servicio')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('servicios.update', $servicio->id)}}" method="post"  novalidate >
    @csrf
    @method('PUT')
    <h1 class="bg-success bg-opacity-25 text-success text-center">Editar servicio</h1>
    <div class= "row g-3 p-3 ps-lg-5 pe-lg-5">
        <div class= "col-sm-6">
            <div class="row row-cols-md-2 ">
                <div class= "col-md-6">
                    @if(auth()->user()->tipo != 'Administrativo' )

                        <input class="form-control" type="hidden" name="tipo"  value="{{$servicio->tipo}}">
                    @endif

                        <label class= "form-label fw-bolder " for="tipo">Tipo del servicio:<span class="text-danger">*</span></label>

                        <select class="form-control" name="tipo" required id="tipo" @if(auth()->user()->tipo != 'Administrativo' )disabled @endif>

                            <option value="Limpieza" {{ $servicio->tipo === "Limpieza" ? 'selected' : ''}}>Limpieza</option>
                            <option value="Cuidados" @if( $servicio->tipo === "Cuidados") selected @endif>Cuidados</option>
                            <option value="Otros" @if($servicio->tipo === "Otros") selected @endif>Otros</option>
                        </select>

                </div>

                <div class= "mt-2 mt-md-0  col-md-6">
                    <label class= "form-label fw-bolder " for="estado">Estado:<span class="text-danger">*</span></label>
                    <select class="form-control" name="estado" required id="estado" @if(auth()->user()->tipo == 'cliente' )disabled @endif>

                        <option value="Pendiente" @if($servicio->estado === "Pendiente") selected @endif>Pendiente</option>
                        <option value="Atendido" @if($servicio->estado === "Atendido") selected @endif>Atendido</option>
                        @if(auth()->user()->tipo == 'Administrativo')
                        <option value="Archivado" @if($servicio->estado === "Archivado") selected @endif>Archivado</option>
                        @endif
                    </select>
                </div>
                @if(auth()->user()->tipo == 'cliente' )
                    <input class="form-control" type="hidden" name="estado"  value="{{$servicio->estado}}">
                @endif
            </div>
            <div class=" row row-cols-xl-2">
                <div class= "mt-2 col-xl-6">
                    <label class= "form-label fw-bolder " for="cliente">Cliente:<span class="text-danger">*</span></label>

                    <select class="form-control" name="cliente" required id="cliente" @if(auth()->user()->tipo == 'cliente' )disabled @endif>
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
                    @if(auth()->user()->tipo == 'cliente' )
                        <input class="form-control" type="hidden" name="cliente"  value="{{$servicio->cliente_id}}">
                    @endif
                </div>
                <div class= "mt-2 col-xl-6">
                    @if(auth()->user()->tipo != 'Administrativo')

                        <input type="hidden" name="empleado"   value="{{$servicio->empleado_id}}">
                    @endif

                        <label class= "form-label fw-bolder " for="empleado">Empleado: <span class="text-danger">*</span></label>

                        <select class="form-control" name="empleado" required id="empleado" @if(auth()->user()->tipo != 'Administrativo' )disabled @endif>
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
        </div>
        <div class= "col-sm-6">

            <div class= "col-md-6">
                <label class= "form-label fw-bolder " for="fecha">Fecha:<span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="fecha" id="fecha" value="{{$servicio->fecha}}" required @if(auth()->user()->tipo == 'cliente' )disabled @endif>
                <div class="invalid-feedback">La fecha es obligatoria</div>
                @if($errors->has('fecha'))
                    <div class='text-danger mens'>
                    {{$errors->first('fecha')}}
                    </div>
                @endif
                @if(auth()->user()->tipo == 'cliente' )
                    <input class="form-control" type="hidden" name="fecha"  value="{{$servicio->fecha}}">
                @endif
            </div>
            <div class="row row-cols-lg-2 ">
                <div class= "mt-2 col-sm-6">
                    <label class= "form-label fw-bolder me-2" for="hora_inicio">Desde:<span class="text-danger">*</span></label>
                    <input class="form-control" type="time" id="hora_inicio" name="hora_inicio"  value={{Carbon\Carbon::parse($servicio->hora_inicio)->format('H:i')}} required @if(auth()->user()->tipo == 'cliente' )disabled @endif>
                    <div class="invalid-feedback">La hora de inicio es obligatoria</div>
                    @if($errors->has('hora_inicio'))
                        <div class='text-danger mens'>
                        {{$errors->first('hora_inicio')}}
                        </div>
                    @endif
                    @if(auth()->user()->tipo == 'cliente' )
                        <input class="form-control" type="hidden" name="hora_inicio"  value="{{Carbon\Carbon::parse($servicio->hora_inicio)->format('H:i')}}">
                    @endif
                </div>
                <div class= "mt-2 col-sm-6">
                    <label class= "form-label fw-bolder me-2" for="hora_final">Hasta:<span class="text-danger">*</span></label>
                    <input class="form-control" type="time" id="hora_final" name="hora_final"  value={{Carbon\Carbon::parse($servicio->hora_final)->format('H:i')}} required @if(auth()->user()->tipo == 'cliente' )disabled @endif>
                    <div class="invalid-feedback">La hora final debe ser posterior a la hora inicial</div>
                    @if($errors->has('hora_final'))
                        <div class='text-danger mens'>
                        {{$errors->first('hora_final')}}
                        </div>
                    @endif
                    @if(auth()->user()->tipo == 'cliente' )
                        <input class="form-control" type="hidden" name="hora_final"  value="{{Carbon\Carbon::parse($servicio->hora_final)->format('H:i')}}">
                    @endif
                </div>
            </div>
        </div>
        <div class= "col-lg-6">
            <label class= "form-label fw-bolder" for="descripcion">Descripción:</label>
            <textarea class= "form-control" name="descripcion" rows="3" cols="50" @if(auth()->user()->tipo == 'cliente' )disabled @endif>{{Crypt::decryptString($servicio->descripcion)}}</textarea>
        </div>
        <div class= "col-lg-6">
            @if(auth()->user()->tipo == 'cliente')
            <div class= "col-md-6 ps-3">
                <div >
                    <label class= "form-label fw-bolder text-success fs-4" for="valoracion">Valoración:</label>

                    <div class="star_content fs-bolder form-check ms-3">

                            <input class="form-check-input" name="valoracion" value="5" type="radio"@if($servicio->valoracion == 5)checked @endif class="form-check-input"  @if(auth()->user()->tipo == 'cliente')required @endif/>
                            <label class="ms-2 form-check-label" for=valoracion>Muy satisfecho:</label><br/>


                        <input  class="form-check-input" name="valoracion" value="4" type="radio" @if($servicio->valoracion == 4)checked @endif class="form-check-input"  @if(auth()->user()->tipo == 'cliente')required @endif/>
                        <label class="ms-2 form-check-label" for=valoracion>Satisfecho:</label><br/>


                        <input class="form-check-input" name="valoracion" value="3" type="radio" @if($servicio->valoracion == 3)checked @endif class="form-check-input"  @if(auth()->user()->tipo == 'cliente')required @endif/>
                        <label class="ms-2 form-check-label" for=valoracion>Bien:</label><br/>


                        <input class="form-check-input" name="valoracion" value="2" type="radio" @if($servicio->valoracion == 2)checked @endif class="form-check-input"  @if(auth()->user()->tipo == 'cliente')required @endif/>
                        <label  class="ms-2 form-check-label" for=valoracion>Insatisfecho:</label><br/>


                        <input class="form-check-input" name="valoracion" value="1" type="radio" @if($servicio->valoracion == 1)checked @endif class="form-check-input"  @if(auth()->user()->tipo == 'cliente')required @endif/>
                        <label class="ms-2 form-check-label" for=valoracion>Muy insatisfecho:</label><br/>

                        <div class="invalid-feedback">Elige una opción</div>
                        @if($errors->has('valoracion'))
                            <div class='text-danger mens'>
                            {{$errors->first('valoracion')}}
                            </div>
                        @endif


                    </div>
                </div>
            </div>
            @endif
            <label class= "form-label fw-bolder" for="comentario">Comentario:</label>
            <textarea class= "form-control" name="comentario" rows="3" cols="50" @if(auth()->user()->tipo != "cliente") disabled @endif  @if(auth()->user()->tipo == 'cliente')required @endif>@if ($servicio->comentario != "" && $servicio->comentario != null ){{Crypt::decryptString($servicio->comentario)}}@endif</textarea>

        </div>




    </div>

    <button type="submit" class="btn btn-success text-warning mt-3 mb-3 float-end" name="enter" id="enter"><i class="bi bi-save"></i> Actualizar</button>
    <a href= "{{route('servicios.show', $servicio->id)}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Volver</a>
</form>

@endsection
@section('js')
    @if(auth()->user()->tipo == 'cliente')
    <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" ></script>
    @else
    <script type="text/javascript" src="{{ asset('js/valServiciosEdit.js') }}" ></script>
    @endif
    @if(auth()->user()->tipo == 'Administrativo')
        <script type="text/javascript" src="{{ asset('js/select.js') }}" ></script>
    @endif

@endsection

