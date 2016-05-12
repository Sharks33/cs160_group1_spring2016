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
  <script type="text/javascript">
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
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE)
  {
    $user = $_SESSION['username'];
    echo <<<EOT
    <div class="container">
      <div class="row">
        <h2 id="userName"> $user </h2>
        <hr>
        <h2> Shopping: </h2>
        <div id="accordion">
          <h3 id="Meat" class='list'>Meat</h3>
          <div id="MeatList">
          </div>
          <h3 id="Produce" class='list'>Produce</h3>
          <div id="ProduceList">
          </div>
          <h3 id="Dairy" class='list'>Diary</h3>
          <div id="DairyList">
          </div>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
        <div class="row">
            <h3><span class="glyphicon glyphicon-shopping-cart"></span>Shopping Cart List: </h3>
            <hr>
            <table class='table table-striped table-bordered' id='shoppingListTable'></table>
            <h3> Total Price: </h3>
            <div class="alert alert-success" role="alert" id="totalPrice"></div>
            <hr>
            <div id='warningItem'></div>
            <div id='buyingItem'></div>
            <div id='sqlState'></div>
            <button type="button" class="btn btn-success" onclick="buyNow()"> Pay </button>
            <button type="button" class="btn btn-info" onclick="goToPage('home.php')"> Go Home </button>
      </div>
    </div>
EOT;
  }

  else {
    echo <<<EOT
  <div class="container">
    <div class="row">
      <p class="text-center" style="color:salmon; padding-top:10%; font-size:36px"> You are not logged in. Head back home and sign in. </p>
      <p class="text-center">
        <button type="button" class="btn btn-primary btn-lg" onclick="goToPage('home.php')"> Home </button>
      </p>
    </div>
  </div>
EOT;
  }

 ?>
</body>
</html>

<script type="text/javascript">
      var cartItems = [];

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
      function addToList(name, price, category, id, userName) {
        $.ajax({
          url: "update" + category + ".php",
          data: {'ProductId':id, "ProductName":name, "Cost":price },
          type: "POST",
          success: function(data){
              $('#sqlState').html(data);
          }
      });
        var date = new Date();
        var now = date.toString();
        cartItems.push({"ProductName":name, "Cost":price, "UserName":userName, "Date": now});
        $("#shoppingListTable").append("<tr><td class='productName'>" + name + "</td><td class='productPrice' value=" + price + ">" + price + "</td><td class='purchaseDate'>" + now + "<span class='close' aria-hidden='true'>&times;</span></td></tr>");
        updateShoppingCart();
      }

      function updateShoppingCart()
      {
        var totalPrice = 0;
        $('.productPrice').each(function() {
          var price = parseInt($(this).attr("value"));
          totalPrice += price;
        });
        $("#totalPrice").text(totalPrice);
      }

      function buyNow()
      {
        var price = $("#totalPrice").text();
        var user = $("#userName").text();
        if(price == "") {
          $("#buyingItem").html("<div class='alert alert-danger'> You didn't buy anything</div>");
        }
        else
        {
          $.ajax({
               url: 'confirm.php',
               type: "POST",
               data: ({TotalPrice: price, CartItems: JSON.stringify(cartItems), UserName: user}),
               success: function(data){
                 $("body").html(data);
               }
          });
        }
      }

      function unableToBuy(name)
      {
        $("#warningItem").show();
        $("#warningItem").html("<div class='alert alert-danger'> Unable to add more " + name + " </div>");
      }

      function hideBuy()
      {
        $("div#warningItem").hide();
      }

      function goToPage(page)
      {
        window.location.href = page;
      }

      function seeCarItems()
      {
        for(var i = 0; i < cartItems.length; i++)
        {
          console.log("ProductName: " + cartItems[i]["ProductName"]);
          console.log("Cost: " + cartItems[i]["Cost"]);
          console.log("UserName: " + cartItems[i]["UserName"]);
        }
      }

      $(document).on('click','.close', function () {
          $(this).parent().parent().remove();
          updateShoppingCart();
      });
</script>
