<?php

$errors = array();

function resetSession($newErr) {
    $_SESSION['login_msg'] = $newErr;
}

function validate_login($username, $password) {
    $first = validate_username($username);
    $second = validate_password($password);

    if ($first && $second) {
        return true;
    }
}

function validate_username($username) {
    global $errors;

    if ("" == trim($username)) {
        array_push($errors, "Username is empty.");
        resetSession($errors);
        header('location: ../../index.php');
    }
    else {
        return true;
    }
}

function validate_password($password) {
    global $errors;

    if ("" == trim($password)) {
        array_push($errors, "Password is empty.");
        resetSession($errors);
        header('location: ../../index.php');
    }
    else {
        return true;
    }
}

?>