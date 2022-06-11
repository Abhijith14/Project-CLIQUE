(function(A) {
    if (!Array.prototype.forEach)
        A.forEach = A.forEach || function(action, that) {
            for (var i = 0, l = this.length; i < l; i++)
                if (i in this)
                    action.call(that, this[i], i, this);
        };

})(Array.prototype);

var
    mapObject,
    markers = [],
    markersData = {
        'Restaurant': [
            {
                location_latitude: 39.341310, 
                location_longitude: 22.347964,
                data_title: 'first',
                icon_name: '../assets/images/icon/marker-dot.png',
                name: 'Greece'
            },
            {
                location_latitude: 48.855613, 
                location_longitude: 2.329187,
                data_title: 'second',
                icon_name: '../assets/images/icon/marker.png',
                name: 'Paris, France'
            }
        ]
    };


var mapOptions = {
    zoom: 5,
    center: new google.maps.LatLng(43.9388977, -60.5840177),
    mapTypeId: google.maps.MapTypeId.ROADMAP,

    mapTypeControl: false,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        position: google.maps.ControlPosition.LEFT_CENTER
    },
    panControl: false,
    panControlOptions: {
        position: google.maps.ControlPosition.TOP_RIGHT
    },
    zoomControl: true,
    zoomControlOptions: {
        style: google.maps.ZoomControlStyle.LARGE,
        position: google.maps.ControlPosition.RIGHT_BOTTOM
    },
    scrollwheel: false,
    scaleControl: false,
    scaleControlOptions: {
        position: google.maps.ControlPosition.LEFT_CENTER
    },
    streetViewControl: true,
    streetViewControlOptions: {
        position: google.maps.ControlPosition.RIGHT_BOTTOM
    },
    styles: [
        {
          "featureType": "administrative.country",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#ffffff"
            },
            {
              "lightness": -5
            }
          ]
        },
        {
          "featureType": "administrative.country",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#ffffff"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#7ec5ff"
            }
          ]
        }
      ]
};
var marker;
mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);

var directionsService = new google.maps.DirectionsService();
var directionsRenderer = new google.maps.DirectionsRenderer({
    suppressMarkers: true,
    polylineOptions: {
        strokeColor: "#f8006b"
    }
});
directionsRenderer.setMap(mapObject);
calculateAndDisplayRoute(directionsService, directionsRenderer);

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    directionsService.route(
        {
          origin: {query: 'Greece'},
          destination: {query: 'Paris, France'},
          travelMode: 'DRIVING'
        },
        function(response, status) {
          if (status === 'OK') {
            directionsRenderer.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
  }

for (var key in markersData)

    markersData[key].forEach(function (item) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
            map: mapObject,
            animation: google.maps.Animation.DROP,
            icon: item.icon_name,
            title: item.data_title
        });

        if ('undefined' === typeof markers[key])
            markers[key] = [];
        markers[key].push(marker);

    });

function hideAllMarkers () {
    for (var key in markers)
        markers[key].forEach(function (marker) {
            marker.setMap(null);
        });
}

function toggleMarkers (category) {
    hideAllMarkers();
    closeInfoBox();

    if ('undefined' === typeof markers[category])
        return false;
    markers[category].forEach(function (marker) {
        marker.setMap(mapObject);
        marker.setAnimation(google.maps.Animation.BOUNCE);

    });
}

function onHtmlClick(location_type, key){
    google.maps.event.trigger(markers[location_type][key], "click");
}
setTimeout(function() {
    $(".gm-style img").each(function() {
        if (this.src.indexOf("driver.svg") !== -1) {
            $(this).addClass("d-none");
        }
        if (this.src.indexOf("user-map.svg") !== -1) {
            $(this).addClass("d-none");
        }
        if (this.src.indexOf("placed.svg") !== -1) {
            $(this).addClass("d-none");
        }
    });
}, 10000);