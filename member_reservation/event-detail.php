<?php 
require_once('../includes/config/db.php');

$event_id = '';
$title = '';
$location = '';
$date = '';
$details = '';
$rate = '';

if (isset($_GET['view'])) {
    $event_id = $_GET['view'];

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
else {
    header('location: feed.php');
}
?>
<!DOCTYPE html>
<meta lang = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>CESCON - Event details</title>
        <link rel="stylesheet" media = "all" href="../styles/style.css">
        <link rel="shortcut icon" href="../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <h3 id = "feed-header">
            <img src="../images/logo.jpeg" alt="CESCON logo">
            <span>Event details</span>
            Christian Endeavor Society Convention
        </h3>

        <div class="content-container">
            <div class= "event-details">

                <h1><?php echo $title; ?></h1>
                <p class = "detail-main"><img src="../images/pin.png" alt=""><?php echo $location; ?></p>
                <p class = "detail-main"><img src="../images/date.png" alt=""><?php echo $date; ?></p>
                <p class = "detail-main"><img src="../images/ticket.png" alt="">₱<?php echo $rate; ?></p>

                <p><?php echo $details; ?></p>

                <div class="event-buttons">
                    <a id = "return-button" href="feed.php">Return to feed</a>
                    <a id="reserve-button" href="reserve.php?event_id=<?php echo $event_id; ?>">Reserve for this event</a>
                </div>

            </div>

        </div>

    </body>
</html>