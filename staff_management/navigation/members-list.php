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
                <p class = "page-label">Branches</p>
            </div>

            <label class="account-menu">

                <input type="checkbox" name="" id=""> <!-- For the onclick menu -->

                <div class="menu">
                    <a href="">Menu</a>
                    <a href="">Menu</a>
                    <a href="">Menu</a>
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

            <label class="list-item">
                <div class="list-item">
                    <input type="checkbox" name="" id="">
                    <p class="name">
                        Juan dela Cruz
                        <img src="../../images/state.png" alt="">
                    </p>

                    <div class="expanded-details">
                        <p>Sex: <span id="sex">Male</span></p>
                        <p>Birthdate: <span id="birthdate">January 2, 1999</span></p>
                        <p>Allergies: <span id="allergies">none</span></p>
                        <p>Church address: <span id="church-address">Davao City</span></p>
                        <p>Pastor: <span id="pastor">Tom Jones</span></p><br/>
                        <p>Contact number: <span id="contact-no">+639123456789</span></p>
                        <p>Email: <span id="email">juandelacruz@gmail.com</span></p>
                    </div>
                </div>
            </label>

            <label class="list-item">
                <div class="list-item">
                    <input type="checkbox" name="" id="">
                    <p class="name">
                        Cardo Dalisay
                        <img src="../../images/state.png" alt="">
                    </p>

                    <div class="expanded-details">
                        <p>Sex: <span id="sex">Male</span></p>
                        <p>Birthdate: <span id="birthdate">January 2, 1999</span></p>
                        <p>Allergies: <span id="allergies">none</span></p>
                        <p>Church address: <span id="church-address">Davao City</span></p>
                        <p>Pastor: <span id="pastor">Tom Jones</span></p><br/>  
                        <p>Contact number: <span id="contact-no">+63987654321</span></p>
                        <p>Email: <span id="email">theimmortal@gmail.com</span></p>
                    </div>
                </div>
            </label>

        </div>

    </body>
</html>