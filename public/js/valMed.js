$(document).ready(function () {

    $("#enter").on('click',function (event) {
        $data = true;

      if($('#nombre').val() == "" || $("#nombre").val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

      if($('#principio').val() == "" || $('#principio').val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }
      if($('#cantidad').val() == "" || $('#cantidad').val() == null || isNaN($('#cantidad').val())){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
        $("#descrip").addClass('is-invalid');
    }else{
      $("#descrip").removeClass('is-invalid');
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
