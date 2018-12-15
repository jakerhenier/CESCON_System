<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>

    <head>
        <title>Manage registrations</title>
        <link rel = "stylesheet" media = "all" href = "../../styles/style.css">
        <link rel = "shortcut icon" href = "../../images/logo.jpeg" type = "image/x-icon">
    </head>

    <body>

        <div class="top-bar">

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
                    
                </div>

            </label>

        </div>

        <div class="content-container">

            <h2>Available events (Res)</h2>

            <a href="registrants.php">
                <div class = "list-item">
                    <p class="event-title">Title here</p>
                </div>
            </a>
            

        </div>
        
    </body>

</html>