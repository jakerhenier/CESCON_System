<?php 
// default timezone 
date_default_timezone_set("Asia/Manila"); 
session_start();
require_once('../config/db.php');
require_once('../function/login_validation.php');
require_once('../function/crypt.php');

$staffData = array();

if(!isset($_SESSION['attempts'])) {
    $attempts = 0;
}
$login_attempt = (int)$_SESSION['attempts'];

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
            $attempts++;
            $_SESSION['attempts'] = $_SESSION['attempts'] + $attempts;
            array_push($errors, "Credentials not found. ".$_SESSION['attempts']);
            resetSession($errors);
            
            if ($login_attempt === 3) {
                array_push($errors, "Login attempt exceeded.");
                resetSession($errors);
                // resetSession($attempts);
                $_SESSION['attempts'] = 0;
                header('location: ../../index.php');
            }

            header('location: ../../index.php');
            
        }
        // Check password date for expiry notification
        $time = strtotime($staffData[0]['pass_date']);
        $date_now = date("Y-m-d H:i:s");
        $final = date("Y-m-d H:i:s", strtotime("+1 month", $time)); 

        if ($date_now >= $final) {
            $_SESSION['password_warning'] = 
            "Warning! Your password is a month old. You are required to change your password as soon possible.
            <br>
            To change your password, go to <strong>Menu</strong>, and click <strong>Change Password</strong>.";
        }
    }
}
else {
    header('location: ../../index.php');
}
?>