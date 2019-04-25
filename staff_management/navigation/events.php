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
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

<html>

    <head>
        <title>Events</title>

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
                <p class="page-label">Events</p>
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
                        <div class="link-box event-menu-item" id = "active-item">
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

                        <a href="../forms/add/event-add.php" id = "add-button">
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

                    </div>

                    <div class="item-list">

                        <?php 
                        if (isset($_SESSION['event_error'])) {
                            echo '<span style="text-align: center; color: red; padding: 20px;">'. $_SESSION['event_error'] . '</span>';
                            unset($_SESSION['event_error']);
                        }
                        ?>

                        <!-- <div class="list-item" id="list-item">

                            <div class="top-placeholder">
                                <a id = "edit-button" href="../forms/edit/event-edit.php">
                                    <img src="../../images/edit.png" alt="" class="edit-icon">
                                </a>
                                <p id = "event-name">Event name displayed here</p>
                            </div>

                            <div class="event-spec">
                                <div class="spec-item">
                                    <img src="../../images/date.png" alt="" id = "spec-img">
                                    <p id="spec-detail">January 1, 2019</p>
                                </div>
                                <div class="spec-item" id = "venue">
                                    <img src="../../images/venue.png" alt="" id = "spec-img">
                                    <p id="spec-detail">Location hdfhgljsdfasutiyowuey</p>
                                </div>
                                <div class="spec-item">
                                    <img src="../../images/fee.png" alt="" id = "spec-img">
                                    <p id="spec-detail">P90.00</p>
                                </div>
                            </div>

                            <p id="event-details">wiuytiiqhiuorehiwrvobeovhreohforwehfourewhfouhrefu wrguihreiouhiurehioerwhrwehgiurehgiuhevioufwhiuvhwiuovhiuewhviuewhviufehwviouhfwiovuhewuiofhvfiouhviuofhviouwfviouhfoviuhdfuihvuiwhfvuiwefhviouhewovihfewiouvhoiuefwhviuowehfvoiuhewvoiuhefiouvhfewiouhvouifehviufwvhiofewh vfev.</p>
                            
                            <div class="registration-strip">
                                <img src="../../images/registrant.png" alt="" id = "spec-img">
                                <p id="spec-detail">121</p>
                                <a href="" id="reg-link">See registrants</a>
                            </div>

                        </div> -->

                        <?php 
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo   '<div class="list-item" id="list-item">

                                            <div class="top-placeholder">
                                                <a id = "edit-button" href="../forms/edit/event-edit.php?edit='.$row['event_id'].'">
                                                    <img src="../../images/edit.png" alt="" class="edit-icon">
                                                </a>
                                                <p id = "event-name">'.$row['title'].'</p>
                                            </div>
                
                                            <div class="event-spec">
                                                <div class="spec-item">
                                                    <img src="../../images/date.png" alt="" id = "spec-img">
                                                    <p id="spec-detail">'.date('M j<\s\up>S</\s\up> Y', strtotime($row['date'])).'</p>
                                                </div>
                                                <div class="spec-item" id = "venue">
                                                    <img src="../../images/venue.png" alt="" id = "spec-img">
                                                    <p id="spec-detail">Location hdfhgljsdfasutiyowuey</p>
                                                </div>
                                                <div class="spec-item">
                                                    <img src="../../images/fee.png" alt="" id = "spec-img">
                                                    <p id="spec-detail">P90.00</p>
                                                </div>
                                            </div>
                
                                            <p id="event-details">wiuytiiqhiuorehiwrvobeovhreohforwehfourewhfouhrefu wrguihreiouhiurehioerwhrwehgiurehgiuhevioufwhiuvhwiuovhiuewhviuewhviufehwviouhfwiovuhewuiofhvfiouhviuofhviouwfviouhfoviuhdfuihvuiwhfvuiwefhviouhewovihfewiouvhoiuefwhviuowehfvoiuhewvoiuhefiouvhfewiouhvouifehviufwvhiofewh vfev.</p>
                                            
                                            <div class="registration-strip">
                                                <img src="../../images/registrant.png" alt="" id = "spec-img">
                                                <p id="spec-detail">121</p>
                                                <a href="registrants.php?event_id='.$row['event_id'].'" id="reg-link">See registrants</a>
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