var map;
var markers = [];
var infoWindow;
var locationSelect;

function loadGM() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(53.146770, -2.438965),
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.HYBRID,
        streetViewControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            }
    });
    infoWindow = new google.maps.InfoWindow();
}

function searchLocations(postcode) {
    var address;
    if(postcode){
        address = postcode + ', UK';
    }else{
        address = document.getElementById("addressInput").value + ', UK';
    }
    
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({
        address: address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
        } else {
            alert(address + ' not found');
        }
    });
}

function clearLocations() {
    infoWindow.close();
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    markers.length = 0;
}

function searchLocationsNear(center) {
    clearLocations(); 

    var radius = 200;
    var searchUrl = pluginURL + 'getStores/' + center.lat() + '/' + center.lng() + '/' + radius;
    downloadUrl(searchUrl, function(data) {
        var xml = parseXml(data);
        var markerNodes = xml.documentElement.getElementsByTagName("marker");
        var mapResults = document.getElementById('map_results');
        mapResults.innerHTML = '<span class="sidebarMapTitle">Nearest Stores, showing nearest 5</span>';
        mapResults.style.width = '150px';
        new_cfmap();
        
        var bounds = new google.maps.LatLngBounds();
        for (var i = 0; i < markerNodes.length; i++) {
            var name = markerNodes[i].getAttribute("name");
            var address = markerNodes[i].getAttribute("address");
            var city = markerNodes[i].getAttribute("city");
            var zip = markerNodes[i].getAttribute("zip");
            var phone = markerNodes[i].getAttribute("phone");
            var openingHours = markerNodes[i].getAttribute("openingHours");
            var distance = parseFloat(markerNodes[i].getAttribute("distance"));
            var latlng = new google.maps.LatLng(
                parseFloat(markerNodes[i].getAttribute("lat")),
                parseFloat(markerNodes[i].getAttribute("lng")));

            createMarker(latlng, name, address, phone, distance, city, zip, openingHours);
            var sidebarEntry = createSidebarEntry(i, name, address, distance, phone, city, zip, openingHours);
            mapResults.appendChild(sidebarEntry);
            bounds.extend(latlng);
        }
        map.fitBounds(bounds);
    });
}

function new_cfmap() {
    var cfmap = document.getElementById('map');
    map = new google.maps.Map(cfmap, {
        center: new google.maps.LatLng(53.146770, -2.438965),
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.HYBRID,
        streetViewControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            }
    });
    infoWindow = new google.maps.InfoWindow();
}

function createMarker(latlng, name, address, phone, distance, city, zip, openingHours) {
    var myLocation = document.getElementById('addressInput').value+', UK';
    var html = '<div class="info_body"><span class="result_title_bubble">' + name + '</span>';
        html += '<br/>' + address + ', ' + city + ', ' + zip;
        //html += '<br/>Tel: ' + phone;
        html += '<br/>Opening Hours: ' + openingHours;
        html += '<br/><a href="http://maps.google.com/maps?f=q&hl=en&q=from:' + encodeURIComponent(myLocation) + '+to:' + encodeURIComponent(address) + '" target="_blank">Directions</a> ';
        html += '</div>';
    var marker = new google.maps.Marker({
        map: map,
        position: latlng
    });
    google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
    });
    markers.push(marker);
    return marker;
}

function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
    new ActiveXObject('Microsoft.XMLHTTP') :
    new XMLHttpRequest;

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request.responseText, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function parseXml(str) {
    if (window.ActiveXObject) {
        var doc = new ActiveXObject('Microsoft.XMLDOM');
        doc.loadXML(str);
        return doc;
    } else if (window.DOMParser) {
        return (new DOMParser).parseFromString(str, 'text/xml');
    }
}

function createSidebarEntry(markerIndex, name, address, distance, phone, city, zip, openingHours) {
    var position = markerIndex + 1;
    var div = document.createElement('div');
    var html = '<span class="result_title">' + position + '. ' + name + '</span><br/>' + 
               address + ', ' + city + ', ' + zip +
               '<br/>Tel: ' + phone + '<br/>Distance: ' + distance.toFixed(1) + ' miles' +
               '<br/>Opening Hours: ' + openingHours;
    div.innerHTML = html;
    div.className = 'result_entry';
    
    google.maps.event.addDomListener(div, 'click', function() {
        google.maps.event.trigger(markers[markerIndex], 'click');
    });
    google.maps.event.addDomListener(div, 'mouseover', function() {
        div.style.backgroundColor = '#eee';
    });
    google.maps.event.addDomListener(div, 'mouseout', function() {
        div.style.backgroundColor = '#fff';
    });
    return div;
}

function doNothing() {}
    
function showContactForm(mapId){
    var formLink = 'index.php?option=com_maps&controller=maps&tmpl=blank&task=showContactForm&markerId='+mapId;
    llamarasincrono(formLink, 'map_result');
}

function llamarasincrono(url, id_contenedor){
    var pagina_requerida = false;
    if (window.XMLHttpRequest) {// Si es Mozilla, Safari etc
        pagina_requerida = new XMLHttpRequest()
    } else if (window.ActiveXObject){ // pero si es IE
        try {
            pagina_requerida = new ActiveXObject('Msxml2.XMLHTTP')
        }
        catch (e){ // en caso que sea una versi�n antigua
            try{
                pagina_requerida = new ActiveXObject('Microsoft.XMLHTTP')
            }
            catch (e){}
        }
    }
    else
        return false
    pagina_requerida.onreadystatechange=function(){ // funcion de respuesta
        cargarpagina(pagina_requerida, id_contenedor);
    }
    pagina_requerida.open('GET', url, true) // asignamos los metodos open y send
    pagina_requerida.send(null)
}

function cargarpagina(pagina_requerida, id_contenedor){
    if (pagina_requerida.readyState == 4 && (pagina_requerida.status==200 || window.location.href.indexOf('http')==-1)){
        document.getElementById(id_contenedor).innerHTML=pagina_requerida.responseText;
        map.updateInfoWindow();
    }
}