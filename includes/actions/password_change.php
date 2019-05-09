<?php 
session_start();
require_once('../config/db.php');
require_once('../function/crypt.php');

if(isset($_POST['submit'])) {
    $password = encrypt_decrypt($_POST['password'], "encrypt");

    $query = "UPDATE staff SET password = ? WHERE staff_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssssii', $password);
    if ($stmt->execute()) {
        session_unset();
        session_destroy();
        session_start();
    }
    else {
        echo $stmt->error;
    }
}
else {
    header('location: ../../staff_management/forms/edit/password-change.php');
}

?>