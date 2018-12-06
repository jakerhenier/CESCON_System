<?php 
require_once('../../../includes/config/db.php');

$branch_id = '';
$name = '';
$description = '';
$address = '';
$district = '';
$date_established = '';

if (isset($_GET['edit'])) {
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

                <form action="../../../includes/actions/branch_edit.php" method="POST">

                    <p>Branch name</p>
                    <input type="text" name="name" value="<?php echo $name ?>" required>

                    <p>Date established</p>
                    <input type="date" name="date_established" value="<?php echo $date_established ?>" required>

                    <p>Branch location</p>
                    <input type="text" name="address" value="<?php echo $address ?>" required>

                    <p>Branch district</p>
                    <select name="district" required>
                        <option value="" selected disabled>Select District</option>
                        <option value="Agusan District">Agusan District</option>
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
                        <option value="Bohol">Bohol</option>
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