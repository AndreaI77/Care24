'use strict';
document.addEventListener('DOMContentLoaded', function(){

    let boton=document.getElementById('enter');
    boton.addEventListener('click', function(event){
        if(confirm('¿Quiere guardar el informe?\nNo podrá eliminarlo, ni editar los datos.') == false){
            event.preventDefault();
        }
    });

}, false);
