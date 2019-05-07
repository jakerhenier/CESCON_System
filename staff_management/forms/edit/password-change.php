<?php 
session_start();
require_once('../../../includes/config/db.php');
require_once('../../../includes/function/crypt.php');
require_once('../../../includes/config/session.php');

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
        <title>Change password</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        <div class="adding-fields">
            <div class="floating-form">
                <h3>Change account password</h3>
                <form action="" name="pw_change_form">

                    <!-- <p>Password</p> -->
                    <input type = "text" name = "password" id="curr-pass-field" value="<?php echo encrypt_decrypt($password, "decrypt"); ?>" disabled required>

                    <p>Enter existing password</p>
                    <input type="password" name="password" id="password" required>

                    <p>Enter new password</p>
                    <input type="password" name="password" id="password_new" required>

                    <p>Confirm new password</p>
                    <input type="password" name="password" id="password_verify" required>

                    <button type="submit" id="submit" disabled>Save changes</button>
                    <a href = "javascript:history.go(-1)">Go back</a>
                </form>
            </div>
        </div>

        <script src="../../../scripts/password.js"></script>
    </body>
</html>