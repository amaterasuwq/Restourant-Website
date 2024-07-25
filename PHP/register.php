<?php
include 'process_register.php';
include 'header.php';
?>
<div class="login-register-page__container" id="login-register-page__container">
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <fieldset id="login">
                    <h1>Create Account</h1>
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
                        <span>
                            <?php echo $username_err; ?>
                        </span>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>">
                        <span>
                            <?php echo $password_err; ?>
                        </span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <input type="password" name="confirm_password" placeholder="Confirm Password"
                            value="<?php echo $confirm_password; ?>">
                        <span>
                            <?php echo $confirm_password_err; ?>
                        </span>
                    </div>
                    <button class="login-register__button" type="submit" value="Submit">Sign Up</button>
                </fieldset>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Already have an account?</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost login-register__button" id="signIn" onclick="RedirectToLogin()">Sign In</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-login-register">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <fieldset id="login">
            <h1>Create Account</h1>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
                <span>
                    <?php echo $username_err; ?>
                </span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>">
                <span>
                    <?php echo $password_err; ?>
                </span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="confirm_password" placeholder="Confirm Password"
                    value="<?php echo $confirm_password; ?>">
                <span>
                    <?php echo $confirm_password_err; ?>
                </span>
            </div>
            <button class="login-register__button register" type="submit" value="Submit">Sign Up</button>
        </fieldset>
    </form>
    <h1>Already have an account?</h1>
    <button class="ghost login-register__button" id="signIn" onclick="redirectToLogin()">Sign In</button>
</div>
<script src="../JS/scripts.js"></script>
</body>

</html>