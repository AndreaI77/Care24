'use strict'

window.addEventListener('DOMContentLoaded', function () {
   
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }else{
           // alert("El formulario ha sido enviado");
            let boton=document.getElementById('enter');
            boton.disabled=true;
            boton.innerHTML="Enviando...";
            //alert("Su formulario se ha enviado.")
            //location.href="index.html";
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  });