$(document).ready(function () {

    $("#enter").on('click',function (event) {
        $data = true;
      if ($("#especialidad").val() == "" || $("#especialidad").val() == null) {
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

      if($('#estado').val() == "" || $("#estado").val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

      if($('#cliente').val() == "" || $("#cliente").val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

      if($('#empleado').val() == "" || $('#empleado').val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

      if($('#fecha').val() == "" || $('#fecha').val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;

      }else if(isNaN(Date.parse($('#fecha').val()))){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }


      if ($("#hora_inicio").val() == "" || $("#hora_inicio").val() == null) {
          event.preventDefault();
          event.stopPropagation();
          $data = false;

      }

      if ($("#hora_final").val() == "" || $("#hora_final").val() == null) {
          event.preventDefault();
          event.stopPropagation();
          $data = false;
      } else {
        if ($("#hora_inicio").val() != ""){
            let hi = $("#hora_inicio").val().split(":");
            let hf = $("#hora_final").val().split(":");

            if (hi[0] > hf[0] || (hi[0] == hf[0] && hi[1] >= hf[1])) {
                event.preventDefault();
                event.stopPropagation();
                $data = false;
                $("#hora_final").addClass('is-invalid');
            }else{
                $("#hora_final").removeClass('is-invalid');
            }
        }
      }

      if ($("#hora_cita").val() == "" || $("#hora_cita").val() == null) {
        event.preventDefault();
        event.stopPropagation();
        $data = false;
    } else {
        if ($("#hora_inicio").val() != ""){
            let hi = $("#hora_inicio").val().split(":");
            let hc = $("#hora_cita").val().split(":");

            if (hi[0] > hc[0] || (hi[0] == hc[0] && hi[1] > hc[1])) {
                event.preventDefault();
                event.stopPropagation();
                $data = false;

                $("#hora_inicio").addClass('is-invalid');
            }else{
                $("#hora_inicio").removeClass('is-invalid');
            }

        }

        if ($("#hora_final").val() != ""){
            let hf = $("#hora_final").val().split(":");
            let hc = $("#hora_cita").val().split(":");

            if (hf[0] < hc[0] || (hf[0] == hc[0] && hf[1] <= hc[1])) {
                event.preventDefault();
                event.stopPropagation();
                $data = false;
              $("#hora_cita").addClass('is-invalid');
            }else{
                $("#hora_cita").removeClass('is-invalid');
            }
        }
    }

      if($('#lugar').val() == "" || $('#lugar').val() == null){
        event.preventDefault();
        event.stopPropagation();
        $data=false;
      }

      if($data == true){

        $('#enter').attr('disabled','true');
        $('#enter').text('Enviando...');
        $('form').submit();
      }
      $(".needs-validation").addClass("was-validated");
    });

    $('#hora_inicio').on('change', function(event){
        let hi = $("#hora_inicio").val().split(":");
        if ($("#hora_final").val() != ""){

            let hf = $("#hora_final").val().split(":");
            if (hi[0] > hf[0] || (hi[0] == hf[0] && hi[1] >= hf[1])) {

                $("#hora_final").addClass('is-invalid');
            }else{
                $("#hora_final").removeClass('is-invalid');
            }
        }
        if ($("#hora_cita").val() != ""){

            let hc = $("#hora_cita").val().split(":");

            if (hi[0] > hc[0] || (hi[0] == hc[0] && hi[1] > hc[1])) {

                $("#hora_cita").addClass('is-invalid');
            }else{
                $("#hora_cita").removeClass('is-invalid');
            }
        }
    });
    $('#hora_final').on('change', function(){
        $("#hora_final").removeClass('is-invalid');
        let hf = $("#hora_final").val().split(":");
        if ($("#hora_inicio").val() != ""){
            let hi = $("#hora_inicio").val().split(":");

            if (hi[0] > hf[0] || (hi[0] == hf[0] && hi[1] >= hf[1])) {
                $("#hora_final").addClass('is-invalid');
            }else{
                $("#hora_final").removeClass('is-invalid');
            }
        }
        if ($("#hora_cita").val() != ""){
            let hc = $("#hora_cita").val().split(":");

            if (hf[0] < hc[0] || (hf[0] == hc[0] && hf[1] < hc[1])) {

              $("#hora_cita").addClass('is-invalid');
            }else{
                $("#hora_cita").removeClass('is-invalid');
            }
        }
    });
    $('#hora_cita').on('change',function(){
        $("#hora_final").removeClass('is-invalid');
        $("#hora_cita").removeClass('is-invalid');
        let hc = $("#hora_cita").val().split(":");
        if ($("#hora_inicio").val() != ""){
            let hi = $("#hora_inicio").val().split(":");


            if (hi[0] > hc[0] || (hi[0] == hc[0] && hi[1] >= hc[1])) {

                $("#hora_cita").addClass('is-invalid');
            }else{
                $("#hora_cita").removeClass('is-invalid');
            }
        }
        if ($("#hora_final").val() != ""){
            let hf = $("#hora_final").val().split(":");
            if (hf[0] < hc[0] || (hf[0] == hc[0] && hf[1] < hc[1])) {

              $("#hora_final").addClass('is-invalid');
            }else{
                $("#hora_final").removeClass('is-invalid');
            }
        }
    });
  });

