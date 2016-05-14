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

      #quality {
        display: block;
        margin: 0 auto;
        width: 200px;
        height: 200px;
      }

      #produce {
        /*display: block;
        margin: 0 auto;*/
        float: left;
        width: 470px;
        height: 300px;
        margin-right: 20px;
      }

      img.topQual {
        width: 370px;
        height: 300px;
      }
    </style>
    <body>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>

        <div class="container">
          <div class="row">
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
              $first = $_SESSION['firstName'];
              $last = $_SESSION['lastName'];
              echo "<h2 style=\"color: blue\">Welcome to Grocery Plus, $first $last!</h2>";
            }
            ?>
            <hr>
              <!-- <nav id="map"></nav> -->
          </div>
        </div>


        <!-- <p class="text-left">
          <img src="static/img/top_quality.jpg" alt="Shop" id="breadMilkEggs"/>
        </p> -->
        <img src="static/img/top_quality.jpg" alt="Shop" id="quality"/>


        <div class="container" id="instruction">
          <div class="row">
            <div>
              <h3>
                Produce
              </h3>
              <img src="static/img/produce.jpg" alt="Shop" id="produce"/>
              <h4 class="text-justify">
                With more than 18 million cases of produce delivered to our customers nationwide
                every year – no one can question the popularity of our produce. And, because of
                the importance of our produce to our customers’ businesses, we have developed a
                sophisticated and comprehensive plan to provide our customers with the best products
                possible at the best value. All of our produce is grown, inspected, shipped, re-inspected
                and distributed with the care and professional attention that will bring excellence to your
                plate. From tomatoes, potatoes, and onions to whole fresh herbs and fresh cut produce,
                we can cover all your needs, and we can guarantee the freshness and quality of our products
                time and time again. In fact, we believe so much in our produce that we even give you a
                quality guarantee – if you aren’t satisfied with the freshness of our produce, call us
                within 24 hours and we’ll give you a full refund or replacement product. Now THAT is quality.
              </h4>
            </div>
          </div>
          <div class="row">
            <div>
              <div class="col-md-4">
                <h3>
                  BREAD
                </h3>

                  <img src="static/img/bread.jpg" alt="Bread" class="topQual"/>

              </div>
              <div class="col-md-4">
                <h3>
                  MEAT
                </h3>

                  <img src="static/img/topQualityMeats.jpg" alt="Meat" class="topQual"/>

              </div>
              <div class="col-md-4">
                <h3>
                  DAIRY
                </h3>

                  <img src="static/img/topDairy.jpg" alt="Dairy" class="topQual"/>

              </div>
            </div>
          </div>
        </div>

        <p>
        <b>DISCLOSURE: This site was built for educational purposes ONLY. Any pictures, verbiage, logos etc. may be borrowed from other websites and are used striclty for example purposes. We do not claim ownership!</b>
        </p>

        <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
        <script src="./js/about_maps.js"></script>
        <?php include 'footer.php'; ?>
    </body>
</html>
