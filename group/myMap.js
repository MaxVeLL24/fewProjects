function myMap() {
    var mapCanvas = document.getElementById("googleMap");
    var myCenter = new google.maps.LatLng(50.4478856743724, 30.491116046905518);
    var itStepCords = new google.maps.LatLng(50.44328758, 30.49521983);
    var mapOptions = {center: myCenter, zoom: 15,resize:true};
    var map = new google.maps.Map(mapCanvas, mapOptions);
    var marker = new google.maps.Marker({
        position: itStepCords,
        animation: google.maps.Animation.BOUNCE
    });

    $(window).resize(function() {
        // (the 'map' here is the result of the created 'var map = ...' above)
        google.maps.event.trigger(map, "resize");
    });

    marker.setMap(map);

    google.maps.event.addListener(map, 'click', function (event) {
        placeMarker(map, event.latLng);
    });
}

function placeMarker(map, location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    var infowindow = new google.maps.InfoWindow({
        content: 'Широта: ' + location.lat() + '<br>Длина: ' + location.lng()
    });
    infowindow.open(map, marker);
}