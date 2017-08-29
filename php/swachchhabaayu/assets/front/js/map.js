$(document).ready(function () {
	var base_url = $('#base-url').val();
    $.ajax({
        url: base_url + 'getMapData',
        type: 'POST',
        dataType: 'JSON',
        success: function (response) {
        	if(response == 'false'){
            	alert('hhh');
                initMap(response);
            }else{
            	initMap(response);
            }
        }
    });
});


var map;
var base_url = $('#base-url').val();
var infoWindows = [], markers = [], iconType, i;

function initMap(mapData) {
    
    infoWindows = [], markers = [];
    var myLatLong = {lat: 27.709264, lng: 85.317741};
    var bounds = new google.maps.LatLngBounds();
    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLong,
        zoom: 10
    });
    
    if (mapData) {
        $.each(mapData, function (key, value) {

            // if (aqi <= 50) {
            //     iconType = base_url + 'assets/front/images/icons/icon-marker-good.png'
            // } elseif(aqi >= 51 && value.aqi <= 100) {
            //     iconType = base_url + 'assets/front/images/icons/icon-marker-moderate.png'
            // }elseif(aqi >= 101 && value.aqi <= 150) {
            //     iconType = base_url + 'assets/front/images/icons/icon-marker-unhealthy-sensitive.png'
            // }elseif(aqi >= 151 && value.aqi <= 200) {
            //     iconType = base_url + 'assets/front/images/icons/icon-marker-unhealthy.png'
            // }elseif(aqi >= 201 && value.aqi <= 300) {
            //     iconType = base_url + 'assets/front/images/icons/icon-marker-very-unhealthy.png'
            // }elseif(aqi >= 300) {
            //     iconType = base_url + 'assets/front/images/icons/icon-marker-hazardous.png'
            // }

            
            if(value.slug === 'kalanki'){
                iconType = base_url + 'assets/front/images/icons/icon-marker-very-unhealthy.png'
            }else if(value.slug ===  'bhaktapur'){
                iconType = base_url + 'assets/front/images/icons/icon-marker-good.png'
            }else if(value.slug ===  'maitighar'){
                iconType = base_url + 'assets/front/images/icons/icon-marker-moderate.png'
            }else{
                iconType = base_url + 'assets/front/images/icons/icon-marker-good.png'
            }
            
            
            var infowindow = new google.maps.InfoWindow({
                content: value.name+'<br>'+'Carbon Monoxide(CO): '+value.co+'<br>'+'Dust: '+value.dust
            });
            infoWindows.push(infowindow);

            var marker = new google.maps.Marker({
                position: {lat: parseFloat(value.latitude), lng: parseFloat(value.longitude)},
                map: map,
                title: value.name,
                icon: iconType
            });


            marker.addListener('click', function () {
                closeAllInfoWindows();
                var center = map.getCenter();
				infowindow.open(map, marker);
                map.setZoom(15);
                map.setCenter(center);
            });
            
            markers.push(marker);
            //extend the bounds to include each marker's position
            bounds.extend(marker.position);
        });
        //now fit the map to the newly inclusive bounds
        map.fitBounds(bounds);
        
    } else {
        if (markers.length > 0) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
        }
    }
    function closeAllInfoWindows() {
        for (var i = 0; i < infoWindows.length; i++) {
            infoWindows[i].close();
        }
    }
    
}


