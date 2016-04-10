<?php
session_start();
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Shopping</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="static/css/stylesheet.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script>
  $(function() {
    $("#accordion").accordion({
          heightStyle: "content"
    });
    $( "input[type=submit], a, button" )
      .button()
      .click(function( event ) {
        event.preventDefault();
      });
  });
  </script>
</head>
<body>

<?php

  if(isset($_SESSION['loggedin']))
  {
    echo <<<EOT
<div class="container">
  <div class="row">
    <div id="accordion">
      <h3 id="Meat">Meat</h3>
      <div id="MeatList">
      </div>
      <h3 id="Produce">Produce</h3>
      <div id="ProduceList">
      </div>
      <h3 id="Dairy">Diary</h3>
      <div id="DairyList">
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <h3><span class="glyphicon glyphicon-shopping-cart"></span>Shopping Cart List: </h3>
        <table class="table table-striped table-bordered" id="shoppingListTable">
        </table>
        <h3> Total Price: </h3>
        <div class="alert alert-success" role="alert" id="totalPrice"></div>
        <button type="button" class="btn btn-info"> Pay </button>
    </div>
</div>
EOT;
  }
  else {
    echo <<<EOT
<div class="container">
  <div class="row">
    <p class="text-center"> You are not logged in. </p>
  </div>
</div>
EOT;
  }

 ?>

</body>
</html>

<script type="text/javascript">

      $(document).ready(function(){
          var products = ['Meat', 'Produce', 'Dairy'];
          for(i = 0; i < products.length; i++)
          {
            var getPage = "get" + products[i] + ".php"; // Get PHP file based on header name
            var itemList = products[i] + "List"; // The List we are going to add items to
            $("#" + itemList).load(getPage);
          }
      });

      // Add name and price of product to the shopping cart list table
      function addToList(name, price) {
        $("#shoppingListTable").append("<tr><td class='productName'>" + name + "<td><td class='productPrice' value=" + price + ">" + price + "</td></tr>");
        updateShoppingCart();
      }

      // Triggered whenever an item is added into the shopping cart list table
      function updateShoppingCart()
      {
        var totalPrice = 0;
        $('.productPrice').each(function() {
          var price = parseInt($(this).attr("value"));
          totalPrice += price;
        });
        // alert(totalPrice);
        $("#totalPrice").text("$" + totalPrice);
      }
</script>
