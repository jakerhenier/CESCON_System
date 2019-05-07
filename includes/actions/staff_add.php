<?php 
require_once('../config/db.php');
require_once('../function/crypt.php');
require_once('../function/form_validation.php');

function getBranchId($district) {
    $keypair = array(
        "Agusan District" => "1",
        "Bukidnon" => "2",
        "Cebu" => "3",
        "CENODA District" => "4",
        "COMVAL District" => "5",
        "Cotabato 1 (North)" => "6",
        "Cotabato 2" => "7",
        "Davao City" => "8",
        "Davao Del Sur" => "9",
        "Emmanuel District" => "10",
        "MANA District" => "11",
        "Maranatha District" => "12",
        "Monkayo District" => "13",
        "NEDA District" => "14",
        "Samal (IGACOS) District" => "15",
        "Sarangani District" => "16",
        "SOCSARGEN District" => "17",
        "Valenzuela City" => "18",
        "Zampen District" => "19",
        "Bohol" => "20",
    );

    return $keypair[$district];
}

if (isset($_POST['submit'])) {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $contact_number = $_POST['contact_number'];
    $branch_id = getBranchId($_POST['branch_id']);
    $username = $_POST['username'];
    $password = encrypt_decrypt($_POST['password'], "encrypt");
    $access_level = $_POST['access_level'];

    if(true) {
        $query = "INSERT INTO staff (last_name, first_name, contact_number, username, password, access_level, branch_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssssii', $last_name, $first_name, $contact_number, $username, $password, $access_level, $branch_id);
        if ($stmt->execute()) {
            header('location: ../../staff_management/navigation/staffs-list.php');
        }
    }
}
else {
    header('location: ../../staff_management/forms/add/staff-add.php');
}

?>