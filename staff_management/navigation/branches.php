<?php 
session_start();

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

            <label class = "list-item">
                <div class="list-item">
                    <input type = "checkbox" name = "" id = "">
                    <p class = "name">
                        Branch name
                        <img src = "../../images/state.png">
                    </p>
                    
                    <div id = "branch-details">

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non faucibus lorem, nec ultrices felis. Quisque eu lectus interdum, scelerisque lacus eget, lacinia tortor. Integer posuere varius lectus eu tempor. Cras feugiat nisl ut risus pharetra, quis sodales neque cursus. Etiam ultrices turpis purus, nec faucibus massa convallis nec. Aliquam mattis, orci id rhoncus dictum, felis turpis molestie est, in sollicitudin ligula diam lacinia dolor. Proin egestas magna vitae turpis scelerisque faucibus. Nulla rutrum consequat arcu sit amet viverra. Aliquam magna justo, volutpat a malesuada in, auctor quis quam. Integer congue volutpat lectus at blandit. Aenean mattis dignissim consectetur. Praesent viverra diam turpis, ut accumsan velit viverra nec. Nunc hendrerit turpis vulputate finibus mollis. </p>
                        <p>Praesent eros purus, laoreet imperdiet sem at, congue malesuada tortor. Fusce eget justo scelerisque, venenatis urna quis, dignissim urna. Mauris neque lorem, pharetra sed arcu ac, euismod iaculis sapien. Nunc id efficitur neque, at sagittis lectus. Fusce arcu ipsum, congue ac arcu a, imperdiet hendrerit nisl. Proin mattis pulvinar congue. Donec volutpat justo et tempor tristique. Pellentesque tristique consequat dui. Cras eget eleifend orci. Morbi ut porta mauris. Nunc lobortis gravida elit, ornare ullamcorper nisl tristique ac. Aenean posuere, lectus ut rutrum eleifend, lectus nisl porta quam, eget rutrum metus justo ac orci. Vestibulum convallis leo sem, et vulputate lectus imperdiet in.</p>
                        <p>Nunc tempus volutpat tellus, eget lacinia erat maximus ut. Integer vulputate mi at ligula porta sodales. Praesent at eleifend velit. Sed ac tortor venenatis, volutpat dui quis, molestie felis. Mauris venenatis ultrices sapien sed bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam fringilla diam at risus lobortis cursus. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo turpis sit amet quam vulputate viverra. Nullam non risus consequat, dictum augue in, auctor nunc. Vestibulum elit nulla, bibendum vel urna vitae, viverra finibus nisl. Vestibulum vitae dolor nec risus consequat pharetra non in dui. Proin et enim tellus.</p>

                    </div>

                    <p id="branch-est">
                        <img src="../../images/pin.png" alt="">
                        September 1, 2000
                    </p>

                    <p id="branch-location">
                        <img src="../../images/pin.png" alt="">
                        Davao City
                    </p>

                </div>
            </label>

        </div>

    </body>
</html>