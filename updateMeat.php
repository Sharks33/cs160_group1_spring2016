<?php
include 'connectionString.php';
$productId = $_POST['ProductId'];
$productName = $_POST['ProductName'];
$cost = $_POST['Cost'];

$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);

if(!$conn) { die("Connection failed: " . $conn->connect_error);}

$query = "UPDATE Product SET Quantity = Quantity - 1 WHERE ProductID = $productId AND Quantity > 0";

$conn -> query($query); // decrement quantity by 1
// if ($conn->query($query) === TRUE) {
//     echo "<p> Record updated successfully decrement by 1 with " . $productId . "</p>";
// } else {
//     echo "<p>Error updating record: " . $conn->error . "</p>";
// }

// $query = "INSERT INTO OrderTemps (ProductName, Cost) VALUES ('$productName','$cost')";
//
// $conn -> query($query);
// if ($conn->query($query) === TRUE) {
//     echo "<p> Record updated successfully into OrderTemps with " . $productId . "</p>";
// } else {
//     echo "<p>Error updating record: " . $conn->error . "</p>";
// }
$conn->close();

?>
