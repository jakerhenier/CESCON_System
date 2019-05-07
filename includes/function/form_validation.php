<?php
$errors = array();

function resetSession($new_errors) {
    $_SESSION['reg_msg'] = $new_errors;
}

//IND VALIDATIONS
function validate_firstname($firstname) {
    global $errors;

    if ("" == trim($firstname)) {
        array_push($errors, "First name can't be empty.");
        resetSession($errors);
        header('Location: ?');
    }
    else if (strlen($firstname) <= 1) {
        array_push($errors, "First name can't be one letter only.");
        resetSession($errors);
        header('Location: ?');
    }
    else if ($firstname != strip_tags($firstname)) {
        array_push($errors, "First name contains invalid characters.");
        resetSession($errors);
        header('Location: ?');
    }
    else if (preg_match('/[A-Za-z]/', $firstname) && preg_match('/[0-9]/', $firstname)) {
        array_push($errors, "First name must not contain numbers.");
        resetSession($errors);
        header('Location: ?');
    }
    else {
        return true;
    }
}

function validate_lastname($lastname) {
    global $errors;

    if ("" == trim($lastname)) {
        array_push($errors, "Last name can't be empty.");
        resetSession($errors);
        header('Location: ?');
    }
    else if (strlen($lastname) <= 1) {
        array_push($errors, "Last name can't be one letter only.");
        resetSession($errors);
        header('Location: ?');
    }
    else if ($lastname != strip_tags($lastname)) {
        array_push($errors, "Last name contains invalid characters.");
        resetSession($errors);
        header('Location: ?');
    } 
    else if (preg_match('/[A-Za-z]/', $lastname) && preg_match('/[0-9]/', $lastname)) {
        array_push($errors, "Last name must not contain numbers.");
        resetSession($errors);
        header('Location: ?');
    }
    else {
        return true;
    }
}

function validate_number($contact_number) {
    global $errors;

    if (!preg_match('/^9\d{9}$/', $contact_number)) {
        array_push($errors, "Invalid format");
        resetSession($errors);
        header('Location: ?');
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
        header('Location: ?');
    }
    else {
        return true;
    }
}

//MEMBER FORM VALIDATION
function validate_member($first_name, $last_name, $contact_number, $email) {
    $first = validate_number($contact_number);
    $second = validate_email($email);
    $third = validate_firstname($first_name);
    $fourth = validate_lastname($last_name);

    if ($first && $second && $third && $fourth) {
        return true;
    }
    // else {
    //     array_push($errors, "Invalid format");
    //     resetSession($errors);
    //     header('Location: ?');
    // }
}

//STAFF FORM VALIDATION
function validate_staff($first_name, $last_name, $contact_number) {
    $first = validate_number($contact_number);
    $second = validate_firstname($first_name);
    $third = validate_lastname($last_name);

    if ($first && $second && $third) {
        return true;
    }
    else {
        array_push($errors, "Invalid format");
        resetSession($errors);
        header('Location: ?');
    }
}

//PASTOR FORM VALIDATION
function validate_pastor($first_name, $last_name, $contact_number) {
    $first = validate_number($contact_number);
    $second = validate_firstname($first_name);
    $third = validate_lastname($last_name);

    if ($first && $second && $third) {
        return true;
    }
    else {
        array_push($errors, "Invalid format");
        resetSession($errors);
        header('Location: ?');
    }
}

?>