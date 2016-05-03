// js Gmaps scripts for about.html/php
// assuming $ works as jquery.min.js should be loaded in whatever this uses

// pre-geocoded
var stores = [{
    name: "San Francisco County Store 1",
    address: "798 Haight St, San Francisco, CA 94117",
    location: {
        lat: 37.7717349,
        lng: -122.435258
    }
}, {
    name: "San Francisco County Store 2",
    address: "2815 Diamond St, San Francisco, CA 94131",
    location: {
        lat: 37.734095,
        lng: -122.433689
    }
}, {
    name: "San Mateo County Store 1",
    address: "45 W Hillsdale Blvd, San Mateo, CA 94403",
    location: {
        lat: 37.535415,
        lng: -122.298128
    }
}, {
    name: "San Mateo County Store 2",
    address: "301 McLellan Drive, South San Francisco, CA 94080",
    location: {
        lat: 37.664675,
        lng: -122.446275
    }
}, {
    name: "Santa Clara County Store 1",
    address: "1146 Blossom Hill Rd, San Jose, CA 95118",
    location: {
        lat: 37.249422,
        lng: -121.87666
    }
}, {
    name: "Santa Clara County Store 2",
    address: "San Jose Market Center, 635 Coleman Ave, San Jose, CA 95110",
    location: {
        lat: 37.341146,
        lng: -121.909296
    }
}, {
    name: "Alameda County Store 1",
    address: "3250 Lakeshore Ave, Oakland, CA 94610",
    location: {
        lat: 37.809763,
        lng: -122.244246
    }
}, {
    name: "Alameda County Store 2",
    address: "Fremont Hub Shopping Center, 39324 Argonaut Way, Fremont, CA 94538",
    location: {
        lat: 37.543505,
        lng: -121.986248
    }
}, {
    name: "Contra Costa County Store 1",
    address: "3250 Lakeshore Ave, Oakland, CA 94610",
    location: {
        lat: 37.934697,
        lng: -122.325059
    }
}, {
    name: "Contra Costa County Store 2",
    address: "Fremont Hub Shopping Center, 39324 Argonaut Way, Fremont, CA 94538",
    location: {
        lat: 37.978788,
        lng: -122.056874
    }
}];

// move out map and markers ref for later
// move out user_pos ref
var map = null;
var markers = [];
var user_pos = null;

function initMap() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 37.3209654,
            lng: -121.8792461
        },
        zoom: 8
    });
    directionsDisplay.setMap(map);
    var infoWindow = new google.maps.InfoWindow({
        map: map
    });

    // draw store markers
    for (var i in stores) {
        addMarker(stores[i]);
    }

    // taken from https://developers.google.com/maps/documentation/javascript/examples/map-geolocation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            user_pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            infoWindow.setPosition(user_pos);
            infoWindow.setContent('Location found.');
            map.setCenter(user_pos);
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }

    // directions assume that we're delivering to the current location of the user 
    // -- change user_pos to geocoordinates if needed

    // TEMP POS VAR -- REMOVE WHEN DONE
    user_pos = {
        lat: 37.3449125,
        lng: -121.8561276
    };
    // calculate nearest warehouse
    var nearest_store_location = nearestStore(user_pos);
    // draw route
    calculateAndDisplayRoute(directionsService, directionsDisplay, user_pos, nearest_store_location);
}

// item only refers to type formats specificied like var store
function addMarker(item) {
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(item.location.lat, item.location.lng),
        map: map,
    });
    var contentString = "<div>" + item.name + "<br/>" + item.address + "<br/>" + item.location.lat + ", " + item.location.lng;
    marker.addListener('click', function() {
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        infowindow.open(map, marker);
    });
    markers.push(marker);
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}

// return the position of closest store
// dest should be a { lat: _, lng: _ } object
function nearestStore(destination) {
    // local array of all calculated distances from destination to stores
    var closestStoreIndex = 0;
    var dists = [];
    for (i in stores) {
        dist[i] = calculateDistance(stores[i].location, destination);
    };
    for (i in dists) {
        if (dists[i] < dists[closestStoreIndex]) {
            closestStoreIndex = i;
        }
    };
    return stores[closestStoreIndex].location;
}

// takes points as { lat: _, lng: _ } objects
function calculateDistance(p1, p2) {
    var p1_cast = new google.maps.LatLng(p1.lat, p1.lng);
    var p2_cast = new google.maps.LatLng(p2.lat, p2.lng);
    return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay, origin, destination) {
    var origin_cast = new google.maps.LatLng(origin.lat, origin.lng);
    var destination_cast = new google.maps.LatLng(destination.lat, destination.lng);
    directionsService.route({
        origin: origin_cast,
        destination: destination_cast,
        travelMode: google.maps.TravelMode.DRIVING
    }, function(response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}