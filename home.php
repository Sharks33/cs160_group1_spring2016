<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>
            Welcome to Grocery Plus!
        </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="static/css/stylesheet.css" media="screen" />
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <style>
          #map {
            width: 500px;
            height: 400px;
            background-color: #CCC;
          }
        </style>
    </head>
    <body>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script>
            $(function(){
                $("#header").load("header.php");
                $("#footer").load("footer.html");
            });
        </script>
        <div id="header"></div>

        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
          $first = $_SESSION['firstName'];
          $last = $_SESSION['lastName'];
          echo "<h2 style=\"color: blue\">Welcome to Illegal Drugs Depot, $first $last!</h2>";
        }
        ?>

        <div class="container">
          <div class="row">
              <div id="map"></div>
          </div>
        </div>

        <!-- Actual Index Page Customization -->
        <div class="container" id="missionStatement">
          <div class="row">
            <h2 class="text-center"> <u>Our Mission</u> </h2>
            <p>
              Deliver and provide exceptional high end products at the lowest expense while making it
              simpler for customers to purchase grocery and get it deliver at the speed of light.
            </p>
          </div>
          <hr>
        </div>

        <div class="container" id="instruction">
          <div class="row">
            <h2 class="text-center"> <u> How to Use?</u> </h2>
            <div class="col-md-4">
              <p>
                Register an account and login. Then click on "Shopping"
              </p>
              <p class="text-center">
                <img src="static/img/register.png" alt="Register" />
              </p>
            </div>
            <div class="col-md-4">
              <p>
                Select the items you wish to purchase and pay.
              </p>
              <p class="text-center">
                <img src="static/img/shopping.jpg" alt="Shop" />
              </p>
            </div>
            <div class="col-md-4">
              <p>
                Wait outside for Optimus Prime and pick up your grocery. That easy!
              </p>
              <p class="text-center">
                <img src="static/img/candytruck.jpg" alt="Candy Truck" />
              </p>
            </div>
          </div>
        </div>

        <script>
          // Note: This example requires that you consent to location sharing when
          // prompted by your browser. If you see the error "The Geolocation service
          // failed.", it means you probably did not give permission for the browser to
          // locate you.
          function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -34.397, lng: 150.644},
              zoom: 6
            });
            var infoWindow = new google.maps.InfoWindow({map: map});

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                map.setCenter(pos);
              }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
              });
            } else {
              // Browser doesn't support Geolocation
              handleLocationError(false, infoWindow, map.getCenter());
            }
          }

          function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                                  'Error: The Geolocation service failed.' :
                                  'Error: Your browser doesn\'t support geolocation.');
          }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
        <!-- <div id="footer"></div> -->
    </body>
</html>
