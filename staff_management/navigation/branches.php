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
    $branch_id = $_GET['delete'];

    $query = "DELETE FROM branch WHERE branch_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $branch_id);
    if ($stmt->execute()) {
        header('location: branches.php');
    }
}

$query = "SELECT * FROM branch";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Branch management</title>
        <link rel = "stylesheet" media = "all" href = "../../styles/style.css">
        <link rel="shortcut icon" href="../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="top-bar">

            <div class="label-box">
                <p class = "page-label">Branches</p>
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
                    <a href="audit.php">Audit</a>
                    
                </div>

            </label>

        </div>

        <div class="content-container">

            <h2>
                Branches
                <a href="../forms/add/branch-add.php">
                    <img src="../../images/add.png" alt="">
                    Add a new branch
                </a>    
            </h2>

            <div class="search-bar">
            
                <form action="">

                    <input type="text" name="" id="">
                    <button type="submit">Search</button>
                    <span>Search...</span>

                </form>    

            </div>

            <?php 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo   '<label class="list-item">
                                <div class="list-item">
                                    <input type = "checkbox" name = "" id = "">
                                    <p class = "name">
                                        '.$row['name'].'
                                        <img src = "../../images/state.png">
                                    </p>
                                    <div id = "branch-details">
                                        '.$row['description'].'

                                        <div class="options">
                                            <a href="../forms/edit/branch-edit.php?edit='.$row['branch_id'].'">Edit</a>
                                            <a href="branches.php?delete='.$row['branch_id'].'">Delete</a>
                                        </div>
                                    </div>
                                    <p id="branch-est">
                                        
                                        '.date('M j<\s\up>S</\s\up> Y', strtotime($row['date_established'])).'
                                    </p>
                
                                    <p id="branch-location">
                                        <img src="../../images/pin.png" alt="">
                                        '.$row['district'].'
                                    </p>
                                </div>
                            </label>';
                }
            }
            ?>

        </div>

    </body>
</html>