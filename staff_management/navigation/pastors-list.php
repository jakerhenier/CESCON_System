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
    $pastor_number = $_GET['delete'];

    $query = "DELETE FROM pastor WHERE pastor_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $pastor_number);
    if ($stmt->execute()) {
        header('location: pastors-list.php');
    }
}

$query = "SELECT * FROM pastor";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Church pastors</title>
        <link rel = "stylesheet" media = "all" href = "../../styles/style.css">
        <link rel="shortcut icon" href="../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="top-bar">

            <div class="label-box">
                <p class = "page-label">Pastors</p>
            </div>

            <label class="account-menu">

                <input type="checkbox" name="" id=""> <!-- For the onclick menu -->

                <div class="menu">
                    <a href="">Menu</a>
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
                    
                </div>

            </label>

        </div>

        <div class="content-container">

            <h2>
                Church pastors
                <a href="../forms/add/pastor-add.php">
                    <img src="../../images/add.png" alt="">
                    Add a pastor
                </a>    
            </h2>

            <?php 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo   '<div class = "list-item">
                                <span class = "last-name">'.$row['last_name'].',</span>
                                <span class = "first-name">'.$row['first_name'].'</span><br/>
                                <div class="options" id = "out-opt">
                                    <a href="../forms/edit/pastor-edit.php?edit='.$row['pastor_number'].'">Edit</a>
                                    <a href="pastors-list.php?delete='.$row['pastor_number'].'">Delete</a>
                                </div>
                                <span class = "contact-number"><img src = "../../images/telephone.png">+63'.$row['contact_number'].'</span>
                            </div>';
                }
            }
            ?>
            
        </div>
    </body>
</html>