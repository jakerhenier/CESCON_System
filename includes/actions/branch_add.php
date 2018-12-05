<?php 
session_start();
require_once('../config/db.php');

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
    $name = $_POST['name'];
    $date_established = date("Y-m-d H:i:s", strtotime($_POST['date_established']));
    $address = $_POST['address'];
    $district = $_POST['district'];
    $details = $_POST['details'];
    $branch_id = getBranchId($district);

    $query = "INSERT INTO branch VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('isssss', $branch_id, $name, $details, $address, $district, $date_established);
    if ($stmt->execute()) {
        header('location: ../../staff_management/navigation/branches.php');
    }
}
else {
    header('location: ../../staff_management/forms/add/branch-add.php');
}
?>