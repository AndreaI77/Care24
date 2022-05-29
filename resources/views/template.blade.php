<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('img/logo2Trans.png') }}" type="image/x-icon">
    @yield('css')
    <title>@yield('title')</title>
</head>
<body class="bg-white d-flex flex-column min-vh-100 ">

        {{-- inserting navigation bar --}}
        @include('partials.nav')

    <main class="container pt-2 ">
        @include('partials.menu')
        {{-- @include('partials.comentarios') --}}
        {{-- <p class="float-end">{{currentDate("d/m/Y")}} </p> --}}
        @include('flash-message')
        @yield('content')
    </main>
        @include('partials.footer')
        <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        {{-- <script type="text/javascript" src="{{ asset('js/comentarios.js') }}" defer></script> --}}
        @yield("js")

</body>
</html>
