<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Add an event</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="adding-fields">

            <div class = "floating-form">

                <h3>Add event information</h3>

                <form action="" method = "">

                    <p>Event title</p>
                    <input type = "text" required autofocus>

                    <p>Event location</p>
                    <input type="text" name="location" id="" required>
                    
                    <p>Event date</p>
                    <input type="date" name="date" id="" required>

                    <p>Event fee</p>
                    <input type="text" name="fee" id="" required>

                    <p>Event details</p>
                    <textarea name="details" id="" cols="30" rows="10"></textarea>

                    <button type="submit">Add event</button>
                    <a href="../../navigation/events-manage.php">Go back</a>

                </form>

            </div>

        </div>

    </body>
</html>