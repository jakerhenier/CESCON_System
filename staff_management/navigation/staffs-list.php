<?php 
session_start();
require_once('../../includes/config/db.php');

function getAccessLevel($access_level) {
    $keypair = array(
        "0" => "Normal User",
        "1" => "Administrator"
    );

    return $keypair[$access_level];
}

$staffData = array();

if (!isset($_SESSION['staff_session'])) {
    header('location: ../../index.php');
}
else {
    $staffData = $_SESSION['staff_session'];
}

if ($staffData[0]['access_level'] == 0) {
    header('location: ../../index.php');
}

if (isset($_GET['delete'])) {
    $staff_number = $_GET['delete'];

    if ($staffData[0]['access_level'] == 0) {
        header('location: ../../index.php');
    }   

    $query = "DELETE FROM staff WHERE staff_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $staff_number);
    if ($stmt->execute()) {
        header('location: staffs-list.php');
    }
}

$query = "SELECT * FROM staff WHERE staff_number != {$staffData[0]['staff_number']}";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<meta lang = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>List of staffs</title>
        <link rel = "stylesheet" media = "all" href = "../../styles/style.css">
        <link rel = "shortcut icon" href = "../../images/logo.jpeg" type = "image/x-icon">
    </head>
    <body>

        <div class="top-bar">

            <div class="label-box">
                <p class = "page-label">Staffs</p>
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

            <h2>
                Church staffs
                <a href="../forms/add/staff-add.php">
                    <img src="../../images/add.png" alt="">
                    Add a new staff
                </a>    
            </h2>

            <div class="search-bar">
            
                <form action="">

                    <input type="text" name="" id="">
                    <button type="submit">Search</button>
                    <span>Search...</span>

                </form>    

            </div>

            <!-- <div class = "list-item">
                <span class = "last-name">Salvador, </span>
                <span class = "first-name">Antonio</span><br/>

                <div class="options" id = "out-opt">
                    <a href="../forms/edit/staff-edit.php">Edit</a>
                    <a href="">Delete</a>
                </div>

                <span class = "contact-number"><img src = "../../images/telephone.png">+639463742495</span>
            </div> -->

            <?php 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo   '<div class = "list-item">
                                <span class = "last-name">'.$row['last_name'].',</span>
                                <span class = "first-name">'.$row['first_name'].'</span><br/>
                                <div class="options" id = "out-opt">
                                    <a href="../forms/edit/staff-edit.php?edit='.$row['staff_number'].'">Edit</a>
                                    <a href="staffs-list.php?delete='.$row['staff_number'].'">Delete</a>
                                </div>
                                <span class = "contact-number"><img src = "../../images/telephone.png">+63'.$row['contact_number'].'</span>
                                <span class = "contact-number">Access Level: '.getAccessLevel($row['access_level']).'</span>
                            </div>';
                }
            }
            ?>

        </div>
        
    </body>
</html>