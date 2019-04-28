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

                <h3>Add branch information</h3>

                <form action="../../../includes/actions/branch_add.php" method="POST">

                    <p>Branch name</p>
                    <input type="text" name="name" >

                    <p>Date established</p>
                    <input type="date" name="date_established" >

                    <p>Branch location</p>
                    <input type="text" name="address" >

                    <p>Branch district</p>
                    <select name="district" >
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
                    <textarea name="details" cols="30" rows="10" ></textarea>

                    <button type = "submit" name="submit" value="submit">Add</button>
                    <a href = "../../navigation/branches.php">Go back</a>

                </form>

            </div>

        </div>

        <script src="../../../scripts/main.js"></script>

    </body>
</html>