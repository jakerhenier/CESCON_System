<?php
session_start();
require_once('../config/db.php');

$staffData = array();
if (isset($_SESSION['staff_session'])) {
    $staffData = $_SESSION['staff_session'];
} 

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $date = date("Y-m-d H:i:s", strtotime($_POST['date']));
    $rate = $_POST['rate'];
    $details = $_POST['details'];
    $branch_id = $staffData[0]['branch_id'];

    $query = "INSERT INTO event (title, location, date, details, rate, branch_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssii', $title, $location, $date, $details, $rate, $branch_id);
    if ($stmt->execute()) {
        header('location: ../../staff_management/navigation/events-manage.php');
    }
    else {
        echo $stmt->error;
    }
}
else {
    header('location: ../../staff_management/forms/add/event-add.php');
}

?>