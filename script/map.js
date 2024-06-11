mapboxgl.accessToken = 'pk.eyJ1IjoiZ2VvcmdlbWFnZHk3MTgiLCJhIjoiY2xoc2d1OXZiMHAyMzNvb2F5ZDIyY25zcyJ9.cUJaBCHSAeCKiWZEgb08yg';

var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v12',
    center: [112.7521, -7.2575], // Koordinat Surabaya: [longitude, latitude]
    zoom: 12 // Level zoom, bisa disesuaikan
});

var markers = [
    {
        name: 'Tunjungan Plaza',
        url: 'https://www.google.com/maps/place/Tunjungan+Plaza/@-7.262614718872243,112.74160952396564,17z/',
        lngLat: [112.74160952396564, -7.262614718872243]
    },
    {
        name: 'Plaza Surabaya',
        url: 'https://www.google.com/maps/place/Plaza+Surabaya/@-7.272729182476394,112.74110130731716,17z/',
        lngLat: [112.74110130731716, -7.272729182476394]
    },
    {
        name: 'Ciputra World Surabaya',
        url: 'https://www.google.com/maps/place/Ciputra+World+Surabaya/@-7.278378370883519,112.74377614704833,17z/',
        lngLat: [112.74377614704833, -7.278378370883519]
    },
    {
        name: 'Galaxy Mall',
        url: 'https://www.google.com/maps/place/Galaxy+Mall/@-7.301912113347529,112.73126834227218,17z/',
        lngLat: [112.73126834227218, -7.301912113347529]
    },
    {
        name: 'Surabaya Town Square (SUTOS)',
        url: 'https://www.google.com/maps/place/Surabaya+Town+Square/@-7.29458607121039,112.7235761628939,17z/',
        lngLat: [112.7235761628939, -7.29458607121039]
    },
    {
        name: 'Marvell City',
        url: 'https://www.google.com/maps/place/Marvell+City/@-7.280556428661469,112.74222646037025,17z/',
        lngLat: [112.74222646037025, -7.280556428661469]
    },
    {
        name: 'Royal Plaza Surabaya',
        url: 'https://www.google.com/maps/place/Royal+Plaza+Surabaya/@-7.311973597775725,112.727827949249,17z/',
        lngLat: [112.727827949249, -7.311973597775725]
    },
    {
        name: 'Delta Plaza',
        url: 'https://www.google.com/maps/place/Delta+Plaza/@-7.269267020783818,112.74141210382404,17z/',
        lngLat: [112.74141210382404, -7.269267020783818]
    },
    {
        name: 'Grand City Surabaya',
        url: 'https://www.google.com/maps/place/Grand+City+Surabaya/@-7.277488716126979,112.73172747153194,17z/',
        lngLat: [112.73172747153194, -7.277488716126979]
    }
];

var markerElements = [];

markers.forEach(function(marker) {
    var el = document.createElement('div');
    el.className = 'marker';
    el.addEventListener('click', function() {
        window.open(marker.url, '_blank');
    });
    markerElements.push(new mapboxgl.Marker({ color: "#F7455D" })
        .setLngLat(marker.lngLat)
        .setPopup(new mapboxgl.Popup({ offset: 25 })
        .setHTML('<h3>' + marker.name + '</h3><p><a href="' + marker.url + '" target="_blank">Lihat Arah</a></p>'))
        .addTo(map)
        .getElement());
});

var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl,
    marker: false,
    placeholder: 'Cari lokasi'
});

map.addControl(geocoder);

var searchParams = new URLSearchParams(window.location.search);
var searchQuery = decodeURIComponent(searchParams.get('search') || '');
// Teruskan kueri pencarian ke geocoder Mapbox
if (searchQuery) {
    geocoder.query(searchQuery);
}

document.getElementById('search_btn').addEventListener('click', function() {
    geocoder.query(document.getElementById('searchPageId').value);
});

geocoder.on('result', function(ev) {
    var center = ev.result.center;
    map.flyTo({
        center: center,
        zoom: 12
    });

    markerElements.forEach(function(markerElement) {
        markerElement.remove();
    });

    markerElements = [];

    markers.forEach(function(marker) {
        var el = document.createElement('div');
        el.className = 'marker';
        el.addEventListener('click', function() {
            window.open(marker.url, '_blank');
        });
        markerElements.push(new mapboxgl.Marker({ color: "#F7455D" })
            .setLngLat(marker.lngLat)
            .setPopup(new mapboxgl.Popup({ offset: 25 })
            .setHTML('<h3>' + marker.name + '</h3><p><a href="' + marker.url + '" target="_blank">Lihat Arah</a></p>'))
            .addTo(map)
            .getElement());
    });
});
