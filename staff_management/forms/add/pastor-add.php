<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Add a pastor</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>

        <div class = "adding-fields">

            <div class = "floating-form">

                <h3>Add new pastor's information</h3>

                <form action = "">

                    <p>First name</p>
                    <input type = "text" name = "first-name">

                    <p>Last name</p>
                    <input type = "text" name = "last-name">

                    <p>Contact number</p>
                    <div id = "contact-field">
                        <input type = "text" name = "contact-no">
                        <span>+63</span>
                    </div>

                    <button type = "submit">Add</button>
                    <a href = "../../navigation/pastors-list.php">Go back</a>

                </form>

            </div>

        </div>

    </body>
</html>