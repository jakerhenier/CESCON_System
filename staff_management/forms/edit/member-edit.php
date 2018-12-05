<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Edit member</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="adding-fields">
        
            <div class="floating-form">

                <h3>Edit member's information</h3>

                <form action="">

                    <p>First name</p>
                    <input type="text" name = "first-name" required autofocus>

                    <p>Last name</p>
                    <input type="text" name = "last-name" required>

                    <div class="half-field-box">

                        <div class="half-field">
                            <p>Sex</p>
                            <select name="sex" id="">
                                <option value="" selected disabled>Select...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="half-field">
                            <p>Date of birth</p>
                            <input type="date" name="dob" id="" required>
                        </div>

                        <div class="half-field contact-no">
                            <p>Contact number</p>
                            <span>+63</span>
                            <input type="text" name = "contact-number">
                        </div>

                        <div class="half-field email">
                            <p>Email</p>
                            <input type="text" name="email" id="">
                        </div>

                    </div>

                    <p id = "allergies">Allergies</p>
                    <label for="chicken">
                        <input type="checkbox" name="chicken" id="chicken">Chicken
                        <span class="check"></span>
                    </label>
                    <label for="shrimp">
                        <input type="checkbox" name="shrimp" id="shrimp">Shrimp
                        <span class="check"></span>
                    </label>
                    <label for="pork">
                        <input type="checkbox" name="chicken" id="pork">Pork
                        <span class="check"></span>
                    </label>
                    <label for="fish">
                        <input type="checkbox" name="chicken" id="fish">Fish
                        <span class="check"></span>
                    </label>

                    <p id = "allergy-other">others:</p>
                    <input type="text" name="allergies" id="">

                    <p>Church address</p>
                    <select name="churches" id="">
                        <option value="">Church 1</option>
                        <option value="">Church 2</option>
                        <option value="">Church 3</option>
                    </select>

                    <p>Pastor</p>
                    <select name="churches" id="">
                        <option value="">Pastor 1</option>
                        <option value="">Pastor 2</option>
                        <option value="">Pastor 3</option>
                    </select>

                    <button type="submit">Save changes</button>

                    <a id="go-back" href="../../navigation/members-list.php">Go back</a>
                    
                </form>

            </div>

        </div>

    </body>
</html>