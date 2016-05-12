<?php
session_start();
$cartItems = json_decode($_POST['CartItems'], true);
$user = trim($_POST['UserName']);
$creditCard = trim($_POST['creditCard']);
$_SESSION['creditCard'] = $creditCard;
$payment = $_POST['payment'];
$expiration = $_POST['expiration'];
$_SESSION['expiration'] = $expiration;

include 'connectionString.php';
$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);
if(!$conn) { die("Connection failed: " . $conn->connect_error);}

foreach($cartItems as $item)
{
  $productName = trim($item["ProductName"]);
  $cost = trim($item["Cost"]);
  $date = trim($item["Date"]);
  $query = "INSERT INTO Purchase (ProductName, Cost, UserName, Date, payment, expiration) VALUES ('$productName','$cost', '$user', '$date', '$payment', '$expiration')";
  $conn -> query($query);
}

$query = "UPDATE Users SET CreditCard='$creditCard' WHERE UserName = '$user'";
$conn -> query($query);
$conn->close();
?>

<html>
  <?php include 'header.php'; ?>
  <title> Process Order </title>
  <body>
    <div class="container">
      <div class="row">
        <div class="panel panel-success" id="panelColor">
          <div class="panel-heading">
            <h3 class="panel-title" id="panel-title"> Done <span class="glyphicon glyphicon-ok"></span></h3>
          </div>
          <div class="panel-body" id="panel-body"> Thank you for purchasing your groceries! You'll be able to see your purchases in the order history page </div>
        </div>
        <button type='button' class='btn btn-info' onclick='window.location.href="shop.php"'> Back To Shop </button>
      </div>
    </div>
  </body>
</html>
