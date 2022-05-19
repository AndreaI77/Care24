<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>email</title>
</head>
<body class="p-3" >
    <h4 class=" text-success  fs-4 mb-3">Aviso de registro</h4>
    <div class="p-3">
        <p>Ha sido registrad@ como usuario en la página web de Care24.
            <br/>
            Se ha generado su contraseña de acceso: <span class= 'text-primary fw-bolder'>{{$details['password']}}</span>
            <br/>
            <br/>
            Puede acceder con su DNI/NIE y la contraseña generada.
        </p>
        <p>
            Se recomienda cambiar la contraseña en las opciones de perfil.
            <br/>
            En caso de no poder acceder a la aplicación, avise a Care24, para revisar los datos proporcionados a la empresa.
        </p>
        <p>Gracias por confiar en nosotros.
            <br/>
            El equipo de Care24.
        </p>
    </div>

    <div>
        <div class="text-center">
            -----------------------------------------------------------------------------------
            {{-- <img src="{{asset('img/logo2Trans.png')}}" alt="logo empresa" width='400'/> --}}
        </div>
       <div class="text-secondary small">
        <p  ><strong >Advertencia importante </strong><br/>
            Este mensaje contiene información confidencial y/o privilegiada.
            Si usted no es el destinatario, o una persona autorizada por el destinatario para recibir este mensaje,
            no debe utilizar, copiar, reenviar, divulgar o realizar cualquier acción basada en este mensaje
            o en la información que contenga. Si hubiera recibido este mensaje por error,
            por favor informe al remitente lo antes posible respondiendo al correo y elimine este mensaje.
            Muchas Gracias.
        </p>
        <p><strong>Important notice  </strong><br/>
            This message contains confidential and/or privileged information.
            If you are not the addressee or authorized to receive this for the addressee,
            you must not use, copy, forward, disclose or take any action based on this message or any information herein.
            If you receive this message in error, please advise the sender immediately by reply e-mail and delete this message.
            Thank you for your cooperation.
        </p>
        <p><strong>Política de Protección de Datos de Carácter Personal</strong><br/>
            En cumplimiento de la Ley Orgánica 15/1999, de 13 de diciembre, sobre protección de Datos de Carácter Personal (LOPD) Care24 S.L.N.E informa
            a los usuarios de que los Datos de Carácter Personal que recoge son objeto de tratamiento automatizado
            y se incorporan en los ficheros correspondientes, debidamente registrados en la Agencia Española de Protección de Datos.
            <br/>

            En virtud de lo establecido en la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico,
            Care24 S.L.N.E. informa que podrá utilizar las direcciones de correo electrónico facilitadas por usted,
            para mantenerle informado de sus novedades comerciales y sus distintas ofertas promocionales.
            Usted da su consentimiento expreso para que Care24 S.L.N.E. pueda utilizar su dirección de correo electrónico con este fin concreto.
            <br/>

            El usuario podrá, en todo momento, ejercitar los derechos reconocidos en la LOPD, de acceso, rectificación, cancelación
            y oposición. El ejercicio de estos derechos puede realizarlo el propio usuario acompañando copia del DNI de manera
            presencial en la oficina de Care24 S.L.N.E. o mediante comunicación escrita a la siguiente dirección postal Calle de Jupiter 10, 03501 Benidorm (Alicante).
        </p>
       </div>

    </div>


</body>
</html>
