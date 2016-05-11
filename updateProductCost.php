<?php
$cost = $_POST["cost"];
$name = $_POST["name"];
$quantity = $_POST["quantity"];
include 'connectionString.php';
$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);
if($conn -> connect_error) { die("Connection failed: " . $conn->connect_error);}
$query = "UPDATE Product SET Cost = '$cost' WHERE ProductName = '$name' AND Quantity = '$quantity'";
$result = $conn->query($query);
?>
