/*
* URL origen para las redirecciones
*/
var dirOrigen = window.location.origin+ "/" + (window.location.pathname.split("/")[1]) + "/";

/* PARA QUE FUNCIONE EL .REMOVE EN NAVEGADORES VIEJOS */
// This will let you use the .remove() function later on
if (!('remove' in Element.prototype)) {
    Element.prototype.remove = function() {
    if (this.parentNode) {
        this.parentNode.removeChild(this);
    }
    };
}

/* ----- SE INICIALIZA EL MAPA ------ */
mapboxgl.accessToken = 'pk.eyJ1IjoiZ3VzdGF2b25hamVyYSIsImEiOiJjamJ2MWkycmoxcHFhMzNyNjhxdnhwZndnIn0.e4g69pPiOs1XcIgtGxVvtw';
// This adds the map to your page
var map = new mapboxgl.Map({
    // container id specified in the HTML
    container: 'map',
    // style URL
    style: 'mapbox://styles/mapbox/streets-v9',
    // initial position in [lon, lat] format
    center: [-88.1033434352559, 11.936707483201374],
    // initial zoom
    zoom: 4.5
});

// Add geolocate control to the map.
map.addControl(new mapboxgl.GeolocateControl({
    positionOptions: {
        enableHighAccuracy: true
    },
    trackUserLocation: true
}));

/* ------ SE AGREGA LA LISTA DE ELEMENTOS ALMACENADOS EN VARIABLE "STORES" ------ */
map.on('load', function(e) {
// Add the data to your map as a layer
map.addLayer({
    id: 'locations',
    type: 'symbol',
    // Add a GeoJSON source containing place coordinates and information.
    source: {
    type: 'geojson',
    data: stores
    },
    layout: {
    'icon-image': 'marker-15',
    'icon-allow-overlap': true,
    }
});

//Llama a la funcion que hace el llenado de historias
buildLocationList(stores);
});

/* -------- RECORRE LA LISTA DE ELEMENTOS PARA MOSTRARLOS EN LA LISTA ------ */
function buildLocationList(data) {
    // Iterate through the list of stores
    for (i = 0; i < data.features.length; i++) {
        var currentFeature = data.features[i];
        // Shorten data.feature.properties to just `prop` so we're not
        // writing this long form over and over again.
        var prop = currentFeature.properties;
        // Select the listing container in the HTML and append a div
        // with the class 'item' for each store
        var listings = document.getElementById('listings');
        var listing = listings.appendChild(document.createElement('div'));
        listing.className = 'item';
        listing.id = 'listing-' + i;

        // Create a new link with the class 'title' for each store
        // and fill it with the store address
        var link = listing.appendChild(document.createElement('a'));
        link.className = 'title';
        link.dataPosition = i;
        link.innerHTML = prop.nombre;
        
        /* 
        * ------- ESCUCHADOR DE LA LISTA
        */
        link.addEventListener('click', function(e) {
            // Update the currentFeature to the store associated with the clicked link
            var clickedListing = data.features[this.dataPosition];
            // 1. Fly to the point associated with the clicked link
            flyToStore(clickedListing);
            // 2. Close all other popups and display popup for clicked store
            createPopUp(clickedListing);
            // 3. Highlight listing in sidebar (and remove highlight for all other listings)
            var activeItem = document.getElementsByClassName('active');
            if (activeItem[0]) {
            activeItem[0].classList.remove('active');
            }
            this.parentNode.classList.add('active');
        });

        // Create a new div with the class 'details' for each store
        // and fill it with the city and phone number
        var details = listing.appendChild(document.createElement('div'));
        details.innerHTML = prop.nivel + ", " + prop.categoria + ", " + prop.pais;
        if (prop.telefono) {
            details.innerHTML += ' &middot; ' + prop.phoneFormatted;
        }
    }
}

/*
* ACCIONES DE LA LISTA
*/

/* ------ MODIFICA LA UBICACION DEL MAPA A LA SELECCIONADA EN LA LISTA ------ */
function flyToStore(currentFeature) {
    map.flyTo({
        center: currentFeature.geometry.coordinates,
        zoom: 6
    });
}

/* ---- MUESTRA LA VENTANA EMERGENTE AL SELECCIONAR UN MARCADOR EN EL MAPA ---- */
function createPopUp(currentFeature) {
    var popUps = document.getElementsByClassName('mapboxgl-popup');
    // Check if there is already a popup on the map and if so, remove it
    if (popUps[0]) popUps[0].remove();

    var popup = new mapboxgl.Popup({ closeOnClick: false })
        .setLngLat(currentFeature.geometry.coordinates)
        .setHTML('<b><a href="' + dirOrigen + 'cCursos/detCurso?id='+currentFeature.properties.id+'">'+currentFeature.properties.nombre+'</a></b>' +
        '<p><a href="' + dirOrigen + 'cCursos/detCurso?id='+currentFeature.properties.id+'">' + currentFeature.properties.categoria + ', ' + currentFeature.properties.nivel + '</a></p>')
        .addTo(map);
}

/*
* ------- ESCUCHADOR DEL MAPA
*/
// Add an event listener for when a user clicks on the map
map.on('click', function(e) {
    
    // Query all the rendered points in the view
    var features = map.queryRenderedFeatures(e.point, { layers: ['locations'] });
    if (features.length) {
    var clickedPoint = features[0];
    // 1. Fly to the point
    flyToStore(clickedPoint);
    // 2. Close all other popups and display popup for clicked store
    createPopUp(clickedPoint);
    // 3. Highlight listing in sidebar (and remove highlight for all other listings)
    var activeItem = document.getElementsByClassName('active');
    if (activeItem[0]) {
        activeItem[0].classList.remove('active');
    }
    // Find the index of the store.features that corresponds to the clickedPoint that fired the event listener
    var selectedFeature = clickedPoint.properties.name;

    for (var i = 0; i < stores.features.length; i++) {
        if (stores.features[i].properties.name === selectedFeature) {
        selectedFeatureIndex = i;
        }
    }
    // Select the correct list item using the found index and add the active class
    var listing = document.getElementById('listing-' + selectedFeatureIndex);
    listing.classList.add('active');
    }
});
