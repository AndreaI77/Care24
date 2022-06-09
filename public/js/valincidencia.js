$(document).ready(function () {

    $("#enter").on('click',function (event) {
        $data = true;
        if($('#fecha').val() != "" && $('#fecha').val() != null ){
            if(isNaN(Date.parse($('#fecha').val()))){
                event.preventDefault();
                event.stopPropagation();
                $data=false;
                $("#fecha").addClass('is-invalid');

            }else{
                let fecha=new Date($("#fecha").val());
                let hoy=new Date();
                if(hoy < fecha){
                    event.preventDefault();
                    event.stopPropagation();
                    $data=false;
                    $("#fecha").addClass('is-invalid');

                }else{
                    $("#fecha").removeClass('is-invalid');
                }
           }
        }
      if ($("#cliente").val() == "" || $("#cliente").val() == null) {
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }
      //console.log('espec: '+$data);
      if($('#tipo').val() == "" || $("#tipo").val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

     // console.log('tipo: '+$data);
      if($('#titulo').val() == "" || $("#titulo").val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }else if($('#titulo').val().trim().length < 5){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }
     // console.log('cliente: '+$data);
      if($('#descrip').val() == "" || $('#descrip').val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }else if($('#descrip').val().trim().length == 0){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
        $("#descrip").addClass('is-invalid');
      }else{
        $("#fecha").removeClass('is-invalid');
      }

     //8 console.log('lugar: '+$data);
      if($data == true){
          //console.log('hola');
        $('#enter').attr('disabled','true');
        $('#enter').text('Enviando...');
        $('form').submit();
      }
      $(".needs-validation").addClass("was-validated");
    });
  });

