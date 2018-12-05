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

                <form action="../../../includes/actions/event_add.php" method = "POST">

                    <p>Event title</p>
                    <input type = "text" name="title" required autofocus>

                    <p>Event location</p>
                    <input type="text" name="location" required>
                    
                    <p>Event date</p>
                    <input type="date" name="date" required>

                    <p>Event fee</p>
                    <input type="number" name="rate" min=0 value=0 required>

                    <p>Event details</p>
                    <textarea name="details" cols="30" rows="10"></textarea>

                    <button type="submit" name="submit" value="submit">Add event</button>
                    <a href="../../navigation/events-manage.php">Go back</a>

                </form>

            </div>

        </div>
    </body>
</html>