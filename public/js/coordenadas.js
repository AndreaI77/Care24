'use strict';
function iniciar() {
    let boton = document.getElementById("coor");
    boton.addEventListener("click", obtener, false);


    function obtener(event) {
        event.preventDefault()
        event.stopPropagation();
        if(confirm('¿Está seguro de querer guardar las coordenadas de su posición actual como el domicilio del cliente?\nSe creará un punto en el mapa.') == true){
            let geoconfig = {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 60000
                };
            navigator.geolocation.getCurrentPosition(mostrar, errores, geoconfig);

            boton.disabled=true;
        }

    }

    function mostrar(posicion) {

        let latitud = posicion.coords.latitude;
        let longitud = posicion.coords.longitude;
        let accuracy = posicion.coords.accuracy;
        let x = document.getElementById('coordenadax');
        x.value = latitud;
        let y = document.getElementById('coordenaday');
        y.value = longitud;
        let cx = document.createElement('p');
        cx.innerHTML="Latitud: "+latitud;
        let cy = document.createElement('p');
        cy.innerHTML="Longitud: "+longitud;
        let div = document.getElementById('divcoor');
        div.appendChild(cx);
        div.appendChild(cy);
        // console.log("Latitud: " + latitud);
        // console.log("Longitud: " + longitud);
        // console.log("Exactitud: " + accuracy + " mts.");
    }
    function errores(error) {
      alert("Error: " + error.code + " " + error.message);
    }
  }
  window.addEventListener("DOMContentLoaded", iniciar, false);

