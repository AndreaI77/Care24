'use strict';
document.addEventListener('DOMContentLoaded', function(){


    let botones=document.getElementsByName('borrar');
    console.log(botones.length);

    for(let boton of botones){

        boton.addEventListener('click', function(event){
            if(confirm('Si elimina el registro, los datos no podrán ser recuperados.') == false){
                event.preventDefault();
            }
        });
    }

}, false);
