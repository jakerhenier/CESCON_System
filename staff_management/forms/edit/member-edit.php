<?php 
require_once('../../../includes/config/db.php');
require_once('../../../includes/config/session.php');

$member_id = '';
$first_name = '';
$last_name = '';
$dob = '01-01-1970';
$sex = '';
$district = '';
$contact_number = '';
$email = '';
$church_name = '';
$church_address = '';
$district = '';

if (isset($_GET['edit'])) {
    $member_id = $_GET['edit'];

    $query = "SELECT * FROM member WHERE member_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $member_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $member_id = $row['member_id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $dob = date('Y-m-d', strtotime($row['DOB']));
            $sex = $row['sex'];
            $contact_number = $row['contact_number'];
            $email = $row['email'];
            $allergies = $row['allergies'];
            $church_name = $row['church_name'];
            $church_address = $row['church_address'];
            $district = $row['church_district'];
        }
    }

    function filterDistrict($array) {
        global $district;

        if ($array != $district) {
            return true;
        }
        else {
            return false;
        }
    }

    function filterSex($array1) {
        global $sex;

        if ($array1 != $sex) {
            return true;
        }
        else {
            return false;
        }
    }

    $array = array(
        "Agusan District",
        "Bukidnon",
        "Cebu",
        "CENODA District",
        "COMVAL District",
        "Cotabato 1 (North)",
        "Cotabato 2",
        "Davao City",
        "Davao Del Sur",
        "Emmanuel District",
        "Maranatha District",
        "Monkayo District",
        "NEDA District",
        "Samal (IGACOS) District",
        "Sarangani District",
        "SOCSARGEN District",
        "Valenzuela City",
        "Zampen District",
        "Bohol",
    );

    $array1 = array(
        "Male",
        "Female"
    );

    $newArr = array_filter($array, "filterDistrict");
    $newArr1 = array_filter($array1, "filterSex");

    $pastor_query = "SELECT * FROM pastor";
    $result = $conn->query($pastor_query);  
}
?>
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

                <?php 
                    if (isset($_SESSION['reg_msg'])) {
                        foreach($_SESSION['reg_msg'] as $errors) {
                            echo   '<div>
                                        <p>'. $errors .'</p>
                                    </div>';
                        }
                        unset($_SESSION['reg_msg']);
                    }
                ?>

                <form action="../../../includes/actions/member_edit.php" method="POST">

                    <p>First name</p>
                    <input type="text" name = "first_name" id="first-name" value="<?php echo $first_name ?>" required autofocus>
                    <span class="invalid" id="invalid-fn">Invalid value</span>

                    <p>Last name</p>
                    <input type="text" name = "last_name" id="last-name" value="<?php echo $last_name ?>" required>
                    <span class="invalid" id="invalid-ln">Invalid value</span>

                    <div class="half-field-box">

                        <div class="half-field">
                            <p>Sex</p>
                            <select name="sex" required>
                                <option value="<?php echo $sex; ?>" selected><?php echo $sex; ?></option>
                                <?php 
                                foreach ($newArr1 as $list) {
                                    echo '<option value="'.$list.'">'.$list.'</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="half-field contact-no">
                            <p>Date of birth</p>
                            <input type="date" name="dob" value="<?php echo $dob ?>" id="" required>
                        </div>

                        <div class="half-field contact-no">
                            <p>Contact number</p>
                            <span>+63</span>
                            <input type="number" name = "contact_number" id="contact" value="<?php echo $contact_number ?>" >
                            <span class="invalid" id="invalid-num">Invalid value</span>
                            <span class="invalid" id="invalid-form">Invalid format</span>
                        </div>

                        <div class="half-field email">
                            <p>Email</p>
                            <input type="email" name="email" id="email" value="<?php echo $email ?>" id="">
                            <span class="invalid" id="invalid-email">Invalid format</span>
                        </div>

                    </div>

                    <p id = "allergies">Allergies (Please skip this portion if you have none)</p>
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
                    
                    <p>Church name</p>
                    <input type="text" name="church_name" value="<?php echo $church_name ?>"  id="">

                    <p>Church address</p>
                    <input type="text" name="church_address" value="<?php echo $church_address ?>" id="">

                    <p>Church district</p>
                    <select name="church_district" id="" required>
                        <option value="<?php echo $district ?>" selected><?php echo $district ?></option>
                        <?php 
                        foreach ($newArr as $list) {
                            echo '<option value="'.$list.'">'.$list.'</option>';
                        }
                        ?>
                        <!-- <option value="Agusan District">Agusan District</option>
                        <option value="Bukidnon">Bukidnon</option>
                        <option value="Cebu">Cebu</option>
                        <option value="CENODA District">CENODA District</option>
                        <option value="COMVAL District">COMVAL District</option>
                        <option value="Cotabato 1 (North)">Cotabato 1 (North)</option>
                        <option value="Cotabato 2">Cotabato 2</option>
                        <option value="Davao City">Davao City</option>
                        <option value="Davao Del Sur">Davao Del Sur</option>
                        <option value="Emmanuel District">Emmanuel District</option>
                        <option value="MANA District">MANA District</option>
                        <option value="Maranatha District">Maranatha District</option>
                        <option value="Monkayo District">Monkayo District</option>
                        <option value="NEDA District">NEDA District</option>
                        <option value="Samal (IGACOS) District">Samal (IGACOS) District</option>
                        <option value="Sarangani District">Sarangani District</option>
                        <option value="SOCSARGEN District">SOCSARGEN District</option>
                        <option value="Valenzuela City">Valenzuela City</option>
                        <option value="Zampen District">Zampen District</option>
                        <option value="Bohol">Bohol</option> -->
                    </select>

                    <p>Pastor</p>
                    <select name="pastor_id" required>
                        <option value="" selected disabled>Select Pastor</option>
                        <?php 
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['pastor_number'].'">'.$row['first_name'].' '.$row['last_name'].'</option>';
                            }
                        }
                        ?>
                    </select>

                    <input type="text" name="allergies" id="allergy" hidden>

                    <button type="submit" name="submit" id="submit" value="<?php echo $member_id ?>">Save Changes</button>

                    <a id="go-back" href="../../navigation/members-list.php">Go back</a>
                    
                </form>

            </div>

        </div>
        <script src="../../../scripts/jquery.js"></script>
        <script src="../../../scripts/main.js"></script>
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