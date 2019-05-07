<?php 
session_start();
require_once('../../includes/config/db.php');
require_once('../../includes/config/session.php');

$staffData = '';

if (!isset($_SESSION['staff_session'])) {
    header('location: ../../index.php');
}
else {
    $staffData = $_SESSION['staff_session'];
}

if (isset($_GET['event_id'])) {
    $event_id = $conn->real_escape_string($_GET['event_id']);

    $query = "SELECT * FROM registration WHERE event_id = {$event_id}";
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
        <title>Registrant list</title>
        <link rel = "stylesheet" media = "all" href = "../../styles/style.css">
        <link rel="shortcut icon" href="../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="top-bar">

            <div class="label-box">
                <p class = "page-label">Registrations</p>
            </div>

            <label class="account-menu">

                <input type="checkbox" name="" id=""> <!-- For the onclick menu -->

                <div class="menu">
                    <?php echo '<a href="../forms/edit/password-change.php?edit='.$staffData[0]['staff_number'].'">Change password</a>' ?>
                    <a href="../../includes/actions/logout.php">Logout</a>
                </div>

                <div class="menu-button">
                </div>
                
                <p class="username"> <!--Name of user will be displayed here -->
                    Username
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
                    <a href="event-select-registration.php">Registrations</a>
                    <a href="event-select-reservation.php">Reservations</a>
                    <a href="branches.php">Branches</a>
                    <a href="affiliates.php">Affiliates</a>
                    <a href="audit.php">Audit</a>
                    
                </div>

            </label>

        </div>

        <div class="content-container">

            <h2>
                Event registrants
                <!-- <a href="../forms/add/registrant-add.php">
                    <img src="../../images/add.png" alt="">
                    Add a registrant
                </a> -->
            </h2>

            <!-- <p id = "success"><img src="../../images/check_circled.png" alt="">Successfully added!</p> -->

            <table>

                <?php 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr><td>'.$row['last_name'].', '.$row['first_name'].'</td></tr>';
                    }
                }
                ?>

            </table>

        </div>

    </body>
</html>