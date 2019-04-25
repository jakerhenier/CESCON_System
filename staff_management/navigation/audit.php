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

$query = "CALL getAudit";
$result = $conn->query($query);

$conn->next_result(); // To close previous connection held by stored procedure.

// query to get total amount

$query0 = "CALL getTotalEarned";
$result0 = $conn->query($query0);
var_dump($result0);
if ($result0->num_rows > 0) {
    while ($row = $result0->fetch_assoc()) {
        $total_earnings = $row['total_earnings'];
    }
}
?>

<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

<html>

    <head>
        <title>Audit</title>

        <link rel="stylesheet" type = "text/css" media = "all" href="../../styles/style.css">
        <link rel="shortcut icon" href="../../images/logo_clear.png" type="image/x-icon">
    </head>

    <body>
    
    <div class="top-menu" id="top-menu">

        <div class="top-init" id="top-init">
            <div class="icon-box">
                <img src="../../images/logo_clear.png" alt="" id="top-logo">
            </div>

            <div class="context-box">
                <div class="menu-button" id ="menu-button">
                    <img src="../../images/menu.png" alt="" id="menu-icon" onclick="expandMenu()">
                </div>
                <p class="page-label">Audit</p>
            </div>
        </div>

        <div class="top-actions" id = "mobile-bottom">
            <a href="../../includes/actions/logout.php" class="logout-button">
                <div class="logout-button-box">
                    logout
                </div>
            </a>
            <p id = "username">
                <?php echo $staffData[0]['first_name'].' '.$staffData[0]['last_name']; ?>
            </p>
        </div>

        <div class="top-menu-list">
            
            <div class="menu-category">
                <a href="audit.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Audit</p>
                        <img src="../../images/audit.png" alt="" id="item-icon">
                    </div>
                </a>

                <a href="events.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Events</p>
                        <img src="../../images/events.png" alt="" id="item-icon">
                    </div>
                </a>

                <a href="reservations.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Reservations</p>
                        <img src="../../images/registrants.png" alt="" id="item-icon">
                    </div>
                </a>
            </div>

            <div class="break"></div>

            <div class="menu-category">
                <a href="members.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Members</p>
                        <img src="../../images/member.png" alt="" id="item-icon">
                    </div>
                </a>

                <a href="staffs.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Staffs</p>
                        <img src="../../images/staff.png" alt="" id="item-icon">
                    </div>
                </a>

                <a href="pastors.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Pastors</p>
                        <img src="../../images/pastor.png" alt="" id="item-icon">
                    </div>
                </a>
            </div>

            <div class="break"></div>

            <div class="menu-category">
                <a href="branches.php" class="top-menu-item">
                    <div class="top-link-box">
                        <p>Branches</p>
                        <img src="../../images/branch.png" alt="" id="item-icon">
                    </div>
                </a>
            </div>

        </div>

    </div>
        
        <div class="content-box" id = "main-content">

            <div class="side-menu" id="side-menu">

                <div class="branding">
                    <img id = "brand-logo" src="../../images/logo_clear.png" alt="CESCON logo">
                    <p id="brand-name">CESCON</p>
                </div>

                <div class="menu-list">

                    <a href="audit.php" class="menu-link" id="menu-link">
                        <div class="link-box event-menu-item" id = "active-item">
                            <img src="../../images/audit.png" alt="" id="item-icon">
                            <p>Audit</p>
                        </div>
                    </a>

                    <a href="events.php" class="menu-link" id="menu-link">
                        <div class="link-box event-menu-item">
                            <img src="../../images/events.png" alt="" id="item-icon">
                            <p>Events</p>
                        </div>
                    </a>

                    <a href="reservations.php" class="menu-link" id="menu-link">
                        <div class="link-box event-menu-item">
                            <img src="../../images/registrants.png" alt="" id="item-icon">
                            <p>Reservations</p>
                        </div>
                    </a>

                    <div class="break"></div>

                    <a href="members.php" class="menu-link" id="menu-link">
                        <div class="link-box affiliate-item">
                            <img src="../../images/member.png" alt="" id="item-icon">
                            <p>Members</p>
                        </div>
                    </a>

                    <a href="staffs.php" class="menu-link" id="menu-link">
                        <div class="link-box affiliate-item">
                            <img src="../../images/staff.png" alt="" id="item-icon">
                            <p>Staffs</p>
                        </div>
                    </a>

                    <a href="pastors.php" class="menu-link" id="menu-link">
                        <div class="link-box affiliate-item">
                            <img src="../../images/pastor.png" alt="" id="item-icon">
                            <p>Pastors</p>
                        </div>
                    </a>

                    <div class="break"></div>

                    <a href="branches.php" class="menu-link" id="menu-link">
                        <div class="link-box branch-item">
                            <img src="../../images/branch.png" alt="" id="item-icon">
                            <p>Branches</p>
                        </div>
                    </a>

                </div>

                <div class="bottom-items">
                    <p id = "username-area">
                        <?php echo $staffData[0]['first_name'].' '.$staffData[0]['last_name']; ?>
                    </p>

                    <button id="input-toggle">
                        <img id = "action-icon" src="../../images/dark_outline.png" alt="" onclick="darkMode()">
                    </button>

                    <a href="../../includes/actions/logout.php" class="logout-button">
                        <div class="logout-box">
                            <span class="out-context">logout</span>
                            <img src="../../images/logout.png" alt="" id="action-icon">
                        </div>
                    </a>
                </div>

            </div>

            <div class="item-screen" id="item-screen">

                <div class="detail-box">

                    <!-- <div class="toolbar">

                        <a href="" id = "add-button">
                            <div class="link-box-add">
                                <img src="../../images/add.png" alt="" class="tool-icon" id="add-icon">
                                <span>ADD NEW</span>
                            </div>
                        </a>

                        <div class="searchbar">
                            <input type="text" name="" id="search" placeholder = "Search">
                            <button id = "search-bt" type="submit">
                                <img src="../../images/search.png" alt="" class="tool-icon">
                            </button>
                        </div>

                    </div> -->

                    <div class="item-list">

                        <div id="audit-summary">

                            <div id="summary-item">
                                <p>Total earnings:</p>
                                <span id="total">₱ <?php echo $total_earnings ?>.00</span>
                            </div>

                        </div>

                        <!-- <div class="list-item">
                            <div id="member-placeholder">
                                <span id="event-total">10000</span>
                                <p id="event-name">Event name</p>
                            </div>

                            <div id="member-details">
                                <div class="audit-spec" id="spec-item">
                                    <img src="../../images/fee.png" id="spec-img" alt="">
                                    <p id="spec-detail">90.00</p>
                                </div>
                                <div class="audit-spec reg-count" id="spec-item">
                                    <img src="../../images/registrant.png" id="spec-img" alt="">
                                    <p id="spec-detail">12</p>
                                </div>
                            </div>
                        </div> -->

                        <?php 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo   '<div class="list-item">
                                                <div id="member-placeholder">
                                                    <span id="event-total">'.$row['event_earning'].'</span>
                                                    <p id="event-name">'.$row['event_name'].'</p>
                                                </div>
                    
                                                <div id="member-details">
                                                    <div class="audit-spec" id="spec-item">
                                                        <img src="../../images/fee.png" id="spec-img" alt="">
                                                        <p id="spec-detail">'.$row['event_fee'].'</p>
                                                    </div>
                                                    <div class="audit-spec reg-count" id="spec-item">
                                                        <img src="../../images/registrant.png" id="spec-img" alt="">
                                                        <p id="spec-detail">'.$row['event_registrants_count'].'</p>
                                                    </div>
                                                </div>
                                            </div>';
                                }
                            }
                            ?>

                    </div>

                </div>

            </div>

        </div>

        <script src = "../../scripts/main.js"></script>

    </body>

</html>