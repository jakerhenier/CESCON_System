<?php 
session_start();

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
?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Add a staff</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>

        <div class = "adding-fields">

            <div class = "floating-form">

                <h3>Add new staff's information</h3>

                <form action = "../../../includes/actions/staff_add.php" method="POST">

                    <p>First name</p>
                    <input type = "text" name = "first_name" required>

                    <p>Last name</p>
                    <input type = "text" name = "last_name" required>

                    <p>Contact number</p>
                    <div id = "contact-field">
                        <input type = "number" min=0 name = "contact_number" required>
                        <span>+63</span>
                    </div>

                    <p>Branch</p>
                    <select name="branch_id" required>
                    <option value="" selected disabled>Select District</option>
                        <option value="Agusan District">Agusan District</option>
                        <option value="Bukidnon">Bukidnon</option>
                        <option value="Cebu">Cebu</option>
                        <option value="CENODA District">CENODA District</option>
                        <option value="COMVAL District">COMVAL District</option>
                        <option value="Cotabato 1 (North)">Cotabato 1 (North)</option>
                        <option value="Cotabato 2">Cotabato 2</option>
                        <option value="Davao City">Davao City</option>
                        <option value="Davao Del Sur">Davao Del Sur</option>
                        <option value="Emmanuel District">Emmanuel District</option>
                        <option value="MANA District">MANA District</option>
                        <option value="Maranatha District">Maranatha District</option>
                        <option value="Monkayo District">Monkayo District</option>
                        <option value="NEDA District">NEDA District</option>
                        <option value="Samal (IGACOS) District">Samal (IGACOS) District</option>
                        <option value="Sarangani District">Sarangani District</option>
                        <option value="SOCSARGEN District">SOCSARGEN District</option>
                        <option value="Valenzuela City">Valenzuela City</option>
                        <option value="Zampen District">Zampen District</option>
                        <option value="Bohol">Bohol</option>
                    </select>

                    <p id = "staff-username">Username</p>
                    <input type = "text" name = "username" required>

                    <p>Password</p>
                    <input type = "password" name = "password" required>

                    <p>Access Level</p>
                    <select name="access_level" required>
                    <option value="" selected disabled>Select Level</option>
                        <option value="0">Normal User</option>
                        <option value="1">Administrator</option>
                    </select>

                    <!-- <p>Confirm password</p>
                    <input type = "password" name = "password-confirm"> -->

                    <button type = "submit" name="submit" value="submit">Add</button>
                    <a href = "../../navigation/staffs-list.php">Go back</a>

                </form>

            </div>

        </div>

    </body>
</html>