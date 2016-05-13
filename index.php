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
        Grocery Plus
    </title>
    <body>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <div class="result">
                <div class="modal-dialog">
                  <div class="panel panel-danger errors">
                    <div class="panel-heading errors">
                      <h3 class="panel-title errors"> Errors with Login </h3>
                      </div>
                      <div class="panel-body errors" id="errorMessage"></div>
                     </div>
                    <div class="loginmodal-container">
                        <h1>CREATE ACCOUNT</h1><br>
                            <input type="text" name="username" id="username" placeholder="Username">
                            <input type="text" name="firstName" id="firstName" placeholder="First Name">
                            <input type="text" name="lastName" id="lastName" placeholder="Last Name">
                            <input type="text" name="email" id="email" placeholder="Email">
                            <input type="text" name="address" id="address" placeholder="Steet Address, City, State">
                            <input type="text" name="zip" id="zip" placeholder="Zip Code">
                            <input type="password" name="password" id="password" placeholder="Password">
                            <input type="password" name="passwordCheck" id="passwordCheck" placeholder="Confirm">
                            <input type="submit" name="login" class="login loginmodal-submit" onclick="validate()" value="Create">
                        <div class="login-help">
                            <a href="signIn.php">Already have an account?</a>
                        </div>
                    </div>
                </div>
                <?php include 'footer.php'; ?>
            </form>
        </div>
    </body>
    <script src="js/validate.js"></script>
</html>
