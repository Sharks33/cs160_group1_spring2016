<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
   header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'header.php'; ?>
    <title>
        Illegal Drugs Depot
    </title>
    <body>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
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

                <?php include 'footer.php'; ?>
            </form>
        </div>
    </body>
</html>
