// assuming $ works as jquery.min.js should be loaded in whatever this uses
// TODO: Write event handler for putting in directions

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
    address: "12249 San Pablo Ave, Richmond, CA 94805",
    location: {
        lat: 37.978788,
        lng: -122.056874
    }
}, {
    name: "Contra Costa County Store 2",
    address: "Heritage Square, 1150 Concord Ave, Concord, CA 94520",
    location: {
        lat: 37.934697,
        lng: -122.325059
    }
}];

// move out map and store_markers ref for later
var map;
var store_markers = [];

function initMap() {
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();
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

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });

    // draw store markers
    for (var i in stores) {
        addMarker(stores[i]);
    }
    // change coordinates to hardset user address
    var user_address = {
        lat: 37.3352,
        lng: -121.8811
    };
    // calculate nearest warehouse
    var nearest_store_location = nearestStore(user_address);
    // draw route
    calculateAndDisplayRoute(directionsService, directionsDisplay, user_address, nearest_store_location);
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
    store_markers.push(marker);
}

// takes origin and destination as { lat: _, lng: _ } objects
function calculateAndDisplayRoute(directionsService, directionsDisplay, origin, destination) {
    directionsService.route({
        origin: origin,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING
    }, function(response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}

function calculateDistance(p1, p2) {
    var p1_cast = new google.maps.LatLng(p1.lat, p1.lng);
    var p2_cast = new google.maps.LatLng(p2.lat, p2.lng);
    return (google.maps.geometry.spherical.computeDistanceBetween(p1_cast, p2_cast) / 1000).toFixed(2);
}

// return the position of closest store
// dest should be a { lat: _, lng: _ } object
function nearestStore(destination) {
    // local array of all calculated distances from destination to stores
    var closestStoreIndex = 0;
    var dists = [];
    // calculate all distances
    for (var i in stores) {
        dists[i] = calculateDistance(stores[i].location, destination);
    }
    for (var i in dists) {
        if (dists[i] < dists[closestStoreIndex]) {
            closestStoreIndex = i;
        }
    }
    return stores[closestStoreIndex].location;
}