<?php
session_start();
?>

    <!DOCTYPE html>
    <html>
    <?php include 'header.php'; ?>
    <title>
        Welcome to Grocery Plus!
    </title>
    <style>
      #map {
        width: 500px;
        height: 400px;
        background-color: #CCC;
      }
    </style>
    <body>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>

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
        <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
        <script src="./js/about_maps.js"></script>
        <?php include 'footer.php'; ?>
    </body>
</html>
