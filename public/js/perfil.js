$(document).ready(function () {
  $("#enter").on('click',function (event) {

    if ($("#pass").val() != $("#password_confirmation").val() || $("#pass").val() == '') {
      $("#password_confirmation").val("");
      event.preventDefault();
      event.stopPropagation();

    //   $("#password_confirmation").addClass("is-invalid");

    } else {

    //   $("#pass").removeClass("is-invalid");
    //   $("#password_confirmation").removeClass("is-invalid");

      $('#enter').attr('disabled','true');
      $('#enter').text('Enviando...');
      $('form').submit();

    }
    $(".needs-validation").addClass("was-validated");
  });


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

