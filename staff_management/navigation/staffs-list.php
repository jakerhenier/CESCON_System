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
                <p class = "page-label"></p>
            </div>

            <label class="account-menu">

                <input type="checkbox" name="" id=""> <!-- For the onclick menu -->

                <div class="menu">
                    <a href="">Menu </a>
                    <a href="">Menu</a>
                    <a href="">Menu</a>
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
                    <a href="event-select.php">Registrations</a>
                    <a href="event-select.php">Reservations</a>
                    <a href="branches.php">Branches</a>
                    <a href="affiliates.php">Affiliates</a>
                    
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

            <p class = "list-item">
                <span class = "last-name">Salvador, </span>
                <span class = "first-name">Antonio</span><br/>
                <span class = "contact-number"><img src = "../../images/telephone.png">+639463742495</span>
            </p>

        </div>
        
    </body>
</html>