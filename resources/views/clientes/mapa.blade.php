@extends('template')
@section('title','Mapa')

@section('content')
    <h1 class="bg-success bg-opacity-25 text-success text-center">Mapa</h1>
    <div id='map'></div>
    @isset($clientes)

    <script>
         mapboxgl.accessToken = 'pk.eyJ1IjoicXdlcnR5NzciLCJhIjoiY2t3bDQycjdmMDh2dDJ1bG53c3MyMWkxZiJ9.dHJhIIsgx1lMHUpzZNXo-Q';
        const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [-0.132348, 38.540494],
    zoom: 9
    });
    map.addControl(new mapboxgl.FullscreenControl());
    map.addControl(new mapboxgl.NavigationControl());

        let clientes = {{$clientes}};
        console.log(clientes);
        let features = [];
        for(let cl of clientes){
            let punto =  {
                'type': 'Feature',
                        'properties': {
                        'description':
                        '<strong>'+cl.user.nombre+', '+cl.user.apellido+'</strong><p>'+cliente.user.domicilio}}+'</p>'
                        },
                        'geometry': {
                        'type': 'Point',
                        'coordinates': [cl.coordenaday, cl.coordenadax]
                        }
            }
            features.push(punto);
            console.log(punto);
        }
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

        map.on('mouseenter', 'places', (e) => {
        // Change the cursor style as a UI indicator.
        map.getCanvas().style.cursor = 'pointer';

        // Copy coordinates array.
        const coordinates = e.features[0].geometry.coordinates.slice();
        const description = e.features[0].properties.description;

        // Ensure that if the map is zoomed out such that multiple
        // copies of the feature are visible, the popup appears
        // over the copy being pointed to.
        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        }

        // Populate the popup and set its coordinates
        // based on the feature found.
        popup.setLngLat(coordinates).setHTML(description).addTo(map);
        });

        map.on('mouseleave', 'places', () => {
        map.getCanvas().style.cursor = '';
        popup.remove();
        });
        });*/


    </script>
     @endisset
@endsection

