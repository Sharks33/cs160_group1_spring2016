<?php
include 'connectionString.php';
$productId = $_POST['ProductId'];

$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);

if(!$conn) { die("Connection failed: " . $conn->connect_error);}

$query = "UPDATE Produce SET Quantity = Quantity - 1 WHERE ProductID = $productId AND Quantity > 0";

$conn -> query($query);

// if ($conn->query($query) === TRUE) {
//     echo "<p> Record updated successfully with " . $productId . "</p>";
// } else {
//     echo "<p>Error updating record: " . $conn->error . "</p>";
// }
$conn->close();

?>
