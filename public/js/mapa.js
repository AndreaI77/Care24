// 'use strict'
// window.addEventListener("DOMContentLoaded", function(){
$(document).ready(function () {
    let features=[];
    $.ajax({
        method: "GET",
        url: "mapaClientes",
        success: function (data) {
          for(let item of data){
            features.push( {
                'type': 'Feature',
                'properties': {
                'description':
                '<strong>'+item.nombre+', '+item.apellido+'</strong><p>'+item.domicilio+'</p>'
                },
                'geometry': {
                'type': 'Point',
                'coordinates': [ item.latitud, item.longitud]

                }
                })
            }

            let longitud= -0.132348;
            let latitud = 38.540494;
            mapboxgl.accessToken = 'pk.eyJ1IjoicXdlcnR5NzciLCJhIjoiY2t3bDQycjdmMDh2dDJ1bG53c3MyMWkxZiJ9.dHJhIIsgx1lMHUpzZNXo-Q';
            let map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [longitud, latitud],
            zoom: 11
            });
            map.addControl(new mapboxgl.FullscreenControl());
            map.addControl(new mapboxgl.NavigationControl());
            map.on('load', () => {
                map.addSource('places', {
                    'type': 'geojson',
                    'data': {
                    'type': 'FeatureCollection',
                    'features': features
                    }
                });

                    // Add a layer showing the places.
                    map.addLayer({
                    'id': 'places',
                    'type': 'circle',
                    'source': 'places',
                    'paint': {
                    'circle-color': '#4264fb',
                    'circle-radius': 6,
                    'circle-stroke-width': 2,
                    'circle-stroke-color': '#ffffff'
                    }
                    });

                    // Create a popup, but don't add it to the map yet.
                    const popup = new mapboxgl.Popup({
                    closeButton: false,
                    closeOnClick: false
                    });

                    map.on("mouseenter", "places", (e) => {
                        // Change the cursor style as a UI indicator.
                        map.getCanvas().style.cursor = "pointer";

                        // Copy coordinates array.
                        const coordinates =
                            e.features[0].geometry.coordinates.slice();
                        const description =
                            e.features[0].properties.description;

                        // Ensure that if the map is zoomed out such that multiple
                        // copies of the feature are visible, the popup appears
                        // over the copy being pointed to.
                        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                            coordinates[0] +=
                                e.lngLat.lng > coordinates[0] ? 360 : -360;
                        }

                        // Populate the popup and set its coordinates
                        // based on the feature found.
                        popup
                            .setLngLat(coordinates)
                            .setHTML(description)
                            .addTo(map);
                    });

                    map.on("mouseleave", "places", () => {
                        map.getCanvas().style.cursor = "";
                        popup.remove();
                    });
            });
        },
        error: function(){
         console.log('error');
        }
    });



});
