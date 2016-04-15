<?php
session_start();
?>
<?php include 'header.php'; ?>
<body>
<?php
include 'connectionString.php';
$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);
if($conn -> connect_error) { die("Connection failed: " . $conn->connect_error);}
$query = "SELECT `ProductName`,`Cost` FROM `Dairy`";
$result = $conn->query($query);
if($result->num_rows > 0)
{
  while($row = $result->fetch_assoc()) {
    echo "<div class='itemInfo'>
    <h5>" . $row["ProductName"] . "</h5>
    <p>" . $row["Cost"] . "</p>
    <button value=" . $row["Cost"] . " type='button' class='btn btn-success buyButtonDairy'>Buy</button>
    </div>";
  }
}
else {
  echo "Fail: You are not logged in due to incorrect username or password.";
}
$conn->close();
?>

<?php
    echo"
    <div class='container' style='padding-top:20%'>
    <div class='row'>
    <div class='jumbotron'>
    <h2> Thank you for purchasing </h2>
    <p style='color:black'> Confirmation page your order has been placed. Head over to Order History to check your purchases! </p>
    </div>
    </div>
    </div>";
?>
</body>
</html>
