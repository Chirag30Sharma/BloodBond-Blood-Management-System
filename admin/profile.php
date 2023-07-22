<?php
include('inc/db.php');
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

$email = $_SESSION["email"];
$sql = "SELECT * FROM admin_registration WHERE org_email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $org_name = $row['org_name'];
    $org_add = $row['org_add'];
    $org_no = $row['org_no'];
    $website_url = $row['website_url'];
    $org_type = $row['org_type'];
    $org_license_no = $row['org_license_no'];
}

// Handle form submission
if (isset($_POST["save"])) {
    $new_org_name = $_POST['org_name'];
    $new_org_add = $_POST['org_address'];
    $new_org_no = $_POST['org_no'];
    $new_website_url = $_POST['website_url'];
    $new_org_type = $_POST['org_type'];
    $new_org_license_no = $_POST['org_license_no'];

    // Update the admin's profile information in the database
    $update_query = "UPDATE admin_registration SET org_name='$new_org_name', org_add='$new_org_add', org_no='$new_org_no', website_url='$new_website_url', org_type='$new_org_type', org_license_no='$new_org_license_no' WHERE org_email='$email'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        // Refresh the page to display the updated information
        header("Refresh:0");
    } else {
        echo "Error updating profile. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .profile-card {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .profile-card h2 {
            color: #007BFF;
        }

        .profile-card .form-control {
            margin-bottom: 15px;
        }

        .profile-card .btn-primary {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="profile-card">
            <h2>Admin Profile</h2>
            <form id="profile-form" method="post">
                <div class="mb-3">
                    <label for="org_name" class="form-label">Organization Name:</label>
                    <input type="text" class="form-control" id="org_name" name="org_name" value="<?php echo $org_name ?>" readonly>
                    <input type="hidden" name="current_org_name" value="<?php echo $org_name ?>">
                </div>
                <div class="mb-3">
                    <label for="org_address" class="form-label">Organization Address:</label>
                    <input type="text" class="form-control" id="org_address" name="org_address" value="<?php echo $org_add ?>" readonly>
                    <input type="hidden" name="current_org_address" value="<?php echo $org_add ?>">
                </div>
                <div class="mb-3">
                    <label for="org_no" class="form-label">Organization Phone Number:</label>
                    <input type="text" class="form-control" id="org_no" name="org_no" value="<?php echo $org_no ?>" readonly>
                    <input type="hidden" name="current_org_no" value="<?php echo $org_no ?>">
                </div>
                <div class="mb-3">
                    <label for="website_url" class="form-label">Website URL:</label>
                    <input type="text" class="form-control" id="website_url" name="website_url" value="<?php echo $website_url ?>" readonly>
                    <input type="hidden" name="current_website_url" value="<?php echo $website_url ?>">
                </div>
                <div class="mb-3">
                    <label for="org_type" class="form-label">Organization Type:</label>
                    <input type="text" class="form-control" id="org_type" name="org_type" value="<?php echo $org_type ?>" readonly>
                    <input type="hidden" name="current_org_type" value="<?php echo $org_type ?>">
                </div>
                <div class="mb-3">
                    <label for="org_license_no" class="form-label">Organization License Number:</label>
                    <input type="text" class="form-control" id="org_license_no" name="org_license_no" value="<?php echo $org_license_no ?>" readonly>
                    <input type="hidden" name="current_org_license_no" value="<?php echo $org_license_no ?>">
                </div>
                <button type="button" id="edit-btn" class="btn btn-primary" onclick="enableEditing()">Edit</button>
                <button type="submit" id="save-btn" class="btn btn-success d-none" name="save">Save</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to enable/disable form fields based on edit mode
        function enableEditing() {
            const formFields = document.querySelectorAll("#profile-form .form-control");
            const editBtn = document.getElementById("edit-btn");
            const saveBtn = document.getElementById("save-btn");

            formFields.forEach(field => {
                field.readOnly = false;
            });

            editBtn.style.display = "none";
            saveBtn.style.display = "block";
        }
    </script>
</body>
</html>
