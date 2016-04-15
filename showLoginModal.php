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
