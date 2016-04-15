<?php
session_start();
?>
<?php include 'header.php'; ?>
<body>
<?php
include 'connectionString.php';

$con=mysqli_connect("localhost",$usernameDB,$passwordDB,$database);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM OrderTemps";
$result=mysqli_query($con,$sql);

echo "<div class='container'>";
echo "<div class='row'>";
echo "<h3> Order History </h3>";
echo "<table class='table table-bordered'>";

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
  echo "<tr><td> ProductName: " . $row["ProductName"] . "</td><td> Cost: " . $row["Cost"] . "</td></tr>";
}
echo "</table>";
echo "</div></div>";

// Free result set
mysqli_free_result($result);

mysqli_close($con);
?>
</body>
