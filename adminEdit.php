<?php
session_start();
?>

<html>
  <?php include 'header.php'; ?>
  <title> Admin Power </title>
  <body>
    <?php
    include 'connectionString.php';
    $user = trim($_SESSION['username']);
    $con = mysqli_connect("localhost", $usernameDB, $passwordDB, $database);
    if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
    $query = "SELECT * FROM Product";
    $result=mysqli_query($con,$query);

    echo <<<EOT
    <div class="container">
      <div class="row">
EOT;
    echo "<div class='orderResult'></div>";
    echo "<h2> Admin Edit </h2><table class='table table-bordered'>";
    echo "<tr><th>Product Name </th><th> Cost </th><th> Quantity </th></tr>";
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        echo "<tr><td><input class='name' type='text' value=".$row["ProductName"]."></input></td><td><input class='cost' type='text' value=".$row["Cost"]."></input></td><td><input class='quantity' type='text' value=". $row["Quantity"]."></input></td></tr>";
    }
    echo "</table></div></div>"
    ?>
  </body>
  <script type="text/javascript">
    $(".name").on("change paste keyup", function() {
      var name = $(this).val();
      var cost = $(this).parent().next().find('.cost').val();
      var quantity = $(this).parent().next().next().find('.quantity').val();
      $.ajax({
           url: 'updateProductName.php',
           type: "POST",
           data: ({"name": name, "cost": cost, "quantity" : quantity}),
           success: function(data){
             $(".orderResult").html("<div class='alert alert-success' role='alert'> Name has been updated. </div>");
           },
           error: function(xhr, error){
             $(".orderResult").html("<div class='alert alert-danger' role='alert'> Name was unable to be updated. </div>");
            // $(".orderResult").text("error");
           },
      });
    });
    $(".cost").on("change paste keyup", function() {
      var cost = $(this).val();
      var name = $(this).parent().prev().find('.name').val();
      var quantity = $(this).parent().next().find('.quantity').val();
      $.ajax({
           url: 'updateProductCost.php',
           type: "POST",
           data: ({"name": name, "cost": cost, "quantity" : quantity}),
           success: function(data){
             $(".orderResult").html("<div class='alert alert-success' role='alert'> Cost has been updated. </div>");
           },
           error: function(xhr, error){
             $(".orderResult").html("<div class='alert alert-danger' role='alert'> Cost was unable to be updated. </div>");
            // $(".orderResult").text("error");
           },
      });
    });
    $(".quantity").on("change paste keyup", function() {
      var quantity = $(this).val();
      var cost = $(this).parent().prev().find('.cost').val();
      var name = $(this).parent().prev().prev().find('.name').val();
      $.ajax({
           url: 'updateProductQuantity.php',
           type: "POST",
           data: ({"name": name, "cost": cost, "quantity" : quantity}),
           success: function(data){
             $(".orderResult").html("<div class='alert alert-success' role='alert'> Quantity has been updated. </div>");
           },
           error: function(xhr, error){
             $(".orderResult").html("<div class='alert alert-danger' role='alert'> Quantity was unable to be updated. </div>");
            // $(".orderResult").text("error");
           },
      });
    });
  </script>
</html>
