<?php
include 'connectionString.php';
$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);
if($conn -> connect_error) { die("Connection failed: " . $conn->connect_error);}
$query = "SELECT `ProductName`,`Cost`,`Quantity`, `ProductID` FROM `Product`";
$result = $conn->query($query);
if($result->num_rows > 0)
{
  while($row = $result->fetch_assoc()) {
    echo "<div class='itemInfo'>
    <h5 id=" . $row["ProductID"] .">" . $row["ProductName"] . "</h5>
    Cost:<p id='cost'>" . $row["Cost"] . "</p>
    Quantity: <p id='quantity'>" . $row["Quantity"] . "</p>
    <button value=" . $row["Cost"] . " type='button' class='btn btn-success buyButtonMeat'>Buy</button>
    </div>";
  }
}
else {
  echo "Fail: You are not logged in due to incorrect username or password.";
}
$conn->close();
?>
<script type="text/javascript">
$(".buyButtonMeat").click(function() {
    hideBuy();
    var productName = $(this).siblings("h5").text();
    var price = $(this).siblings("p#cost").text();
    var quantity = $(this).siblings("p#quantity").text();
    if(quantity > 0)
    {
      addToList(productName, price);
      quantity = quantity - 1;
      $(this).siblings("p#quantity").text(quantity);
    }
    else {
      unableToBuy(productName);
    }

});
</script>
