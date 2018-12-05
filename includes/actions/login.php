<?php 
session_start();
require_once('../config/db.php');
require_once('../function/login_validation.php');
require_once('../function/crypt.php');

$staffData = array();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (validate_login($username, $password)) {
        $password = encrypt_decrypt($_POST['password'], "encrypt");
        
        $query = "SELECT * FROM staff WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $staffData[] = $row;
            }
            $_SESSION['staff_session'] = $staffData;
            header('location: ../../staff_management/');
        }
        else {
            array_push($errors, "Credentials not found.");
            resetSession($errors);
            header('location: ../../index.php');
        }
    }
}
else {
    header('location: ../../index.php');
}
?>