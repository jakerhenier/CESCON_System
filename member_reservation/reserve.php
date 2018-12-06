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

                <p class = "prompt" id = "reserve-success">
                    <img src="../images/success.png" alt="Error">
                    Reservation successful! Pay at the venue to complete registration.
                </p>

                <form action = "">

                    <p>First name</p>
                    <input type = "text" name = "first-name">

                    <p>Last name</p>
                    <input type = "text" name ="last-name">

                    <button type = "submit">Reserve</button>
                    <a href = "event-detail.php">Go back</a>

                </form>

            </div>

        </div>

    </body>
</html>