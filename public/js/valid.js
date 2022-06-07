// Example starter JavaScript for disabling form submissions if there are invalid fields
document.addEventListener('DOMContentLoaded', function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
    var mens=document.querySelectorAll('.mens');
    mens.forEach(function(){
        this.classList.add('d-none');
    })
   // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {

            let f_n = document.getElementById("fecha_nacimiento");
            let fecha_nac = "";
            let fhoy = "";
            if(f_n != "" && f_n != null){
                fecha_nac = new Date(f_n.value);
                fhoy= new Date();
            }

            let f_a = document.getElementById("fecha_alta");
            let fecha_alt="";
            if(f_a != "" && f_a != null){
                fecha_alt = new Date(f_a.value);
            }

            let f_b = document.getElementById("fecha_baja");
            let fecha_baja="";
            if(f_b != "" && f_b != null){
                fecha_baja = new Date(f_b.value);
            }

           if( fecha_nac != "" && fecha_nac > fhoy ){
                f_n.classList.add('is-invalid');
                event.preventDefault()
                event.stopPropagation()
            }else if(fecha_alt > fecha_baja){
                f_b.classList.add('is-invalid');
                event.preventDefault()
                event.stopPropagation()
            }else if (!form.checkValidity()) {

                event.preventDefault()
                event.stopPropagation()
            }else{
                f_n.classList.remove('is-invalid');
                f_b.classList.remove('is-invalid');
                let boton=document.getElementById('enter');
                boton.disabled=true;
                boton.innerHTML="Enviando...";
            }

          form.classList.add('was-validated')
        }, false)
      });
      mens.forEach(function(){
        this.classList.remove('d-none');
    })
  });
