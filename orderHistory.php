<?php
session_start();
?>

<html>
  <?php include 'header.php'; ?>
  <title> Process Order </title>
  <body>
    <?php
    include 'connectionString.php';
    $user = trim($_SESSION['username']);
    $con = mysqli_connect("localhost", $usernameDB, $passwordDB, $database);
    if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
    $query = "SELECT * FROM Purchase WHERE UserName = '$user'";
    $result=mysqli_query($con,$query);

    echo <<<EOT
    <div class="container">
      <div class="row">
EOT;
    echo "<h2>" . $_SESSION['firstName'] . "'s Order History </h2><table class='table table-bordered'>";
    echo "<tr><th>Product Name </th><th> Cost </th></tr>";
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<tr><td>".$row["ProductName"]."</td><td>".$row["Cost"]."</td></tr>";
    }
    echo "</table></div></div>"
    ?>
  </body>
</html>
