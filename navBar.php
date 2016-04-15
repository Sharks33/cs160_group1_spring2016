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
        <li><a href="#" data-toggle="modal" data-target="#login-modal">Sign In</a></li>
        <li><a href="index.php">Register</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    echo "<td align=\"center\"><a href=\"profile.php\">MY PROFILE</a></td>";
    echo "<td align=\"center\"><a href=\"signOut.php\">LOGOUT</a></td>";
}
else {
    echo <<<"EOF"
    <td align="center">
        <!-- <a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
        <a href="#" data-toggle="modal" data-target="#login-modal">SIGN IN</a> -->

        <div class="modal fade"
            id="login-modal" tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
            style="display: none;">

            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <h1>Login to Your Account</h1><br>
                    <form action="signIn.php" method="post">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                    </form>
                    <div class="login-help">
                        <a href="index.php">Create Account</a> -
                        <a href="#">Forgot Password</a>
                    </div>
                </div>
            </div>
        </div>
    </td>
EOF;
}
?>
</div>
