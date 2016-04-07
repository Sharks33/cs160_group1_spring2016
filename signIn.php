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
    <head>
        <meta charset="UTF-8"/>
        <title>
            Welcome to Wayknack!
        </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="static/css/stylesheet.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="static/css/signInStyles.css" media="screen" />
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script>
            $(function(){
                $("#header").load("header.php");
                $("#footer").load("../footer.html");
            });
        </script>

        <script>
            function validateInput() {
                var errorRed = "rgb(229, 84, 81)";
                var goodGreen = "rgb(74, 160, 44)";
                var errors = "";

                var uname = document.getElementById("username").value;

                if (uname == "") {
                    errors += "Username is required.\n"
                    document.getElementById("username").style.background = errorRed;
                }

                var pass = document.getElementById("password").value;
                if (pass == "") {
                    errors += "Password is required.\n";
                    document.getElementById("password").style.background = errorRed;
                }

                if (errors) {
                    alert(errors);
                    return false;
                }
            }
        </script>

        <div id="header"></div>
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

            <div id="footer"></div>
        </form>
        <?php if(isset($response)) echo "<h4 class='alert'>" . $response . "</h4>"; ?>
    </body>
</html>
