<?php 
session_start();
require_once('../../includes/config/db.php');

$staffData = '';
$total_earnings = '';

if (!isset($_SESSION['staff_session'])) {
    header('location: ../../index.php');
}
else {
    $staffData = $_SESSION['staff_session'];
}

$query = "SELECT * FROM audit";
$result = $conn->query($query);

// query to get total amount

$query0 = "SELECT sum(event_earning) as total_earnings FROM audit";
$result0 = $conn->query($query0);
if ($result0->num_rows > 0) {
    while ($row = $result0->fetch_assoc()) {
        $total_earnings = $row['total_earnings'];
    }
}
?>
<!DOCTYPE html>
<meta lang = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Audit</title>
        <link rel = "stylesheet" media = "all" href = "../../styles/style.css">
        <link rel = "shortcut icon" href = "../../images/logo.jpeg" type = "image/x-icon">
    </head>
    <body>
        
    <div class="top-bar">

        <div class="label-box">
            <p class = "page-label">Audit</p>
        </div>

        <div class="label-box">
            <p class = "page-label"></p>
        </div>

        <label class="account-menu">

            <input type="checkbox" name="" id=""> <!-- For the onclick menu -->

            <div class="menu">
                <a href="../../includes/actions/logout.php">Logout</a>
            </div>

            <div class="menu-button"></div>
            
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
                <a href="event-select-registration.php">Registrations</a>
                <a href="event-select-reservation.php">Reservations</a>
                <a href="branches.php">Branches</a>
                <a href="affiliates.php">Affiliates</a>
                <a href="audit.php">Audit</a>
                
            </div>

        </label>

    </div>

    <div class="content-container">

        <h2 class="audit">Transaction list</h2>

        <h3 class = "audit">
            Total earnings:
            <span>₱ <?php echo $total_earnings ?>.00</span>
        </h3>

        <?php 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo   '<label class="list-item">

                            <div class="list-item">
                
                                <input type="checkbox" name="" id="">
                
                                <p class="name">
                                    '.$row['event_name'].'
                                    <img src="../../images/state.png" alt="">
                                </p>
                
                                <div class="expanded-details" id = "audit">
                
                                    <p>
                                        Event registration fee
                                        <span>'.$row['event_fee'].'</span>
                                    </p>
                                    <p>
                                        Number of registrants
                                        <span>'.$row['event_registrants_count'].'</span>
                                    </p>
                                    <p><b>
                                        Event earnings
                                        <span>₱ '.$row['event_earning'].'.00</span>
                                    </b></p>
                
                                </div>
                
                            </div>
                
                        </label>';
            }
        }
        ?>

    </div>

    </body>
</html>