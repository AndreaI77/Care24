$(document).ready(function () {

    $("#enter").on('click',function (event) {
        $data = true;
      if ($("#nombre").val() == "" || $("#nombre").val() == null) {
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }else if($('#nombre').val().trim().length < 2){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

      if($('#apellido').val() == "" || $("#apellido").val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }else if($('#apellido').val().trim().length < 3){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

      if($('#domicilio').val() == "" || $("#domicilio").val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }else if($('#domicilio').val().trim().length < 10){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

      if($('#DNI').val() == "" || $('#DNI').val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }else if($('#DNI').val().trim().length < 8){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

      if($('#fecha_nacimiento').val() != "" && $('#fecha_nacimiento').val() != null ){
        if(isNaN(Date.parse($('#fecha_nacimiento').val()))){
            event.preventDefault();
            event.stopPropagation();
            $data=false;
            $("#fecha_nacimiento").addClass('is-invalid');

        }else{
            let fecha=new Date($("#fecha_nacimiento").val());
            let hoy=new Date();
            if(hoy < fecha){
                event.preventDefault();
                event.stopPropagation();
                $data=false;
                $("#fecha_nacimiento").addClass('is-invalid');

            }else{
                $("#fecha_nacimiento").removeClass('is-invalid')

                let edad = hoy.getFullYear() - fecha.getFullYear();
                let m = hoy.getMonth() - fecha.getMonth();
                if (m < 0 || (m === 0 && hoy.getDate() < fecha.getDate())) {
                    edad--;
                }
                if(edad < 16 ){
                    event.preventDefault();
                    event.stopPropagation();
                    $data=false;
                    alert("No se pueden contratar menores de 16 años.");
                }
            }
       }
    }


      if ($("#tel").val() == "" || $("#tel").val() == null) {
          event.preventDefault();
          event.stopPropagation();
          $data = false;
      } else {
        if (isNaN($("#tel").val()) || $("#tel").val().trim().length != 9) {
            event.preventDefault();
            event.stopPropagation();
            $data = false;
            $("#tel").addClass("is-invalid");
        } else {
            $("#tel").removeClass("is-invalid");
        }
      }

      if ($("#email").val() == "" || $("#email").val() == null) {
        event.preventDefault();
        event.stopPropagation();
        $data = false;
        $("#email").addClass("is-invalid");
    } else {
        if (/^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test($("#email").val()) != true){
            event.preventDefault();
            event.stopPropagation();
            $data = false;
            $("#email").addClass("is-invalid");
        }else{
            $("#email").removeClass("is-invalid");
        }

    }
    if($('#puesto').val() == "" || $('#puesto').val() == null){
      event.preventDefault();
      event.stopPropagation();
      $data=false;
    }


      if($data == true){
          //console.log('hola');
        $('#enter').attr('disabled','true');
        $('#enter').text('Enviando...');
        $('form').submit();
      }
      $(".needs-validation").addClass("was-validated");
    });
  });

