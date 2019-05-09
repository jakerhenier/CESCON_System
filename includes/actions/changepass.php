<?php 
session_start();
require_once('../config/db.php');
require_once('../function/crypt.php');
require_once('../function/dictionary.php');

$errors = array();

function resetSession($new_errors) {
    $_SESSION['changepass_failed'] = $new_errors;
}

$staffData = $_SESSION['staff_session'];

if (isset($_POST['changepass'])) {
    $curr_password = $conn->real_escape_string($_POST['password']);
    $new_password = $conn->real_escape_string($_POST['password_new']);
    $conf_password = $conn->real_escape_string($_POST['password_verify']);

    // check if password are the same
    if (strcmp(encrypt_decrypt($curr_password, "encrypt"), $staffData[0]['password']) == 0) {
        // check if passwords are the same
        if (strlen($new_password) >= 8) {
            if (checkInDictionary($new_password)) {
                array_push($errors, "Password contains invalid/offensive word found in dictionary.");
                resetSession($errors);
                header('location: ../../staff_management/forms/edit/password-change.php');
            }
            else {
                if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/', $new_password)) {  
                    if (!strcmp($new_password, $curr_password) == 0) {
                        if (strcmp($new_password, $conf_password) == 0) {
                            $new_password = encrypt_decrypt($new_password, "encrypt");
                            $query = "UPDATE staff SET password = '{$new_password}',pass_date = CURRENT_TIMESTAMP WHERE staff_number = {$staffData[0]['staff_number']}";
                            if ($conn->query($query)) {
                                $_SESSION['changepass_success'] = "Password successfully changed. ✔️". "<br>" . "Click <a href='includes/action/logout.php'>Here</a> to re-login.";
                                header('location: ../../index.php');
                            }
                            else {
                                echo $conn->error;
                            }   
                        }
                        else {
                            array_push($errors, "Passwords doesn't match.");
                            resetSession($errors);
                            header('location: ../../staff_management/forms/edit/password-change.php');
                        }
                    }
                    else {
                        array_push($errors, "New password can't be a current password.");
                        resetSession($errors);
                        header('location: ../../staff_management/forms/edit/password-change.php');
                    }
                }
                else {
                    array_push($errors, "Password must contain at least 1 uppercase, 1 lowercase, 1 number, and 1 special character.");
                    resetSession($errors);
                    header('location: ../../staff_management/forms/edit/password-change.php');
                }
            }
        }
        else {
            array_push($errors, "Password must be atleast 8 characters.");
            resetSession($errors);
            header('location: ../../staff_management/forms/edit/password-change.php');
        }
    }
    else {
        array_push($errors, "Current password is incorrect.");
        resetSession($errors);
        // header('location: ../../index.php');
        header('location: ../../staff_management/forms/edit/password-change.php');
    }
    // var_dump($_POST);
}
else {
    header("location: ../../index.php");
}
?>