<?php
include 'connectionString.php';
$conn = new mysqli("localhost", $usernameDB, $passwordDB, $database);
if($conn -> connect_error) { die("Connection failed: " . $conn->connect_error);}
$query = "SELECT `ProductName`,`Cost`,`Quantity`, `ProductID`, `DepartmentID` FROM `Product`";
$result = $conn->query($query);
if($result->num_rows > 0)
{
  while($row = $result->fetch_assoc()) {
    if($row["DepartmentID"] >= 2000 && $row["DepartmentID"] < 3000 )
    {
      echo "<div class='itemInfo'>
      <h5 class='productId' id=" . $row["ProductID"] .">" . $row["ProductName"] . "</h5>
      Cost:<p id='cost'>" . $row["Cost"] . "</p>
      Quantity: <p id='quantity'>" . $row["Quantity"] . "</p>
      <button value=" . $row["Cost"] . " type='button' class='btn btn-success buyButtonProduce'>Buy</button>
      </div>";
    }
  }
}
else {
  echo "Errors loading the products.";
}
$conn->close();
?>
<script type="text/javascript">
$(".buyButtonProduce").click(function() {
    hideBuy();
    var productName = $(this).siblings("h5").text();
    var price = $(this).siblings("p#cost").text();
    var quantity = $(this).siblings("p#quantity").text();
    var productId = $(this).siblings("h5.productId").attr("id");
    if(quantity > 0)
    {
      addToList(productName, price, "Produce", productId);
      quantity = quantity - 1;
      $(this).siblings("p#quantity").text(quantity);
    }
    else {
      unableToBuy(productName);
    }
});
</script>
