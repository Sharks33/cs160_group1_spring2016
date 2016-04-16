<?php
require 'classes/User.php';

session_start();

if($_POST && !empty($_POST['username']) && !empty($_POST['password'])) {
    $pass = $_POST['password'];
    $user = new User($_POST['username'], null, null, null, $pass);
    if ($user->authenticate()) {
        $_SESSION['loggedin'] = true;
        $username = $user->getUsername();
        $_SESSION['username'] = $username;
        $email = $user->getEmail();
        $_SESSION['email'] = $email;
        $first = $user->getFirstName();
        $_SESSION['firstName'] = $first;
        $last = $user->getLastName();
        $_SESSION['lastName'] = $last;

        header("Location: home.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
  <title>
      Welcome to Wayknack!
  </title>
    <body>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="js/validate.js"></script>

        <form action="signIn.php" onsubmit="return validateInput()" method="post">
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <h1>Login to Your Account</h1><br>
                    <form>
                        <input type="text" name="username" id="username" placeholder="Username">
                        <input type="password" name="password" id="password" placeholder="Password">
                        <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                    </form>

                    <div class="login-help">
                        <a href="index.php">Create Account</a> -
                        <a href="#">Forgot Password</a>
                    </div>
                </div>
            </div>

            <?php include 'footer.php'; ?>
        </form>
        <?php if(isset($response)) echo "<h4 class='alert'>" . $response . "</h4>"; ?>
    </body>
</html>
