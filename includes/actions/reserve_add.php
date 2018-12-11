<?php 
session_start();
require_once('../config/db.php');

if(isset($_POST['submit'])) {
    $event_id = $_POST['submit'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $validate_query = "SELECT * FROM reservation WHERE first_name = ? AND last_name = ? AND event_id = ?";
    $val_stmt = $conn->prepare($validate_query);
    $val_stmt->bind_param('ssi', $first_name, $last_name, $event_id);
    $val_stmt->execute();
    $validate_result = $val_stmt->get_result();
    if (!($validate_result->num_rows > 0)) {
        $query = "INSERT INTO reservation (first_name, last_name, event_id) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssi', $first_name, $last_name, $event_id);
        if ($stmt->execute()) {
            $_SESSION['reserve_msg'] = "Reservation successful.";
            header("location: ../../member_reservation/reserve.php?event_id={$event_id}");
        }
        else {
            echo $stmt->error;
        }
    }
    else{
        $_SESSION['reserve_msg'] = "You are already reserved in this event.";
        header("location: ../../member_reservation/reserve.php?event_id={$event_id}");
    }
}

?>