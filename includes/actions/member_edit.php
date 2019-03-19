<?php 
session_start();
require_once('../config/db.php');
require_once('../function/member_validation.php');

$staffData = array();
if (isset($_SESSION['staff_session'])) {
    $staffData = $_SESSION['staff_session'];
}

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
    $member_id = $_POST['submit'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $sex = $_POST['sex'];
    $dob = date("Y-m-d H:i:s", strtotime($_POST['dob']));
    $contact_number = $_POST['contact_number']; 
    $email = $_POST['email'];
    $allergies = $_POST['allergies'];
    $church_name = $_POST['church_name']; 
    $church_address = $_POST['church_address']; 
    $church_district = $_POST['church_district']; 
    $branch_id = getBranchId($church_district);
    $pastor_id = $_POST['pastor_id']; 

    if(validate_credentials($contact_number, $email)) {
        $query = "UPDATE member SET last_name = ? , first_name = ?, DOB = ?, sex = ?, contact_number = ?, email = ?, allergies = ?, church_name = ?, church_address = ?, church_district = ?, branch_id = ?, pastor_number = ? WHERE member_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssssssiii', $last_name, $first_name, $dob, $sex, $contact_number, $email, $allergies, $church_name, $church_address, $church_district, $branch_id, $pastor_id, $member_id);
        if ($stmt->execute()) {
            $up_query = "UPDATE member_edit_logs SET edited_by_user = {$staffData[0]['staff_number']} WHERE member_id = {$member_id}";
            if ($conn->query($up_query)) {
                header('location: ../../staff_management/navigation/members-list.php');
            }
            else {
                echo $conn->error . '<br>' . $up_query;
            }
        }
        else {
            echo $stmt->error;
        }
    }
}
else {
    header('location: ../../staff_management/forms/edit/member-edit.php');
}

?>