/* 
 * @description: backend features for store locator
 */

var map;
var markers = [];
var infoWindow;
var clickMarker = null;
var geocoder = null;

function loadGM(latitude, longitude, zoom) {
    if(!latitude){
        latitude = 53.146770;
        longitude = -2.438965;
        zoom = 6;
    }
    
    geocoder = new google.maps.Geocoder();
    
    var myLatlng = new google.maps.LatLng(latitude, longitude);
    var mapOptions = {
        zoom: zoom,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.HYBRID,
        streetViewControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        }
    }
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    
    clickMarker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: "Cheque Centre store",
        draggable: true
    });
    infoWindow = new google.maps.InfoWindow();
    
    // Seeting the bubble
    google.maps.event.addListener(clickMarker, 'click', function() {
        infoWindow.setContent( '<br/><strong>Google Address</strong>: <br/>Not specified yet.' );
        infoWindow.open(map, clickMarker);
    });
    
    geocoder.geocode({
        latLng: myLatlng
    }, function(responses) {
        if (responses && responses.length > 0) {
            google.maps.event.addListener(clickMarker, 'click', function() {
                infoWindow.setContent( '<br/><strong>Google Address</strong>: <br/>' + responses[0].formatted_address );
                infoWindow.open(map, clickMarker);
            });
        } else {
            google.maps.event.addListener(clickMarker, 'click', function() {
                infoWindow.setContent( '<br/><strong>Google Address</strong>: <br/>Cannot determine address at this location.' );
                infoWindow.open(map, clickMarker);
            });
        }
    });
    
    // Add dragging event listeners.
    /*google.maps.event.addListener(clickMarker, 'drag', function() {
        updateMarkerPosition(clickMarker.getPosition());
    });*/

    google.maps.event.addListener(clickMarker, 'dragend', function() {
        geocodePosition(clickMarker.getPosition());
    });
    
    
}

function findAddress() {
    resetMap();
    var address = document.getElementById('StoreAddress').value;
    var city = document.getElementById('StoreCity').value;
    var zip = document.getElementById('StoreZip').value;
    if( !address ){
        alert('Please enter the address!')
        return false;
    }
    if( !city ){
        alert('Please enter the city!')
        return false;
    }
    if( !zip ){
        alert('Please enter the zip code!')
        return false;
    }
    var longAddress = address + ', ' + city + ', ' + zip;
    geocoder.geocode( {
        'address': longAddress
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            map.setZoom(17);
            
            // Setting the marker
            clickMarker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                title: "Cheque Centre store",
                draggable: true
            });
            
            // Seeting the bubble
            google.maps.event.addListener(clickMarker, 'click', function() {
                infoWindow.setContent( '<br/><strong>Google Address</strong>: <br/>' + results[0].formatted_address );
                infoWindow.open(map, clickMarker);
            });
            google.maps.event.trigger(clickMarker, 'click');
            
            // Add dragging event listeners.
            /*google.maps.event.addListener(clickMarker, 'drag', function() {
                updateMarkerPosition(clickMarker.getPosition());
            });*/

            google.maps.event.addListener(clickMarker, 'dragend', function() {
                geocodePosition(clickMarker.getPosition());
            });
            
            // Setting values for lat and lng fields
            document.getElementById('StoreLatitude').value = results[0].geometry.location.lat().toFixed(7);
            document.getElementById('StoreLongitude').value = results[0].geometry.location.lng().toFixed(7);
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
        
    });

}

function geocodePosition(pos) {
    geocoder.geocode({
        latLng: pos
    }, function(responses) {
        if (responses && responses.length > 0) {
            infoWindow.setContent( '<br/><strong>Google Address</strong>: <br/>' + responses[0].formatted_address );
            document.getElementById('StoreLatitude').value = pos.lat().toFixed(7);
            document.getElementById('StoreLongitude').value = pos.lng().toFixed(7);
        } else {
            infoWindow.setContent( '<br/><strong>Google Address</strong>: <br/>Cannot determine address at this location.' );
        }
    });
}

function updateMarkerPosition(latLng) {
    infoWindow.setContent( '<br/><strong>Google Address</strong>: <br/>Calculating...');
    document.getElementById('StoreLatitude').value = latLng.lat().toFixed(7);
    document.getElementById('StoreLongitude').value = latLng.lng().toFixed(7);
}

function updateMarkerAddress(str) {
    document.getElementById('address').innerHTML = str;
}

function resetMap() {
    infoWindow.close();
    if (clickMarker != null) {
        clickMarker.setMap(null);
        clickMarker = null;
    }
}