<?php
//Functions to check parameters

function checkDOB($dob) {
    $today = new DateTime();
    $birthdate = DateTime::createFromFormat('Y-m-d', $dob);
    $age = $today->diff($birthdate)->y;
    
    if ($age >= 18 && $age<65) {
        return true;
    } else {
        echo '<div class="popup-box">
                        <p>You must be 18 years or older to register.</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
        return false;
    }
}

function checkemail($str) {
    if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
        return $str;
    } else {
        echo '<div class="popup-box">
                        <p>Invalid email address</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
        return false;
    }
}

function checkPhoneNumber($phone) {
    if (strlen($phone) == 10 && is_numeric($phone)) {
        return true;
    } else {
        echo '<div class="popup-box">
                        <p>Invalid phone number. Please enter a 10-digit number.</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
        return false;
    }
}

function checkPincode($pincode) {
    if (strlen($pincode) == 6 && is_numeric($pincode)) {
        return true;
    } else {
        echo '<div class="popup-box">
                        <p>Invalid pincode. Please enter a 6-digit pincode.</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
        return false;
    }
}

function checkPassword($password) {
    if (strlen($password) < 8) {
        echo '<div class="popup-box">
                        <p>Password should be at least 8 characters long.</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
        return false;
    }

    // Password should contain at least 1 special symbol, 1 capital letter, 1 small letter, and 1 number
    if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password) ||
        !preg_match("/[A-Z]/", $password) ||
        !preg_match("/[a-z]/", $password) ||
        !preg_match("/[0-9]/", $password)
    ) {
        
        echo '<div class="popup-box">
                        <p>Password should contain at least 1 special symbol, 1 capital letter, 1 small letter, and 1 number.</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
        return false;
    }

    return true;
}

?>