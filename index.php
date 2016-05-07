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
        <div class="result">
                <div class="modal-dialog">
                    <div class="loginmodal-container">
                        <h1>CREATE ACCOUNT</h1><br>
                            <input type="text" name="username" id="username" placeholder="Username">
                            <input type="text" name="firstName" id="firstName" placeholder="First Name">
                            <input type="text" name="lastName" id="lastName" placeholder="Last Name">
                            <input type="text" name="email" id="email" placeholder="Email">
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
    <script type="text/javascript">
      function registerDone() {
        var userName = $("#username").val();
        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        var email = $("#email").val();
        var pass = $("#password").val();
        $.ajax({
       url: 'register.php', //This is the current doc
       type: "POST",
       data: ({'username': userName,
          'firstName': firstName,
          'lastName': lastName,
          'email': email,
          'password': pass
        }),
       success: function(data){
           $(".form").fadeOut();
           $(".result").html(data);
         },
        error: function(req, status, error) {
            window.alert( req + "\n" + status + "\n" + error );
        }
        });
      }
    </script>
    <script src="js/validate.js"></script>
</html>
