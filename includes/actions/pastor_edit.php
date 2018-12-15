<?php 
session_start();
require_once('../config/db.php');

$staffData = array();
if (isset($_SESSION['staff_session'])) {
    $staffData = $_SESSION['staff_session'];
}

if (isset($_POST['submit'])) {
    $pastor_number = $_POST['submit'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $contact_number = $_POST['contact_number'];

    $query = "UPDATE pastor SET last_name = ?, first_name = ?, contact_number = ? WHERE pastor_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssi', $last_name, $first_name, $contact_number, $pastor_number);
    if ($stmt->execute()) {
        $up_query = "UPDATE pastor_edit_logs SET edit_by_user = {$staffData[0]['staff_number']} WHERE pastor_number = {$pastor_number}";
        if ($conn->query($up_query)) {
            header('location: ../../staff_management/navigation/pastors-list.php');
        }
        else {
            echo $conn->error . '<br>' . $up_query;
        }
    }
}
else {
    header('location: ../../staff_management/forms/edit/pastors-edit.php');
}
?>