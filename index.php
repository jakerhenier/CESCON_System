<?php 
session_start();
require_once('includes/config/timeout.php');
// session_destroy();
if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
    // $_SESSION['refresh'] = 0;
}

if (isset($_SESSION['staff_session'])) {
    header('location: staff_management/navigation/index.php');
}
?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Login to your account</title>
        <link rel="stylesheet" type = "text/css" media = "all" href="styles/style.css">
        <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon">
    </head>
    <body>

        <div class="adding-fields">

            <div class="floating-form" id = "login-form">

                <img id = "logo" src="images/logo.jpeg" alt="Logo">

                <h3>Account login</h3>

                <?php 
                if (isset($_SESSION['login_msg'])) {
                    foreach($_SESSION['login_msg'] as $error) {
                        echo   '<p class = "prompt" id = "error">
                                    <img src="images/error.png" alt="Error">'
                                    . $error .
                                '</p>';
                    }
                    unset($_SESSION['login_msg']);
                }
                ?>

                <form action="includes/actions/login.php" method="POST">

                    <p class="form-indicator">Username</p>
                    <input type="text" name="username" id="username" required autofocus <?php echo ($_SESSION['attempts'] == 2) ? 'disabled' : ''; ?>>

                    <p class="form-indicator">Password</p>
                    <input type="password" name="password" id="password" required <?php echo ($_SESSION['attempts'] == 2) ? 'disabled' : ''; ?>>

                    <button type="submit" name="login" id="login-submit" value="login" <?php echo ($_SESSION['attempts'] == 2) ? 'disabled' : ''; ?>>Login</button>

                </form>

            </div>

        </div>

    </body>
</html>