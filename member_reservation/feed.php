<?php 
require_once('../includes/config/db.php');

$query = "SELECT * FROM event";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<meta lang = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>CESCON - Event feed</title>
        <link rel="stylesheet" media = "all" href="../styles/style.css">
        <link rel="shortcut icon" href="../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <h3 id = "feed-header">
            <img src="../images/logo.jpeg" alt="CESCON logo">
            <span>Member feed</span>
            Christian Endeavor Society Convention
        </h3>

        <div class="content-container" id = "member-feed">

            

            <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo   '<a href="event-detail.php?view='.$row['event_id'].'">

                                <div class="list-item" id = "feed-item">

                                    <h2 id = "title">'.$row['title'].'</h2>

                                    <p id="date">
                                        <img src="../images/date.png" alt="">
                                        '.date('M j<\s\up>S</\s\up> Y', strtotime($row['date'])).'
                                    </p>
                                    <p id="location">
                                        <img src="../images/pin.png" alt="">
                                        '.$row['location'].'
                                    </p>

                                </div>
                
                            </a>';
                }
            }
            ?>

        </div>

    </body>
</html>