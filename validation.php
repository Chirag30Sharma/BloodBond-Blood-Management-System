<?php
//Functions to check parameters

function checkDOB($dob) {
    $today = new DateTime();
    $birthdate = DateTime::createFromFormat('Y-m-d', $dob);
    $age = $today->diff($birthdate)->y;
    
    if ($age >= 18 && $age<65) {
        return true;
    } else {
        echo "You must be 18 years or older to register.";
        return false;
    }
}

function checkemail($str) {
    if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
        return $str;
    } else {
        echo "Invalid email address";
        return false;
    }
}

function checkPhoneNumber($phone) {
    if (strlen($phone) == 10 && is_numeric($phone)) {
        return true;
    } else {
        echo "Invalid phone number. Please enter a 10-digit number.";
        return false;
    }
}

function checkPincode($pincode) {
    if (strlen($pincode) == 6 && is_numeric($pincode)) {
        return true;
    } else {
        echo "Invalid pincode. Please enter a 6-digit pincode.";
        return false;
    }
}

function checkPassword($password) {
    if (strlen($password) < 8) {
        echo "Password should be at least 8 characters long.";
        return false;
    }

    // Password should contain at least 1 special symbol, 1 capital letter, 1 small letter, and 1 number
    if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password) ||
        !preg_match("/[A-Z]/", $password) ||
        !preg_match("/[a-z]/", $password) ||
        !preg_match("/[0-9]/", $password)
    ) {
        echo "Password should contain at least 1 special symbol, 1 capital letter, 1 small letter, and 1 number.";
        return false;
    }

    return true;
}

?>