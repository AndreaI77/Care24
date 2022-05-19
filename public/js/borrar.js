'use strict';
document.addEventListener('DOMContentLoaded', function(){


    let boton=document.getElementById('borrar');
    boton.addEventListener('click', function(event){
        if(confirm('Si elimina el registro, los datos no podrán ser recuperados.') == false){
            event.preventDefault();
        }
    });

}, false);
