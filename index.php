<?php 
session_start();

if (isset($_SESSION['staff_session'])) {
    header('location: staff_management/navigation/index.php');
}
?>

<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>

    <head>
        <title>Account login</title>

        <link rel="stylesheet" type = "text/css" media = "all" href="styles/style.css">
        <link rel="shortcut icon" href="images/logo_clear.png" type="image/x-icon">
    </head>

    <body>
        
        <div class="content-box, login-box">
        
            <div class="input-form" id="login">
            
                <img id = "cescon-logo" src="images/logo_clear.png" alt="CESCON logo">
                <p id="login-prompt">Login to your account</p>

                <!-- <div class="error-msg">
                    <img id = "err-sign" src="images/error.png" alt="Error">
                    <p id="err-txt">Try again</p>
                </div> -->

                <?php 
                if (isset($_SESSION['login_msg'])) {
                    foreach($_SESSION['login_msg'] as $error) {
                        echo   '<div class="error-msg">
                                    <img id = "err-sign" src="images/error.png" alt="Error">
                                    <p id="err-txt">'. $error .'</p>
                                </div>';
                    }
                    unset($_SESSION['login_msg']);
                }
                ?>

                <div class="form-fields">

                    <form action="includes/actions/login.php" method="POST">

                        <input type="text" name="username" id="username" placeholder="Username" autofocus>

                        <input type="password" name="password" id="password" placeholder="Password">

                        <button type="submit" name="login" value="login">Login</button>

                        <!-- <select name="" id="">
                            <option value="Light">Light</option>
                            <option value="Dark">Dark</option>
                        </select> -->

                    </form>

                </div>
            
            </div>
        
        </div>

        <script src = "scripts/main.js"></script>

    </body>

</html>