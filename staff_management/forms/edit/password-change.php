<?php 
session_start();

require_once('../../../includes/function/crypt.php');


$staffData = array();

if (!isset($_SESSION['staff_session'])) {
    header('location: ../../index.php');
}
else {
    $staffData = $_SESSION['staff_session'];
}   

if ($staffData[0]['access_level'] == 0) {
    header('location: ../../index.php');
}

?>

<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Change password</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        <div class="adding-fields">
            <div class="floating-form">
                <h3>Change account password</h3>
                <?php

                if (isset($_SESSION['changepass_failed'])) {
                    foreach($_SESSION['changepass_failed'] as $errors){
                        echo '<span style="text-align: center; color: red; padding: 20px;">'. $errors . '</span>';
                    }
                    
                }
                unset($_SESSION['changepass_failed']);

                ?>

                <form action="../../../includes/actions/changepass.php" method="POST" name="pw_change_form">

                    <!-- <p>Password</p> -->
                    <input type = "text" name = "password" id="curr-pass-field" value="<?php echo encrypt_decrypt($staffData[0]['password'], "decrypt"); ?>" disabled required>

                    <p>Enter existing password</p>
                    <input type="password" name="password" id="password" required>

                    <p>Enter new password</p>
                    <input type="password" name="password_new" id="password_new" required>

                    <p>Confirm new password</p>
                    <input type="password" name="password_verify" id="password_verify" required>

                    <button type="submit" id="submit" name = "changepass" value = "changepass" disabled>Save changes</button>
                    <a href = "../../index.php">Go back</a>
                </form>
            </div>
        </div>

        <script src="../../../scripts/password.js"></script>
    </body>
</html>