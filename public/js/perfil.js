$(document).ready(function () {

  //VALIDAR COINCIDENCIA DE LAS 2 PASSWORDS
  $("#enter").on('click',function (event) {

    //SI NO COINCIDEN O ESTAN VACÍAS:
    if ($("#pass").val() != $("#password_confirmation").val() || $("#pass").val() == '') {
      $("#password_confirmation").val("");
      event.preventDefault();
      event.stopPropagation();
      console.log("Las contraseñas no coinciden");

    } else {

      $("#pass").addClass("is-valid");
      $("#password_confirmation").addClass("is-valid");

      $('enter').attr('disabled','true');
      $('enter').text('Enviando...');

    }
    $(".needs-validation").addClass("was-validated");
  });

  //OCULTA/MUESTRA LOS CAMPOS CONTRASEÑA
  $("#chbox").on('change',valueChanged);
  $("#passwords").hide();
  function valueChanged() {
    if ($('#chbox').is(":checked"))
      $("#passwords").show();
    else
      $("#passwords").hide();
    $("#pass").val("");
    $("#password_confirmation").val("");
  }

});

