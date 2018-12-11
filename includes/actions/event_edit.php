<?php
session_start();
require_once('../config/db.php');

$staffData = array();
if (isset($_SESSION['staff_session'])) {
    $staffData = $_SESSION['staff_session'];
} 

if (isset($_POST['submit'])) {
    $event_id = $_POST['submit'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $date = date("Y-m-d H:i:s", strtotime($_POST['date']));
    $rate = $_POST['rate'];
    $details = $_POST['details'];
    $branch_id = $staffData[0]['branch_id'];

    $query = "UPDATE event SET title = ?, location = ?, date = ?, details = ?, rate = ?, branch_id = ? WHERE event_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssiii', $title, $location, $date, $details, $rate, $branch_id, $event_id);
    if ($stmt->execute()) {
        $up_query = "UPDATE event_edit_logs SET edited_by_user = {$staffData[0]['staff_number']} WHERE event_id = {$event_id}";
        if ($conn->query($up_query)) {
            header('location: ../../staff_management/navigation/events-manage.php');
        }
        else {
            echo $conn->error . '<br>' . $up_query;
        }
    }
    else {
        echo $stmt->error;
    }
}
else {
    header('location: ../../staff_management/forms/edit/event-edit.php');
}

?>