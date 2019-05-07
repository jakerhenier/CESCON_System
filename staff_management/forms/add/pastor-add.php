<?php 
    session_start();
    require_once('../../../includes/config/session.php');
?>

<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Add a pastor</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>

        <div class = "adding-fields">

            <div class = "floating-form">

                <h3>Add new pastor's information</h3>

                <?php 
                    if (isset($_SESSION['reg_msg'])) {
                        foreach($_SESSION['reg_msg'] as $errors) {
                            echo   '<div id = "val-err">
                                        <p>'. $errors .'</p>
                                    </div>';
                        }
                        unset($_SESSION['reg_msg']);
                    }
                ?>

                <form action = "../../../includes/actions/pastor_add.php" method="POST">

                    <p>First name</p>
                    <input type = "text" name = "first_name" id="first-name" required autofocus>
                    <span class="invalid" id="invalid-fn">Invalid value</span>

                    <p>Last name</p>
                    <input type = "text" name = "last_name" id="last-name" required>
                    <span class="invalid" id="invalid-ln">Invalid value</span>

                    <p>Contact number</p>
                    <div id = "contact-field">
                        <input type = "number" min=0 name = "contact_number" id="contact">
                        <span>+63</span>

                        <span class="invalid" id="invalid-num">Invalid value</span>
                        <span class="invalid" id="invalid-form">Invalid format</span>
                    </div>

                    <button type = "submit" name="submit" id="submit" value="submit">Add</button>
                    <a href = "../../navigation/pastors-list.php">Go back</a>

                </form>

            </div>

        </div>

        <script src="../../../scripts/main.js"></script>

    </body>
</html>