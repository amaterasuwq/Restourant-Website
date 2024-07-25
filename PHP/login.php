<?php
include 'process_login.php';
include 'header.php';
?>

<div class="login-register-page__container">
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h1>Sign in</h1>
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
                    <span>
                        <?php echo $username_err; ?>
                    </span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <input type="password" placeholder="Password" name="password">
                    <span>
                        <?php echo $password_err; ?>
                    </span>
                </div>
                <button class="login-register__button" type="submit" value="Login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Don't have an account?</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost login-register__button" id="signUp" onclick="RedirectToRegister()">Sign
                        Up</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-login-register">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>Sign in</h1>
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
            <span>
                <?php echo $username_err; ?>
            </span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <input type="password" placeholder="Password" name="password">
            <span>
                <?php echo $password_err; ?>
            </span>
        </div>
        <button class="login-register__button" type="submit" value="Login">Sign In</button>
    </form>
    <h1>Don't have an account?</h1>
    <button class="ghost login-register__button" id="signUp" onclick="RedirectToRegister()">Sign Up</button>
</div>
<script src="../JS/scripts.js"></script>
</body>
</html>