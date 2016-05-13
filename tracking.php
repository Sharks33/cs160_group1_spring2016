<?php
header('Content-Type: text/html');

// set connection
include 'connectionString.php';
$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);
if($conn -> connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// check if parameter PurchaseID is passed in 
if (isset($_GET['PurchaseID'])) {
    // method stub
} else {
    echo "No PurchaseID provided.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="initial-scale=1.0, user-scalable=no" />
    <meta charset="utf-8">
    <title>Google Maps Tracking</title>
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
    </style>
</head>

<body>
    <div id="map"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8K3fPftUM4lvEcd4YMl6ilBC4LNnqAVA&callback=initMap&libraries=geometry,places" async defer></script>
    <script src="./js/tracking.js"></script>
</body>

</html>