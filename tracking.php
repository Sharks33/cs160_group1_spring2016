<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel=stylesheet href="style.css">
    <title>Google Maps Tracking</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8K3fPftUM4lvEcd4YMl6ilBC4LNnqAVA&callback=initMap&libraries=geometry,places" async defer></script>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        #map {
            height: 100%;
        }
        
        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
        
        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
        }
        
        #pac-input:focus {
            border-color: #4d90fe;
        }
        
        .pac-container {
            font-family: Roboto;
        }
        
        #type-selector {
            color: #fff;
            background-color: #4d90fe;
            padding: 5px 11px 0px 11px;
        }
        
        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }
        
        #target {
            width: 345px;
        }
    </style>
</head>

<body>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map">
        <!-- relevant script -->
        <script src="./js/tracking_maps.js"></script>
    </div>
</body>

</html>