@extends('template')
@section('title','Mapa')
@section('css')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
@endsection

@section('content')

    <h1 class="bg-success bg-opacity-25 text-success  text-center">Mapa</h1>
    <div class="d-flex justify-content-center p-0 mb-3">
        <div  style="width: 1400px; height:600px" class="mt-0  rounded shadow" id='map'></div>
        <style>
            .mapboxgl-popup {
                max-width: 200px;
                font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
                }
        </style>
    </div>
@endsection
@section('js')

<script type="text/javascript" src="{{ asset('js/mapa.js') }}" ></script>
@endsection


