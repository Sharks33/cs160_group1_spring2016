<?php
session_start();
?>
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
    <header>

        <div>
            <table style="width:100%" align="right" id="pageLinks">
                <tr>
                    <td>
                        <table style="width:40%" align="left">
                            <tr>
                                <!-- <td id="teamName" align="left">Grocery</td> -->
                                <td id="teamName" align="left"><a href="index.php">
                                  <img src="static/img/truck.jpg" alt="Truck" /></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table style="width:60%" align="right">
                            <tr>
                                <td align="center">
                                    <a href="home.php">Home</a>
                                </td>
                                <td align="center">
                                    <?php
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                                    echo "<td align=\"center\"><a href=\"profile.php\">MY PROFILE</a></td>";
                                    echo "<td align=\"center\"><a href=\"signOut.php\">LOGOUT</a></td>";
                                }
                                else {
                                    echo <<<"EOF"
                                    <td align="center">
                                        <!-- <a href="#" data-toggle="modal" data-target="#login-modal">Login</a> -->
                                        <a href="#" data-toggle="modal" data-target="#login-modal">SIGN IN</a>

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
                                </td>

                                <td align="center">Contact </td>
                                <td align="center">Register</td>
                                <td align="center">
                                  <a href="orderHistory.php">Order History </a>
                                </td>
                                <td align="center">
                                  <a href="shop.php">Shop</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </header>
