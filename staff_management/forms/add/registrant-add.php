<?php 
    session_start();
    require_once('../../../includes/config/session.php');
?>

<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Add a registrant</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>

        <div class = "adding-fields">

            <div class = "floating-form">

                <h3>Add event registrant's information</h3>

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

                <form action = "">

                    <p>First name</p>
                    <input type = "text" name = "first-name">

                    <p>Last name</p>
                    <input type = "text" name ="last-name">

                    <button type = "submit">Add</button>
                    <a href = "../../navigation/registrants.php">Go back</a>

                </form>

            </div>

        </div>

    </body>
</html>