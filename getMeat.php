<h1> Get Meat </h1>
<?php
include 'connectionString.php';
$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);
if($conn -> connect_error) { die("Connection failed: " . $conn->connect_error);}
$query = "SELECT `ProductName`,`Cost` FROM `Product`";
$result = $conn->query($query);
if($result->num_rows > 0)
{
  while($row = $result->fetch_assoc()) {
    echo "<div><h5>" . $row["ProductName"] . "</h5><p>" . $row["Cost"] . "</p></div>";
  }
}
else {
  echo "Fail: You are not logged in due to incorrect username or password.";
}
$conn->close();
?>
