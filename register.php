<?php
$address = $_POST['address'];
$userName = $_POST['username'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];

include 'connectionString.php';
$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);
if($conn -> connect_error) { die("Connection failed: " . $conn->connect_error);}
$query = "INSERT INTO Users (UserName, FirstName, LastName, EmailAddress, Password, Address) VALUES ('$userName', '$firstName', '$lastName', '$email', '$password', '$address')";
if($conn->query($query) === TRUE) {
echo "<h1 style=\"color: green; text-align: center\">Your Account Has Been Created! <a href='signIn.php'> Sign in now!</a></h1>";
}
else {
echo "<h1 style=\"color: red; text-align: center\">Account has been taken by somebody else.</h1>";
}
$conn->close();
?>
