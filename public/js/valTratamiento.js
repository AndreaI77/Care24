$(document).ready(function () {

    $("#enter").on('click',function (event) {
        $data = true;

        if($('#cliente').val() == "" || $("#cliente").val() == null){
            event.preventDefault();
            event.stopPropagation();
            $data=false;
          }

      if ($("#medicamento").val() == "" || $("#medicamento").val() == null) {
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

      if($("#cantidad").val() == "" || $("#cantidad").val() == null) {
        console.log($('#cantidad').val());
        event.preventDefault();
        event.stopPropagation();
        $data=false;

      }else if(isNaN($("#cantidad").val())){
        event.preventDefault();
        event.stopPropagation();
        $data=false

        $("#cantidad").addClass('is-invalid');
    }else{
        $("#cantidad").removeClass('is-invalid');
    }

    if ($("#hora").val() == "" || $("#hora").val() == null) {
        event.preventDefault();
        event.stopPropagation();
        $data = false;
    }

      if($('#fecha_principio').val() == "" || $('#fecha_principio').val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }else if(isNaN(Date.parse($('#fecha_principio').val()))){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }
      //console.log('5'+$data);
      if($('#fecha_fin').val() != "" && $('#fecha_fin').val() !== null){

        if(isNaN(Date.parse($('#fecha_fin').val()))){
            event.preventDefault();
            event.stopPropagation();
            $data=false;
            $("#fecha_fin").addClass('is-invalid');
        }else{
            if($('#fecha_principio').val() !== ""){
                let pri =new Date($('#fecha_principio').val());
                let fin=new Date($('#fecha_fin').val());
                if(pri>fin){
                    event.preventDefault();
                    event.stopPropagation();
                    $data=false;
                    $("#fecha_fin").addClass('is-invalid');
                }else{
                    $("#fecha_fin").removeClass('is-invalid');
                }
            }
        }
      }
      //console.log('6'+$data);
      if($data == true){

        $('#enter').attr('disabled','true');
        $('#enter').text('Enviando...');
        $('form').submit();
      }
      $(".needs-validation").addClass("was-validated");
    });
    $('#fecha_fin').on('change', function(){
        if($('#fecha_fin').val() == "" || $('#fecha_fin').val() == null){
            $("#fecha_fin").removeClass('is-invalid');

        }else if(isNaN(Date.parse($('#fecha_fin').val()))){

            $("#fecha_fin").addClass('is-invalid');
        }else{
            if($('#fecha_principio').val() !== ""){
                let pri =new Date($('#fecha_principio').val());
                let fin=new Date($('#fecha_fin').val());
                if(pri>fin){
                    $("#fecha_fin").addClass('is-invalid');
                }else{
                    $("#fecha_fin").removeClass('is-invalid');
                }
            }
        }
    });
    $('#fecha_principio').on('change', function(){
        if(isNaN(Date.parse($('#fecha_principio').val()))){

            $("#fecha_principio").addClass('is-invalid');
        }else{
            if($('#fecha_fin').val() == "" || $('#fecha_fin').val() == null){
                $("#fecha_fin").removeClass('is-invalid');

            }else if($('#fecha_fin').val() !== ""){
                let pri =new Date($('#fecha_principio').val());
                let fin=new Date($('#fecha_fin').val());
                if(pri>fin){
                    $("#fecha_fin").addClass('is-invalid');
                }else{
                    $("#fecha_fin").removeClass('is-invalid');
                }
            }
        }
    });
});

