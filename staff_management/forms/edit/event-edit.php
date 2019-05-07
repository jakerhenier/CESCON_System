<?php
require_once('../../../includes/config/db.php');
require_once('../../../includes/config/session.php');

$event_id = '';
$title = '';
$location = '';
$date = '';
$details = '';
$rate = '';

if (isset($_GET['edit'])) {
    $event_id = $_GET['edit'];

    $query = "SELECT * FROM event WHERE event_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $event_id = $row['event_id'];
            $title = $row['title'];
            $location = $row['location'];
            $date = date('Y-m-d', strtotime($row['date']));
            $details = $row['details'];
            $rate = $row['rate'];
        }
    }
}
?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Edit event</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="adding-fields">

            <div class = "floating-form">

                <h3>Edit event information</h3>

                <?php 
                    if (isset($_SESSION['reg_msg'])) {
                        foreach($_SESSION['reg_msg'] as $errors) {
                            echo   '<div id = "val-err">
                                        <p>'. $errors .'</p>
                                    </div>';
                        }
                        unset($_SESSION['reg_msg']);
                    }
                ?>

                <form action="../../../includes/actions/event_edit.php" method = "POST">

                    <p>Event title</p>
                    <input type = "text" name="title" value="<?php echo $title ?>" required autofocus>

                    <p>Event location</p>
                    <input type="text" name="location" value="<?php echo $location ?>" required>
                    
                    <p>Event date</p>
                    <input type="date" name="date" value="<?php echo $date ?>" required>

                    <p>Event fee</p>
                    <input type="number" name="rate" min=0 value="<?php echo $rate ?>" required>

                    <p>Event details</p>
                    <textarea name="details" cols="30" rows="10"><?php echo $details ?></textarea>

                    <button type="submit" name="submit" value="<?php echo $event_id ?>">Save Changes</button>
                    <a href="../../navigation/events-manage.php">Go back</a>

                </form>

            </div>

        </div>

    </body>
</html>