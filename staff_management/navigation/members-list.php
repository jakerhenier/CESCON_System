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

$query = "SELECT * FROM member INNER JOIN pastor ON member.pastor_id = pastor.pastor_number";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>CESCON members</title>
        <link rel = "stylesheet" media = "all" href = "../../styles/style.css">
        <link rel="shortcut icon" href="../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="top-bar">

            <div class="label-box">
                <p class = "page-label">Members</p>
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
                    <a href="event-select.php">Registrations</a>
                    <a href="event-select.php">Reservations</a>
                    <a href="branches.php">Branches</a>
                    <a href="affiliates.php">Affiliates</a>
                    
                </div>

            </label>

        </div>

        <div class="content-container">
            
            <h2>
                Church members
                <a href="../forms/add/member-add.php">
                    <img src="../../images/add.png" alt="">
                    Add a new member
                </a>    
            </h2>

            <?php 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo   '<label class="list-item">
                                <div class="list-item">
                                    <input type="checkbox" name="" id="">
                                    <p class="name">
                                        '.$row['first_name'].' '.$row['last_name'].'
                                        <img src="../../images/state.png" alt="">
                                    </p>
                
                                    <div class="expanded-details">
                                        <p>Sex: <span id="sex">'.$row['sex'].'</span></p>
                                        <p>Birthdate: <span id="birthdate">'.date('M j<\s\up>S</\s\up> Y', strtotime($row['DOB'])).'</span></p>
                                        <p>Allergies: <span id="allergies">'.$row['allergies'].'</span></p>
                                        <p>Church address: <span id="church-address">Davao City</span></p>
                                        <p>Pastor: <span id="pastor">'.$row['first_name'].' '.$row['last_name'].'</span></p><br/>
                                        <p>Contact number: <span id="contact-no">'.$row['contact_number'].'</span></p>
                                        <p>Email: <span id="email">'.$row['email'].'</span></p>
                                    </div>
                                </div>
                            </label>';
                }
            }
            ?>
        </div>

    </body>
</html>