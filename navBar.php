<div>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php"> Grocery </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        echo "<li><a href=\"profile.php\">My Profile</a></li>";
        echo "<li><a href=\"signOut.php\">Logout</a></li>";
    }
    else {
      include 'showLoginModal.php';
      echo '<li><a href="index.php">Register</a></li>';
      echo '<li><a href="#" data-toggle="modal" data-target="#login-modal">Sign In</a></li>';
    }
    ?>
        </ul>
      </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</div>
