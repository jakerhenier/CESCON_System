<?php 
session_start();
require_once('../config/db.php');   

$staffData = array();

if (isset($_SESSION['staff_session'])) {
    $staffData = $_SESSION['staff_session'];
}

if (isset($_GET['event_id']) && isset($_GET['reservation_id'])) {
    $event_id = $conn->real_escape_string($_GET['event_id']);
    $reservation_id = $conn->real_escape_string($_GET['reservation_id']);
    $staff_number = $conn->real_escape_string($staffData[0]['staff_number']);

    // 1st step: GET first name and last name from reservation table
    $query_1 = "SELECT first_name, last_name FROM reservation WHERE reservation_id = {$reservation_id}";
    $result_1 = $conn->query($query_1);
    if ($result_1->num_rows > 0) {
        // 2nd step: INSERT event_id, reservation_id and staff_number to registration table
        $query_2 = "INSERT INTO registration VALUES ($reservation_id, $event_id, $staff_number, $reservation_id)";
        if ($conn->query($query_2)) {
            $row_1 = $result_1->fetch_assoc();

            $first_name = $row_1['first_name'];
            $last_name = $row_1['last_name'];

            // Update the status from reserved to registered in reservation table
            $up_query = "UPDATE reservation SET status = 'Registered' WHERE event_id = {$event_id} AND reservation_id = {$reservation_id}";
            if ($conn->query($up_query)) {
                // 3rd step: Check if name exists in member table
                $query_3 = "SELECT last_name, first_name FROM member WHERE last_name = '{$last_name}' AND first_name = '{$first_name}'";
                $result_3 = $conn->query($query_3);

                if ($result_3->num_rows > 0) {
                    // 4th step 1A: Redirect to reservations page
                    header('location: ../../staff_management/navigation/reservations.php?event_id='.$event_id);
                }
                else {
                    // 4th step 2A: INSERT names to member table
                    $query_4 = "INSERT INTO member (last_name, first_name) VALUES (?, ?)";
                    $stmt = $conn->prepare($query_4);
                    $stmt->bind_param('ss', $last_name, $first_name);
                    if ($stmt->execute()) {
                        header('location: ../../staff_management/navigation/reservations.php?event_id='.$event_id);
                    }
                    else {
                        echo $query_4 . "<br>" . $conn->error;
                    }
                }
            }
            else {
                echo $up_query . "<br>" . $conn->error;
            }
        }
        else {
            echo $query_2 . "<br>" . $conn->error;
        }
    }
    else {
        echo $query_1 . "<br>" . $conn->error;
    }
}
else {
    header('location: ../../staff_management/navigation/reservations.php?event_id='.$event_id);
}
?>