<?php 
session_start(); 
include('inc/db.php'); 

$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Add your custom styles here if needed */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #111;
            padding-top: 20px;
        }

        .logo-details {
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 15px;
            color: #fff;
            font-weight: bold;
            font-size: 24px;
        }

        .logo_name {
            margin-left: 10px;
        }

        .nav-links {
            padding: 20px 10px;
        }

        .nav-links li {
            list-style: none;
            margin-bottom: 10px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
        }

        .nav-links a:hover {
            background-color: #333;
        }

        .nav-links .active {
            background-color: #007bff;
        }

        .home-section {
            margin-left: 250px;
            padding: 20px;
        }

        /* Other styles for the home-section go here */
        .sidebar-button {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            font-size: 24px;
        }

        .sidebarBtn {
            font-size: 30px;
            cursor: pointer;
        }

        .dashboard {
            font-size: 20px;
            font-weight: bold;
        }

        .home-content {
            padding: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .sales-details {
            font-size: 18px;
            margin-top: 20px;
        }

        .sales-details label {
            display: block;
            margin-bottom: 10px;
        }

        .sales-details input {
            padding: 8px;
            width: 100%;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .sales-details button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .sales-details button:hover {
            background-color: #0056b3;
        }

        @media screen and (max-width: 600px) {
            .sidebar {
                width: 100%;
            }

            .home-section {
                margin-left: 0;
            }
        }
        .popup-box {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    font-family: Arial, sans-serif;
    text-align: center;
}

.popup-box p {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 20px;
}

.popup-box button {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.popup-box button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <section class="home-section">

        <div class="home-content">
            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Update Password</div>
                    <div class="sales-details">
                        <form method="post">
                            <label for="cur_pass">Current Password:</label>
                            <input type="text" id="cur_pass" name="cur_pass" placeholder="Your Current Password"><br><br>
                            <label for="new_pass">New Password:</label>
                            <input type="password" id="new_pass" name="new_pass" placeholder="New Password"><br><br>
                            <label for="con_pass">Confirm New Password:</label>
                            <input type="password" id="con_pass" name="con_pass" placeholder="Confirm New Password"><br><br>
                            <button type="submit" name="save">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
// Function to display an error message and redirect back to the change_pass.php page
function displayError($message) {
    echo "<script>alert('$message'); window.location.href = 'change_pass.php';</script>";
    exit();
}

if(isset($_POST['save'])){
    // Get the submitted form data
    $cur_pass = $_POST['cur_pass'];
    $new_pass = $_POST['new_pass'];
    $con_pass = $_POST['con_pass'];

    // Check if the new password and confirm password match
    if ($new_pass !== $con_pass) {
        displayError("New password and confirm password do not match.");
    }

    // Validate the current password
    $query = "SELECT org_pass FROM admin_registration WHERE org_email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['org_pass'];

        if ($cur_pass != $stored_password) {
            displayError("Incorrect current password.");
        }
    } else {
        displayError("User not found.");
    }

    // Update the password in the database
    $update_query = "UPDATE admin_registration SET org_pass='$con_pass' WHERE org_email='$email'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo '<div class="popup-box">
                        <p>Password updated successfully; window.location.href = "change_pass.php"</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
        exit();
    } else {
        displayError("Failed to update password.");
    }
}
?>
