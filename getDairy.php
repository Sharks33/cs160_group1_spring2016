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
<script type="text/javascript">
$(".buyButtonDairy").click(function() {
    var productName = $(this).siblings("h5").text();
    var price = $(this).siblings("p").text();
    addToList(productName, price);
});
</script>
