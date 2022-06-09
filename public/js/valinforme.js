$(document).ready(function () {

    $("#enter").on('click',function (event) {
        $data = true;

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
        $("#fecha").removeClass('is-invalid')
      }

     // console.log('lugar: '+$data);
      if($data == true){
          //console.log('hola');
        $('#enter').attr('disabled','true');
        $('#enter').text('Enviando...');
        $('form').submit();
      }
      $(".needs-validation").addClass("was-validated");
    });
  });

