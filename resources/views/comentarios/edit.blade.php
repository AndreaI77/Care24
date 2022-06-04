@extends('template')
@section('title','Editar servicio')
@section('content')

<form class="bg-light border rounded needs-validation" action="{{route('comentarios.update', $servicio->id)}}" method="post"  novalidate >
    @csrf
    @method('PUT')
    <h1 class="bg-success bg-opacity-25 text-success text-center">Valorar el servicio:</h1>
    <div class= 'row row-cols-sm-2  p-2 '>
        <div class= " col-md-6 ps-3 ">
            <p><span class="fw-bolder">Cliente:  </span>{{$servicio->cliente->user->nombre}}, {{$servicio->cliente->user->apellido}} </p>
            <p><span class="fw-bolder">Empleado:  </span>{{$servicio->empleado->user->nombre}}, {{$servicio->empleado->user->apellido}} </p>
            <p><span class="fw-bolder">Estado:  </span>{{$servicio->estado}} </p>
            <p><span class="fw-bolder">Tipo:  </span>{{$servicio->tipo}} </p>
            <p><span class="fw-bolder">Fecha:  </span>{{Carbon\Carbon::parse($servicio->fecha)->format('d/m/Y')}} </p>
            <p><span class="fw-bolder">Desde: </span> {{Carbon\Carbon::parse($servicio->hora_inicio)->format('H:i')}}</p>
            <p><span class="fw-bolder">Hasta: </span> {{Carbon\Carbon::parse($servicio->hora_final)->format('H:i')}}</p>
        </div>

        <div class= "col-md-6 ps-3">
            <div >
                <label class= "form-label fw-bolder text-success fs-4" for="valoracion">Valoración:</label>

                <div class="star_content fs-bolder  ms-3">

                        <input name="valoracion" value="5" type="radio"@if($servicio->valoracion == 5)checked @endif class="form-check-input" required/>
                        <label class="ms-2 form-check-label" for=valoracion>Muy satisfecho:</label><br/>


                    <input name="valoracion" value="4" type="radio" @if($servicio->valoracion == 4)checked @endif class="form-check-input" required/>
                    <label class="ms-2 form-check-label" for=valoracion>Satisfecho:</label><br/>


                    <input name="valoracion" value="3" type="radio" @if($servicio->valoracion == 3)checked @endif class="form-check-input" required/>
                    <label class="ms-2 form-check-label" for=valoracion>Bien:</label><br/>


                    <input name="valoracion" value="2" type="radio" @if($servicio->valoracion == 2)checked @endif class="form-check-input" required/>
                    <label  class="ms-2 form-check-label" for=valoracion>Insatisfecho:</label><br/>


                    <input name="valoracion" value="1" type="radio" @if($servicio->valoracion == 1)checked @endif class="form-check-input" required/>
                    <label class="ms-2 form-check-label" for=valoracion>Muy insatisfecho:</label><br/>

                    <div class="invalid-feedback">Elige una opción</div>
                    @if($errors->has('valoracion'))
                        <div class='text-danger mens'>
                        {{$errors->first('valoracion')}}
                        </div>
                    @endif


                </div>

            </div>
            <div class= "">
                <label class= "form-label fw-bolder text-success fs-4" for="comentario">Comentario:</label>
                <textarea class= "form-control" name="comentario" rows="4" cols="50" required>{{Crypt::decryptString($servicio->comentario)}}</textarea>
                <div class="invalid-feedback">Escribe un comentario.</div>
                @if($errors->has('comentario'))
                    <div class='text-danger mens'>
                    {{$errors->first('comentario')}}
                    </div>
                @endif
            </div>
        </div>
        <div class= " col-md-6 ps-3 mt-3 ">
            <p><span class="fw-bolder"> Descripción:  <br/></span>{{Crypt::decryptString($servicio->descripcion)}} </p>
        </div>
    </div>

    <button type="submit" class="btn btn-success text-warning mt-3 mb-3 float-end" name="enter" id="enter"><i class="bi bi-save"></i> Valorar</button>
    @if($servicio->tipo == 'Cita médica')
    <a href= "{{route('citas.index')}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Volver</a>
    @else
    <a href= "{{route('servicios.index')}}" class="btn btn-outline-success  m-3 float-end"><i class="bi bi-arrow-left"></i> Volver</a>
    @endif
</form>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/val_bootstrap.js') }}" defer></script>
@endsection
