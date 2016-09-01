    var map;
    var geocoder;
    var distances = [];
    var t;

    function loadGM() {
      if (GBrowserIsCompatible()) {
        geocoder = new GClientGeocoder();
        map = new GMap2(document.getElementById('map'));
        var customUI = map.getDefaultUI();
		customUI.maptypes.hybrid = true;
		map.setUI(customUI);
        map.addControl(new StreetViewControl);
        map.setCenter(new GLatLng(53.146770, -2.438965), 6);
      }
	  return false;
    }
    
    function searchLocations() {
        var address = document.getElementById('addressInput').value+', UK';
        geocoder.getLatLng(address, function(latlng) {
            if (!latlng) {
                alert(address + ' not found');
            } else {
                searchLocationsNear(latlng);
            }
        });
    }
    
    function searchLocationsNear(center) {
        var radius = document.getElementById('radiusSelect').value;
        var searchUrl = pluginURL + 'getStores/' + center.lat() + '/' + center.lng() + '/' + radius;

        GDownloadUrl(searchUrl, function(data) {
            var xml = GXml.parse(data);
            var markers = xml.documentElement.getElementsByTagName('marker');

            map.clearOverlays();

            var mapResults = document.getElementById('map_results');
            mapResults.innerHTML = 'Nearest Stores, top 5';
            mapResults.style.width = '200px';
            new_cfmap();
            if (markers.length == 0) {
                mapResults.innerHTML = 'No results found.';
                map.setCenter(new GLatLng(53.146770, -2.438965), 6);
                return;
            }

            var bounds = new GLatLngBounds();
            for (var i = 0; i < markers.length; i++) {
                var name = markers[i].getAttribute('name');
                var address = markers[i].getAttribute('address');
                var phone = markers[i].getAttribute('phone');
                var cf_id = markers[i].getAttribute('id');
                var distance = parseFloat(markers[i].getAttribute('distance'));
                var point = new GLatLng(parseFloat(markers[i].getAttribute('lat')),
                                     parseFloat(markers[i].getAttribute('lng')));

                var marker = createMarker(point, name, address, cf_id, phone, distance);
                map.addOverlay(marker);
                var sidebarEntry = createSidebarEntry(marker, name, address, distance, phone, i+1);
                mapResults.appendChild(sidebarEntry);
                bounds.extend(point);
            }
            map.setCenter(bounds.getCenter(), map.getBoundsZoomLevel(bounds));
        });
    }
	
    function new_cfmap() {
        if (GBrowserIsCompatible()) {
            geocoder = new GClientGeocoder();
            var cfmap = document.getElementById('map');
            map = new GMap2(cfmap);
            var customUI = map.getDefaultUI();
            customUI.maptypes.hybrid = true;
            map.setUI(customUI);
            map.addControl(new StreetViewControl);
            map.setCenter(new GLatLng(53.146770, -2.438965), 6);
        }
        return false;
    }
    

    function createMarker(point, name, address, cf_id, phone, distance) {
        var myLocation = document.getElementById('addressInput').value+', UK';
        var marker = new GMarker(point);
        var html = '<div class="info_body"><span class="result_title">' + name + '</span> This store is at ' + distance.toFixed(1) + ' miles from you.';
        html += '<br/>' + address;
        html += '<br/>Tel: ' + phone;
        html += '<br/><a href="http://maps.google.com/maps?f=q&hl=en&q=from:' + encodeURIComponent(myLocation) + '+to:' + encodeURIComponent(address) + '" target="_blank">Directions</a> ';
        //html += '<div id="map_result">';
        //html += '<br/><b>1. <a class="map_link" href="javascript:showContactForm('+cf_id+')">Contact form (fast response)</a></b>';
        //html += '</div></div>';
        html += '</div>';
        GEvent.addListener(marker, 'click', function() {
            marker.openInfoWindowHtml(html);
        });
        return marker;
    }

    function createSidebarEntry(marker, name, address, distance, phone, position) {
        var div = document.createElement('div');
        var html = '<span class="result_title">' + position + '. ' + name + '</span> (' + distance.toFixed(1) + ' miles )<br/>' + address + '<br/>Tel: ' + phone;
        div.innerHTML = html;
        div.className = 'result_entry';
        GEvent.addDomListener(div, 'click', function() {
            GEvent.trigger(marker, 'click');
        });
        GEvent.addDomListener(div, 'mouseover', function() {
            div.style.backgroundColor = '#eee';
        });
        GEvent.addDomListener(div, 'mouseout', function() {
            div.style.backgroundColor = '#fff';
        });
        return div;
    }
    
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