<?php
$errors = array();

function resetSession($new_errors) {
    $_SESSION['reg_msg'] = $new_errors;
}

function validate_credentials($contact_number, $email) {
    $first = validate_number($contact_number);
    $second = validate_email($email);

    if ($first && second) {
        return true;
    }
}

function validate_number($contact_number) {
    global $errors;

    if (!preg_match('/^9\d{9}$/', $contact_number)) {
        array_push($errors, "Invalid format");
        resetSession($errors);
        header('location: ../actions/member_edit.php');
    }
    else {
        return true;
    }
}

function validate_email($email) {
    global $errors;

    if (!preg_match('[A-Za-z0-9]*@[\w]*.com', $email)) {
        array_push($errors, "Invalid email.");
        resetSession($errors);
        header('location: ../actions/member_edit.php');
    }
    else {
        return true;
    }
}

?>