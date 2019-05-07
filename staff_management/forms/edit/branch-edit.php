<?php 
require_once('../../../includes/config/db.php');
require_once('../../../includes/config/session.php');


if (isset($_GET['edit'])) {
    $branch_id = '';
    $name = '';
    $description = '';
    $address = '';
    $district = '';
    $date_established = '';

    $branch_id = $_GET['edit'];

    $query = "SELECT * FROM branch WHERE branch_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $branch_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $branch_id = $row['branch_id'];
            $name = $row['name'];
            $description = $row['description'];
            $address = $row['address'];
            $district = $row['district'];
            $date_established = date('Y-m-d', strtotime($row['date_established']));
        }
    }

    function filter($array) {
        global $district;

        if ($array != $district) {
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

    $newArr = array_filter($array, "filter");
    
}

?>
<!DOCTYPE html>
<meta lang="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<html>
    <head>
        <title>Add a a new branch</title>
        <link rel = "stylesheet" media = "all" href = "../../../styles/style.css">
        <link rel="shortcut icon" href="../../../images/logo.jpeg" type="image/x-icon">
    </head>
    <body>
        
        <div class="adding-fields">

            <div class="floating-form">

                <h3>Edit branch information</h3>

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

                <form action="../../../includes/actions/branch_edit.php" method="POST">

                    <p>Branch name</p>
                    <input type="text" name="name" value="<?php echo $name ?>" required>

                    <p>Date established</p>
                    <input type="date" name="date_established" value="<?php echo $date_established ?>" required>

                    <p>Branch location</p>
                    <input type="text" name="address" value="<?php echo $address ?>" required>

                    <p>Branch district</p>
                    <select name="district" required>
                        <option value="<?php echo $district ?>" selected><?php echo $district ?></option>
                        <?php 
                        foreach ($newArr as $list) {
                            echo '<option value="'.$list.'">'.$list.'</option>';
                        }
                        ?>
                    </select>

                    <p>Branch details</p>
                    <textarea name="details" cols="30" rows="10" required><?php echo $description ?></textarea>

                    <button type = "submit" name="submit" value="<?php echo $branch_id ?>">Save Changes</button>
                    <a href = "../../navigation/branches.php">Go back</a>

                </form>

            </div>

        </div>

    </body>
</html>