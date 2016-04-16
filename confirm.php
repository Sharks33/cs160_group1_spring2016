<?php
  session_start();
  include 'header.php';
  $totalPrice = $_POST['TotalPrice'];
  $cartItems = json_decode($_POST['CartItems'], true);
  echo <<<HEREDOC
  <div class="container">
    <div class="row">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Confirmation Message</h3>
        </div>
        <div class="panel-body"> Verify that these are the items you wish to order. </div>
      </div>
      <hr>
    </div>
  </div>
  <div class="container">
  <div class="row">
  <table class="table table-bordered">
  <thead><tr><th>Product Name</th><th> Cost </th></tr></thead>
HEREDOC;

  foreach($cartItems as $item)
  {
    echo "<tr><td class='info'>" . $item["ProductName"] . "</td><td class='info'>" . $item["Cost"] . "</td><tr>";
  }

  echo <<<EOT
  </table>
  <button type='button' class='btn btn-success'> Pay Now! </button>
  <button type='button' class='btn btn-danger'> Go Back and Edit </button>
  </div></div>
EOT;

?>
