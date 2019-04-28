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

if (isset($_GET['delete'])) {
    $event_id = $conn->real_escape_string($_GET['delete']);

    $query = "DELETE FROM event WHERE event_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $event_id);
    if ($stmt->execute()) {
        $up_query = "UPDATE event_delete_logs SET deleted_by_user = {$staffData[0]['staff_number']} WHERE event_id = {$event_id}";
        if ($conn->query($up_query)) {
            header('location: events-manage.php');
        }
        else {
            echo $conn->error . '<br>' . $up_query;
        }
    }
    else {
        $_SESSION['event_error'] = "Event removal failed: Must remove first all properties that affect this event's data.";
    }
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
        <link rel="shortcut icon" href="../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="top-bar">

            <div class="label-box">
                <p class = "page-label">Events</p>
            </div>

            <label class="account-menu">

                <input type="checkbox" name="" id=""> <!-- For the onclick menu -->

                <div class="menu">
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
                    <a href="event-select-registration.php">Registrations</a>
                    <a href="event-select-reservation.php">Reservations</a>
                    <a href="branches.php">Branches</a>
                    <a href="affiliates.php">Affiliates</a>
                    <a href="audit.php">Audit</a>
                    
                </div>

            </label>

        </div>

        <div class="content-container">

            <?php 
            if (isset($_SESSION['event_error'])) {
                echo '<span style="text-align: center; color: red; padding: 20px;">'. $_SESSION['event_error'] . '</span>';
                unset($_SESSION['event_error']);
            }
            ?>

            <h2>
                Events
                <a href="../forms/add/event-add.php">
                    <img src="../../images/add.png" alt="">
                    Add event
                </a>
            </h2>

            <!-- <div class="search-bar">
            
                <form action="">

                    <input type="text" name="" id="">
                    <button type="submit">Search</button>
                    <span>Search...</span>

                </form>    

            </div> -->

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

                                    <div class= "options" id="event-option">
                                        <a href="../forms/edit/event-edit.php?edit='.$row['event_id'].'">Edit</a>
                                        <a href="events-manage.php?delete='.$row['event_id'].'"">Delete</a>
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