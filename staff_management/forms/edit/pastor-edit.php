<?php 
require_once('../../../includes/config/db.php');
require_once('../../../includes/config/session.php');

$pastor_number = '';
$first_name = '';
$last_name = '';
$contact_number = '';

if (isset($_GET['edit'])) {
    $pastor_number = $_GET['edit'];

    $query = "SELECT * FROM pastor WHERE pastor_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $pastor_number);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pastor_number = $row['pastor_number'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $contact_number = $row['contact_number'];
        }
    }
}
?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Edit pastor</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>

        <div class = "adding-fields">

            <div class = "floating-form">

                <h3>Edit pastor's information</h3>

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

                <form action = "../../../includes/actions/pastor_edit.php" method="POST">

                    <p>First name</p>
                    <input type = "text" name = "first_name" id="first-name" value="<?php echo $first_name ?>" required autofocus>
                    <span class="invalid" id="invalid-fn">Invalid value</span>

                    <p>Last name</p>
                    <input type = "text" name = "last_name" id="last-name" value="<?php echo $last_name ?>" required>
                    <span class="invalid" id="invalid-ln">Invalid value</span>

                    <p>Contact number</p>
                    <div id = "contact-field">
                        <input type = "number" min=0 name = "contact_number" id="contact" value="<?php echo $contact_number ?>">
                        <span>+63</span>

                        <span class="invalid" id="invalid-num">Invalid value</span>
                        <span class="invalid" id="invalid-form">Invalid format</span>
                    </div>

                    <button type = "submit" name="submit" id="submit" value="<?php echo $pastor_number   ?>">Save</button>
                    <a href = "../../navigation/pastors-list.php">Go back</a>

                </form>

            </div>

        </div>

        <script src="../../../scripts/main.js"></script>

    </body>
</html>