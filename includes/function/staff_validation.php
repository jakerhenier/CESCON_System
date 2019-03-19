<?php
$errors = array();

function resetSession($new_errors) {
    $_SESSION['reg_msg'] = $new_errors;
}

function validate_number($contact_number) {
    global $errors;

    if (!preg_match('/^9\d{9}$/', $contact_number)) {
        array_push($errors, "Invalid format");
        resetSession($errors);
        header('location: ../actions/staff_add.php');
    }
    else {
        return true;
    }
}

?>