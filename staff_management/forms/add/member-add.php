<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Add a member</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="adding-fields">
        
            <div class="floating-form">

                <h3>Add new member's information</h3>

                <form action="">

                    <p>First name</p>
                    <input type="text" name = "first_name" required autofocus>

                    <p>Last name</p>
                    <input type="text" name = "last_name" required>

                    <div class="half-field-box">

                        <div class="half-field">
                            <p>Sex</p>
                            <select name="sex" id="">
                                <option value="" selected disabled>Select...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="half-field">
                            <p>Date of birth</p>
                            <input type="date" name="dob" id="" required>
                        </div>

                        <div class="half-field contact-no">
                            <p>Contact number</p>
                            <span>+63</span>
                            <input type="text" name = "contact_number">
                        </div>

                        <div class="half-field email">
                            <p>Email</p>
                            <input type="text" name="email" id="">
                        </div>

                    </div>

                    <p id = "allergies">Allergies</p>
                    <label for="chicken">
                        <input type="checkbox" id="chicken">Chicken
                        <span class="check"></span>
                    </label>
                    <label for="shrimp">
                        <input type="checkbox" id="shrimp">Shrimp
                        <span class="check"></span>
                    </label>
                    <label for="pork">
                        <input type="checkbox" id="pork">Pork
                        <span class="check"></span>
                    </label>
                    <label for="fish">
                        <input type="checkbox" id="fish">Fish
                        <span class="check"></span>
                    </label>

                    <!-- <p id = "allergy-other">others:</p>
                    <input type="text" name="allergies" id="">
                    
                    <p>Church name</p>
                    <input type="text" name="church-name" id="">

                    <p>Church address</p>
                    <input type="text" name="church-address" id="">

                    <p>Church district</p>
                    <select name="church-district" id="">
                        <option value="">District</option>
                    </select>

                    <p>Pastor</p>
                    <select name="churches" id="">
                        <option value="">Pastor 1</option>
                        <option value="">Pastor 2</option>
                        <option value="">Pastor 3</option>
                    </select> -->
                    <input type="text" name="allergies" id="allergy" hidden>

                    <button type="submit" name="submit" value="submit">Register</button>

                    <a id="go-back" href="../../navigation/members-list.php">Go back</a>
                    
                </form>

            </div>

        </div>
        <script src="../../../scripts/jquery.js"></script>
        <script>
            $(document).ready(function () {
                var allergies = '';

                $('#chicken').click(function () {
                    if ($(this).prop('checked')) {
                        allergies += 'Chicken ';
                        $('#allergy').attr('value', allergies);
                    }
                    else {
                        allergies = allergies.replace('Chicken ', '');
                        $('#allergy').attr('value', allergies);
                    }
                })

                $('#shrimp').click(function () {
                    if ($(this).prop('checked')) {
                        allergies += 'Shrimp ';
                        $('#allergy').attr('value', allergies);
                    }
                    else {
                        allergies = allergies.replace('Shrimp ', '');
                        $('#allergy').attr('value', allergies);
                    }
                })

                $('#pork').click(function () {
                    if ($(this).prop('checked')) {
                        allergies += 'Pork ';
                        $('#allergy').attr('value', allergies);
                    }
                    else {
                        allergies = allergies.replace('Pork ', '');
                        $('#allergy').attr('value', allergies);
                    }
                })

                $('#fish').click(function () {
                    if ($(this).prop('checked')) {
                        allergies += 'Fish ';
                        $('#allergy').attr('value', allergies);
                    }
                    else {
                        allergies = allergies.replace('Fish ', '');
                        $('#allergy').attr('value', allergies);
                    }
                })

                if ($('#allergies').val() == '') {
                    $('#allergies').attr('value', 'None');
                }
            })
        </script>
    </body>
</html>