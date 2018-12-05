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

$query = "SELECT * FROM event WHERE branch_id = {$staffData[0]['branch_id']}";
$result = $conn->query($query);

?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Event managment</title>
        <link rel = "stylesheet" media = "all" href = "../../styles/style.css">
        <link rel="shortcut icon" href="../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="top-bar">

            <div class="label-box">
                <p class = "page-label">Events</p>
            </div>

            <label class="account-menu">

                <input type="checkbox" name="" id=""> <!-- For the onclick menu -->

                <div class="menu">
                    <a href="">Menu </a>
                    <a href="">Menu</a>
                    <a href="../../includes/actions/logout.php">Logout</a>
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
                    <div class="hamburger-lines first-line"></div>
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

            <h2>
                Events
                <a href="../forms/add/event-add.php">
                    <img src="../../images/add.png" alt="">
                    Add event
                </a>
            </h2>

            <!-- <a href="">
                <div class="list-item">
                    <p id="event-title">Title here</p>

                    <div class="options">
                        <a href="../forms/edit/member-edit.php">Edit</a>
                        <a href="">Delete</a>
                    </div>

                    <p id = "event-date">
                        <img src="../../images/date.png" alt="">
                        November 1, 2018
                    </p>
                </div>
            </a> -->
            <?php 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo   '<a href="">
                                <div class="list-item">
                                    <p id="event-title">'.$row['title'].'</p>

                                    <div class="options">
                                        <a href="../forms/edit/event-edit.php">Edit</a>
                                        <a href="">Delete</a>
                                    </div>

                                    <p id = "event-date">
                                        <img src="../../images/date.png" alt="">
                                        '.date('M j<\s\up>S</\s\up> Y', strtotime($row['date'])).'
                                    </p>
                                </div>
                            </a>';
                }
            }
            ?>

        </div>

    </body>
</html>