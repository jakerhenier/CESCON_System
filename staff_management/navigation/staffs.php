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
    else {
        $_SESSION['staff_error'] = "Staff removal failed: Must remove first all elements that affect this staff's data.";
    }
}

$query = "SELECT * FROM staff WHERE staff_number != {$staffData[0]['staff_number']}";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

<html>

    <head>
        <title>Staffs</title>

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
                <p class="page-label">Staffs</p>
            </div>
        </div>

        <div class="top-actions" id = "mobile-bottom">
            <a href="../../includes/actions/logout.php" class="logout-button">
                <div class="logout-button-box">
                    logout
                </div>
            </a>
            <p id = "username"><?php echo $staffData[0]['first_name'].' '.$staffData[0]['last_name']; ?></p>
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
                        <div class="link-box event-menu-item">
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
                        <div class="link-box affiliate-item aff-active" id = "active-item">
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
                    <p id = "username-area"><?php echo $staffData[0]['first_name'].' '.$staffData[0]['last_name']; ?></p>

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

                    <div class="toolbar">

                        <a href="../forms/add/staff-add.php" id = "add-button">
                            <div class="link-box-add aff-add-bt">
                                <img src="../../images/add.png" alt="" class="tool-icon" id="add-icon">
                                <span>ADD NEW</span>
                            </div>
                        </a>

                        <div class="searchbar aff-search">
                            <input type="text" name="" id="search" placeholder = "Search">
                            <button id = "search-bt" type="submit">
                                <img src="../../images/search.png" alt="" class="tool-icon">
                            </button>
                        </div>

                    </div>

                    <div class="item-list">

                        <?php 
                        if (isset($_SESSION['staff_error'])) {
                            echo '<span style="text-align: center; color: red; padding: 20px;">'. $_SESSION['staff_error'] . '</span>';
                            unset($_SESSION['staff_error']);
                        }
                        ?>

                        <!-- <div class="list-item">
                            <div id="member-placeholder">
                                <a id = "edit-button" href="../forms/edit/staff-edit.php">
                                    <img src="../../images/edit.png" alt="" class="edit-icon">
                                </a>
                                <p>Staff name</p>
                            </div>
                            <span id="access-lvl">Administrator</span>
                            <div id="spec-item">
                                <img src="../../images/staffcontact.png" id="spec-img" alt="">
                                <p id="spec-detail">Contact number</p>
                            </div>
                        </div> -->

                        <?php 
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo   '<div class="list-item">
                                            <div id="member-placeholder">
                                                <a id = "edit-button" href="../forms/edit/staff-edit.php?edit='.$row['staff_number'].'">
                                                    <img src="../../images/edit.png" alt="" class="edit-icon">
                                                </a>
                                                <p>'.$row['first_name'].' '.$row['last_name'].'</p>
                                            </div>
                                            <span id="access-lvl">'.getAccessLevel($row['access_level']).'</span>
                                            <div id="spec-item">
                                                <img src="../../images/staffcontact.png" id="spec-img" alt="">
                                                <p id="spec-detail">'.$row['contact_number'].'</p>
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