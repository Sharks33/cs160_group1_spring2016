<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
   header("Location: home.php");
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

        <script src="js/validate.js"></script>

        <link rel="stylesheet" type="text/css" href="css/stylesheet.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/signInStyles.css" media="screen" />
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script>
            $(function(){
                $("#header").load("header.php");
                $("#footer").load("footer.html");
            });
        </script>
        <div id="header"></div>
        <div>
            <form action="createUser.php" onsubmit="return validate()" method="post">
                <div class="modal-dialog">
                    <div class="loginmodal-container">
                        <h1>CREATE ACCOUNT</h1><br>
                        <form>
                            <input type="text" name="username" id="username" placeholder="Username">
                            <input type="text" name="firstName" id="firstName" placeholder="First Name">
                            <input type="text" name="lastName" id="lastName" placeholder="Last Name">
                            <input type="text" name="email" id="email" placeholder="Email">
                            <input type="password" name="password" id="password" placeholder="Password">
                            <input type="password" name="passwordCheck" id="passwordCheck" placeholder="Confirm">
                            <input type="submit" name="login" class="login loginmodal-submit" value="Create">
                        </form>

                        <div class="login-help">
                            <a href="signIn.php">Already have an account?</a>
                        </div>
                    </div>
                </div>

                <div id="footer"></div>
            </form>
        </div>
    </body>
</html>
