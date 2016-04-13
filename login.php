<?php
$userName = $_POST['username'];
$password = $_POST['password'];

include 'connectionString.php';

$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);

if($conn -> connect_error) { die("Connection failed: " . $conn->connect_error);}

$query = "SELECT userName, password FROM account WHERE userName = '$userName' AND password = '$password' ";
$result = $conn->query($query);

if($result->num_rows > 0)
{
  echo "Success: You are logged in!";
}
else {
  echo "Fail: You are not logged in due to incorrect username or password.";
}

$conn->close();
?>
