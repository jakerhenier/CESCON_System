<?php 
session_start();
require_once('../includes/config/db.php');

$event_id = '';

if (!isset($_GET['event_id'])) {
    header('location: feed.php');
}
else {
    $event_id = $_GET['event_id'];

    $query = "SELECT * FROM pastor";
    $result = $conn->query($query);
}
?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Reserve for event</title>
        <link rel = "stylesheet" media = "all" href = "../styles/style.css">
        <link rel="shortcut icon" href="../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>

        <h3 id = "feed-header">
            <img src="../images/logo.jpeg" alt="CESCON logo">
            <span>Event reservation</span>
            Christian Endeavor Society Convention
        </h3>

        <div class = "adding-fields">

            <div class = "floating-form" id="member-reserve">

                <h3>Enter your information</h3>

                <!-- <p class = "prompt" id = "reserve-success">
                    <img src="../images/success.png" alt="Error">
                    Reservation successful! Pay at the venue to complete registration.
                </p> -->
                <?php 
                if (isset($_SESSION['reserve_msg'])) {
                    echo   '<p class = "prompt" id = "reserve-success">
                                <img src="../images/success.png" alt="success">
                                '.$_SESSION['reserve_msg'].'
                            </p>';
                    unset($_SESSION['reserve_msg']);
                }
                ?>

                <form action = "../includes/actions/reserve_add.php" method="POST">

                    <p>First name</p>
                    <input type = "text" name = "first_name" required>

                    <p>Last name</p>
                    <input type = "text" name ="last_name" required>

                    <p>Contact number</p>
                    <input type = "number" min=0 name ="contact_number" placeholder="(Optional)">

                    <p>Email</p>
                    <input type = "email" name ="email" placeholder="(Optional)">

                    <p>Pastor</p>
                    <select name="pastor_number" required>
                        <option value="" selected disabled>Select Pastor</option>
                        <?php 
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['pastor_number'].'">'.$row['first_name'].' '.$row['last_name'].'</option>';
                            }
                        }
                        ?>
                    </select>

                    <button type = "submit" name="submit" value="<?php echo $event_id ?>">Reserve</button>
                    <a href = "event-detail.php">Go back</a>

                </form>

            </div>

        </div>

    </body>
</html>