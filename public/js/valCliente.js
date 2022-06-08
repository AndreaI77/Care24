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
            $('.mensf').removeClass('d-none');
        }else{
            let fecha=new Date($("#fecha_nacimiento").val());
            let hoy=new Date();
            if(hoy < fecha){
                event.preventDefault();
                event.stopPropagation();
                $data=false;
                $("#fecha_nacimiento").addClass('is-invalid');

            }else{
                $("#fecha_nacimiento").removeClass('is-invalid');
             }

       }
    }

      if ($("#SIP").val() !== "" ) {
          if(isNaN($("#SIP").val()) || $("#SIP").val().length < 6){
            event.preventDefault();
            event.stopPropagation();
            $data = false;
            $("#SIP").addClass('is-invalid');
          }else{
            $("#SIP").removeClass('is-invalid')
          }
      }

      if ($("#tel").val() == "" || $("#tel").val() == null) {
          event.preventDefault();
          event.stopPropagation();
          $data = false;
      } else {
        if (isNaN($("#tel").val()) || $("#tel").val().length != 9) {
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


      if($data == true){
          //console.log('hola');
        $('#enter').attr('disabled','true');
        $('#enter').text('Enviando...');
        $('form').submit();
      }
      $(".needs-validation").addClass("was-validated");
    });
  });

