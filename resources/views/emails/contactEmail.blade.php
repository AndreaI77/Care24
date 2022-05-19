<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h3>{{$details['title']}}</h3>


    <h4>Detalles: </h4><br>

    <p>Nombre:   {{$details['nombre']}}
        <br/>
        Apellidos:   {{$details['apellidos']}}
        <br/>
        Email:   {{$details['email']}}
        <br/>
        Teléfono:   {{$details['tel']}}
        <br/>
        Mensaje:   {{$details['mensaje']}}
    </p>


</body>
</html>
