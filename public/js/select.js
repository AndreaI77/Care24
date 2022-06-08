'use strict'
document.addEventListener('DOMContentLoaded', function(){
    let tipo= document.getElementById('tipo');
    let select = document.getElementById('empleado').options;
    let seleccionado= document.getElementById('empleado').value;

        let limpieza=[{"value": "", "text": "Selecciona empleado"}];
        let cuidados=[{"value": "", "text": "Selecciona empleado"}];
        let otros=[{"value": "", "text": "Selecciona empleado"}];
        for(let item of select){
            let val= item.value;
            if(val != "" && val != null ){
                let e = val.split(";");
                let elemento =[];
                if(e[1] == "Limpiador"){
                    elemento ={"value": item.value, "text": item.text};
                    limpieza.push(elemento);
                }else if(e[1] == "Cuidador"){
                    elemento ={"value": item.value, "text": item.text};
                    cuidados.push(elemento);
                }else if(e[1] == "Administrativo"){
                    elemento ={"value": item.value, "text": item.text};

                    otros.push(elemento);
                }
            }
        }
    cambiar();
    tipo.addEventListener('change', cambiar, false);

    function cambiar(){
        let empleado = document.getElementById('empleado');
        let select = empleado.options;
        for (let i = select.length; i >= 0; i--) {
            empleado.remove(select[i]);
          }

        if(tipo.value === "Limpieza"){

            for(let i=0; i <limpieza.length; i++){
                let option = document.createElement('option');
                option.value= limpieza[i]['value'];
                option.text = limpieza[i]['text'];
               // console.log(option.value);
                if( option.value == seleccionado){

                    option.setAttribute("selected", "selected");
                }
                empleado.appendChild(option);
            }
        }else if(tipo.value === ""){
            for(let i=0; i <limpieza.length; i++){
                let option = document.createElement('option');
                option.value= limpieza[i]['value'];
                option.text = limpieza[i]['text'];
               // console.log(option.value);
                if( option.value == seleccionado){

                    option.setAttribute("selected", "selected");
                }
                empleado.appendChild(option);
            }
            for(let i=1; i < otros.length; i++){
                let option = document.createElement('option');
                option.value= otros[i]['value'];
                option.text = otros[i]['text'];
                if( option.value == seleccionado){

                    option.setAttribute("selected", "selected");
                }
                empleado.appendChild(option);
            }
            for(let i=1; i < cuidados.length; i++){
                let option = document.createElement('option');
                option.value= cuidados[i]['value'];
                option.text = cuidados[i]['text'];
                if( option.value == seleccionado){

                    option.setAttribute("selected", "selected");
                }
                empleado.appendChild(option);
            }
        }else if(tipo.value === "Cuidados"){
            for(let i=0; i < cuidados.length; i++){
                let option = document.createElement('option');
                option.value= cuidados[i]['value'];
                option.text = cuidados[i]['text'];
                if( option.value == seleccionado){

                    option.setAttribute("selected", "selected");
                }
                empleado.appendChild(option);
            }
        }else if(tipo.value === "Otros"){
            for(let i=0; i < otros.length; i++){
                let option = document.createElement('option');
                option.value= otros[i]['value'];
                option.text = otros[i]['text'];
                if( option.value == seleccionado){

                    option.setAttribute("selected", "selected");
                }
                empleado.appendChild(option);
            }
        }

        select[0].setAttribute("disabled", "true");
        select[0].setAttribute("hidden", "true");
    }

});


