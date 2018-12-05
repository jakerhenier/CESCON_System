<?php 
require_once('../config/db.php');

if (isset($_POST['submit'])) {
    $pastor_number = $_POST['submit'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $contact_number = $_POST['contact_number'];

    $query = "UPDATE pastor SET last_name = ?, first_name = ?, contact_number =? WHERE pastor_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssi', $last_name, $first_name, $contact_number, $pastor_number);
    if ($stmt->execute()) {
        header('location: ../../staff_management/navigation/pastors-list.php');
    }
}
else {
    header('location: ../../staff_management/forms/edit/pastors-edit.php');
}
?>