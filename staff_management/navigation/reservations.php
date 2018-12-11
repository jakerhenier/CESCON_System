<?php
session_start();
require_once('../../includes/config/db.php');

$staffData = '';

if (!isset($_SESSION['staff_session'])) {
    header('location: ../../index.php');
}
else {
    $staffData = $_SESSION['staff_session'];
}

if (isset($_GET['event_id'])) {
    $event_id = $conn->real_escape_string($_GET['event_id']);

    $query = "SELECT * FROM reservation WHERE event_id = {$event_id} AND status = 'Reserved'";
    $result = $conn->query($query);
}
else {
    header('location: events-manage.php');
}
?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>List of reservations</title>
        <link rel = "stylesheet" media = "all" href = "../../styles/style.css">
        <link rel="shortcut icon" href="../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="top-bar">

            <div class="label-box">
                <p class = "page-label">Reservations</p>
            </div>

            <label class="account-menu">

                <input type="checkbox" name="" id=""> <!-- For the onclick menu -->

                <div class="menu">
                    <a href="">Menu </a>
                    <a href="">Menu</a>
                    <a href="">Menu</a>
                </div>

                <div class="menu-button">
                </div>
                
                <p class="username"> <!--Name of user will be displayed here -->
                    Hello, <?php echo $staffData[0]['first_name'].' '.$staffData[0]['last_name']; ?>
                </p>
                
            </label>

            <label class = "navigation-menu">

                <input type="checkbox" name="" id="">

                <div class = "hamburger-menu">
                    <!--
                    <div class="hamburger-lines"></div>
                    <div class="hamburger-lines"></div>
                    <div class="hamburger-lines"></div> -->
                </div>
                
                <div class = "navigation-items">
                    
                    <a href="events-manage.php">Events</a>
                    <a href="event-select.php">Registrations</a>
                    <a href="event-select.php">Reservations</a>
                    <a href="branches.php">Branches</a>
                    <a href="affiliates.php">Affiliates</a>
                    
                </div>

            </label>

        </div>

        <div class="content-container">

            <h2>Pending registrations</h2>

            <table id = "reservations">
                <?php 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>

                                <td>
                                    <p>'.$row['first_name'].' '.$row['last_name'].'</p>
                                    <p id = "date-reserved">reserved since <b>'.date('M j<\s\up>S</\s\up> Y', strtotime($row['date_reserved'])).'</b></p>
                                </td>
                                <td>
                                    <a href="../../includes/actions/reservation_confirm.php?event_id='.$event_id.'&reservation_id='.$row['reservation_id'].'">Confirm</a>
                                </td>
            
                            </tr>';
                    }
                }
                ?>
            </table>

        </div>

        <div class="confirm-dialog">

            <div class="confirm-box">

                <p>Confirm reservation?</p>

                <div>
                    <button>Yes</button>
                    <button>No</button>
                </div>

            </div>

        </div>

    </body>
</html>