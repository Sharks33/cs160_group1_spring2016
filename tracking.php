<!DOCTYPE html>
<?php
// header('Content-Type: text/html');

// set connection
include 'connectionString.php';
$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);
if($conn -> connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// check if parameter PurchaseID is passed in
$address = "empty";
$date = "empty";
if (isset($_GET['PurchaseID'])) {
    $query = "SELECT `Users.Address` AS `Address`, `Purchase.Date` AS `Date` FROM `Purchase` INNER JOIN `Users` ON `Purchase.UserName` = `Users.UserName` WHERE `Purchase.PurchaseID` = " . $_GET['PurchaseID'];
    $result = $conn->query($query);
    while($row = $result->fetch_assoc())
    {
      $address = $row["Address"];
      $date = $row["Date"];
      // $address = "1601 Clay Street, Oakland, CA 94612";
    }
} else {
    echo "<p>No PurchaseID provided.</p>";
}
?>
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
    <!-- only required to be element in DOM so script can retrieve value -->
    <input id="address" value="<?php echo $address ?>">
    <input id="date" value="<?php echo $date ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8K3fPftUM4lvEcd4YMl6ilBC4LNnqAVA&callback=initMap&libraries=geometry,places" async defer></script>
    <script src="./js/tracking.js"></script>
</body>

</html>
