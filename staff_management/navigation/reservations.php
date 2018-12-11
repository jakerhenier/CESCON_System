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
?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>List of reservations</title>
        <link rel = "stylesheet" media = "all" href = "../../styles/style.css">
        <link rel="shortcut icon" href="../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="top-bar">

            <div class="label-box">
                <p class = "page-label">Reservations</p>
            </div>

            <label class="account-menu">

                <input type="checkbox" name="" id=""> <!-- For the onclick menu -->

                <div class="menu">
                    <a href="../../includes/actions/logout.php">Logout</a>
                </div>

                <div class="menu-button">
                </div>
                
                <p class="username"> <!--Name of user will be displayed here -->
                    Username
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

            <h2>Pending registrations</h2>

            <table id = "reservations">

                <tr>

                    <td>
                        <p>Registrant 1</p>
                        <p id = "date-reserved">reserved since <b>August 3, 2018</b></p>
                    </td>
                    <td>
                        <a href="">Confirm</a>
                    </td>

                </tr>

                <tr>

                    <td>
                        <p>Registrant 2</p>
                        <p id = "date-reserved">reserved since <b>August 3, 2018</b></p>
                    </td>
                    <td>
                        <a href="">Confirm</a>
                    </td>

                </tr>

                <tr>

                    <td>
                        <p>Registrant 3</p>
                        <p id = "date-reserved">reserved since <b>August 3, 2018</b></p>
                    </td>
                    <td>
                        <a href="">Confirm</a>
                    </td>

                </tr>

            </table>

        </div>

        <div class="confirm-dialog">

            <div class="confirm-box">

                <p>Confirm reservation?</p>

                <div>
                    <button>Yes</button>
                    <button>No</button>
                </div>

            </div>

        </div>

    </body>
</html>