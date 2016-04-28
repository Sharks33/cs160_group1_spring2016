<?php
  session_start();
  include 'header.php';
  $totalPrice = $_POST['TotalPrice'];
  $cartItems = json_decode($_POST['CartItems'], true);
  $user = $_POST['UserName'];
  $_SESSION['username'] = $user;

  echo <<<HEREDOC
  <div class="container">
    <div class="row">
      <h2 id='userName'> $user </h2>
      <div class="panel panel-info" id="panelColor">
        <div class="panel-heading">
          <h3 class="panel-title" id="panel-title">Confirmation Message</h3>
        </div>
        <div class="panel-body" id="panel-body"> Verify that these are the items you wish to order. </div>
      </div>
      <hr>
    </div>
  </div>
  <div class="container" id="itemContainer">
  <div class="row">
  <table class="table table-bordered" id="#shoppingListTable">
  <thead><tr><th>Product Name</th><th> Cost </th></tr></thead>
HEREDOC;

  foreach($cartItems as $item)
  {
    echo "<tr class='productInfo'><td class='productName'>" . $item["ProductName"] . "</td><td class='cost'>" . $item["Cost"] . "</td><tr>";
  }

  echo "</table><h3> Total Price: </h3><div class='alert alert-success' role='alert' id='totalPrice'>" . $totalPrice . "</div>";
  echo <<<EOT
  <div class="form-group">
  <label for="usr">Enter Credit Card Number:</label>
  <input type="number" class="form-control" id="creditCardInput"></div>
EOT;
  echo <<<EOT
  <button type='button' class='btn btn-success' onclick='payNow()'> Pay Now! </button>
  <button type='button' class='btn btn-danger' onclick='backAndEdit()'> Back To Shop </button>
  </div></div>
EOT;
?>
<script type="text/javascript">
    function payNow()
    {
      $("#panelColor").removeClass("panel-info").addClass("panel-success");
      $("#panel-title").text("Order has been confirmed!").fadeIn();
      $("#panel-body").text("Thank you. Your groceries have been purchased and your credit card has been processed. Checkout your purchase history to see what groceries you have bought and estimated time of arrival. Have a nice ass day!");

      var cartItems = [];

      $(".productInfo").each(function()
      {
        var name = $(this).find("td.productName").text();
        // alert(name);
        var cost = $(this).find("td.cost").text();
        // alert(cost);
        cartItems.push({"ProductName" : name, "Cost" : cost});
      });

      var user = $("#userName").text();
      var creditCard = document.getElementById("creditCardInput").value;

      if (creditCard != "")
      {
        $.ajax({
          url: 'processOrder.php',
          type: 'POST',
          data: {"CartItems": JSON.stringify(cartItems), "UserName": user, "creditCard":creditCard},
          success: function(data)
          {
            $("html").html(data);
          }
        });
      }
      else {
        $("#panelColor").removeClass("panel-info").addClass("panel-danger");
        $("#panel-title").text("Please enter Credit Card Number!");
        $("#panel-body").text("In order to process your order, we need your Credit Card Number in order to pay for your groceries :)");
      }
    }

    function backAndEdit()
    {
      window.location.href = "shop.php";
    }
</script>
