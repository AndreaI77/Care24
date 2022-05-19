'use strict'
window.addEventListener("DOMContentLoaded", function(){
    let longitud= -0.132348;
     let latitud = 38.540494;
    mapboxgl.accessToken = 'pk.eyJ1IjoicXdlcnR5NzciLCJhIjoiY2t3bDQycjdmMDh2dDJ1bG53c3MyMWkxZiJ9.dHJhIIsgx1lMHUpzZNXo-Q';
    let map = new mapboxgl.Map({
    container: "map",
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [longitud , latitud], // starting position [lng, lat]
    zoom: 9
    });
    map.addControl(new mapboxgl.FullscreenControl());
    map.addControl(new mapboxgl.NavigationControl());

    const popup = new mapboxgl.Popup({ offset: 25 }).setText("Estamos aquí.").addTo(map);
    

    const marker = new mapboxgl.Marker(/*{ color: 'blue', rotation: 10 }*/)
      .setLngLat([Number(longitud), Number(latitud)])
      .setPopup(popup)
      .addTo(map);
 
});


