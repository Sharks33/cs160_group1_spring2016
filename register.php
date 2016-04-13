<?php
$userName = $_POST['username'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
// echo "$userName"."\n";
// echo "$firstName"."\n";
// echo "$lastName"."\n";
// echo "$email"."\n";
// echo "$password"."\n";

include 'connectionString.php';

$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);

if($conn -> connect_error) { die("Connection failed: " . $conn->connect_error);}

$query = "INSERT INTO account (userName, firstName, lastName, email, password) VALUES ('$userName', '$firstName', '$lastName', '$email', '$password')";

if($conn->query($query) === TRUE) { echo "New record created succesfully! Let's go into the database!"; }
else { echo "Error: " . $query . "<br>" . $conn->error; }

$conn->close();
?>
