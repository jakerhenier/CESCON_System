<?php 
session_start();
require_once('../../../includes/config/db.php');
require_once('../../../includes/function/crypt.php');

function getAccessLevel($access_level) {
    $keypair = array(
        "0" => "Normal User",
        "1" => "Administrator"
    );

    return $keypair[$access_level];
}

$staff_number = '';
$first_name = '';
$last_name = '';
$contact_number = '';
$username = '';
$password = '';
$access_level = '';

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

if (isset($_GET['edit'])) {
    $staff_number = $_GET['edit'];

    $query = "SELECT * FROM staff WHERE staff_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $staff_number);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $staff_number = $row['staff_number'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $contact_number = $row['contact_number'];
            $username = $row['username'];
            $password = $row['password'];         
            $access_level = $row['access_level'];   
        }
    }
}
?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Edit staff</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>

        <div class = "adding-fields">

            <div class = "floating-form">

                <h3>Edit staff information</h3>

                <form action = "../../../includes/actions/staff_edit.php" method="POST">

                    <p>First name</p>
                    <input type = "text" name = "first_name" value="<?php echo $first_name ?>" required>

                    <p>Last name</p>
                    <input type = "text" name = "last_name" value="<?php echo $last_name ?>" required>

                    <p>Contact number</p>
                    <div id = "contact-field">
                        <input type = "number" min=0 name = "contact_number" value="<?php echo $contact_number ?>" required>
                        <span>+63</span>
                    </div>

                    <p id = "staff-username">Username</p>
                    <input type = "text" name = "username" value="<?php echo $username ?>" required>

                    <p>Password</p>
                    <input type = "text" name = "password" value="<?php echo encrypt_decrypt($password, "decrypt"); ?>" required>

                    <p>Access Level</p>
                    <select name="access_level" required>
                        <option value="<?php echo $access_level ?>" selected><?php echo getAccessLevel($access_level) ?></option>
                    <?php 
                    if ($access_level == 0) { 
                    ?>
                        <option value="1">Administrator</option>
                    <?php } 
                    else if ($access_level == 1) { ?>
                        <option value="0">Normal User</option>
                    <?php } ?>
                    </select>

                    <!-- <p>Confirm password</p>
                    <input type = "password" name = "password-confirm"> -->

                    <button type = "submit" name="submit" value="<?php echo $staff_number ?>">Save changes</button>
                    <a href = "../../navigation/staffs-list.php">Go back</a>

                </form>

            </div>

        </div>

    </body>
</html>