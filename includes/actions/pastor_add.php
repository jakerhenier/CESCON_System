<?php 
require_once('../config/db.php');
require_once('../function/form_validation.php');

if (isset($_POST['submit'])) {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $contact_number = $_POST['contact_number'];

    if(validate_pastor($first_name, $last_name, $contact_number)) {
        $query = "INSERT INTO pastor (last_name, first_name, contact_number) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $last_name, $first_name, $contact_number);
        if ($stmt->execute()) {
            header('location: ../../staff_management/navigation/pastors-list.php');
        }
    }
}
else {
    header('location: ../../staff_management/forms/add/pastor-add.php');
}
?>