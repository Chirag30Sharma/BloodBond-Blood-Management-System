<?php
include('inc/db.php');
session_start();
// If the user is not logged in, redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

$email = $_SESSION["email"];

// Get the organization name using the email
$sql = "SELECT org_name FROM admin_registration WHERE org_email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $org_name = $row['org_name'];
} else {
    echo "Organization not found!";
    exit;
}

$stmt = $conn->prepare("SELECT user_email, blood_group, government_id FROM seeker WHERE org_name = ?");
$stmt->bind_param("s", $org_name);

// Execute the query and check for errors
if (!$stmt->execute()) {
    die("Error executing the query: " . $stmt->error);
}

// Get the result and check if there are rows
$result = $stmt->get_result();

// Initialize variables for booking details
$bookingDetails = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookingDetails[] = array(
            'user_email' => $row['user_email'],
            'blood_group' => $row['blood_group'],
            'government_id' => $row['government_id'],
        );
    }
} else {
    echo "No booking details found for the organization: $org_name";
}


// Fetch user details for each booking
$userDetails = array();

foreach ($bookingDetails as $booking) {
    $user_email = $booking['user_email'];

    $stmt = $conn->prepare("SELECT name, dob, mobileno, gender, locality FROM login WHERE email = ?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userDetails[$user_email] = array(
            'name' => $row['name'],
            'dob' => $row['dob'],
            'mobileno' => $row['mobileno'],
            'gender' => $row['gender'],
            'locality' => $row['locality']
        );
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeker Information - Blood Donation Management</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1200px; /* Limit the maximum width of the container */
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #0080ff;
            text-align: center;
        }

        .booking-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            color: #0080ff;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card p {
            margin: 5px 0;
        }

        .booking-cards .card {
            transition: box-shadow 0.3s ease;
            cursor: pointer;
        }

        .booking-cards .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Media Query for responsiveness */
        @media screen and (max-width: 600px) {
            .booking-cards {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
<div class="container">
        <h1>Bookings Received</h1>
        <div class="booking-cards">
            <?php
            // Display booking information in cards
            foreach ($bookingDetails as $booking) {
                $user_email = $booking['user_email'];
                $blood_group = $booking['blood_group'];
                $government_id = $booking['government_id'];

                echo '<div class="card">';
                echo "<h2>{$org_name}</h2>";
                echo '<h3>Person Details</h3>';


                // Check if user details are available for this booking
                if (isset($userDetails[$user_email])) {
                    $userDetail = $userDetails[$user_email];
                    echo "<p><strong>Name:</strong> {$userDetail['name']}</p>";
                    echo "<p><strong>Email:</strong> {$user_email}</p>";
                    echo "<p><strong>Date of Birth:</strong> {$userDetail['dob']}</p>";
                    echo "<p><strong>Phone:</strong> {$userDetail['mobileno']}</p>";
                    echo "<p><strong>Gender:</strong> {$userDetail['gender']}</p>";
                    echo "<p><strong>Locality:</strong> {$userDetail['locality']}</p><br><br>";
                } else {
                    echo '<p><strong>User details not found.</strong></p>';
                }

                echo "<p><strong>User ID:</strong> {$booking['user_email']}</p>";
                echo "<p><strong>Required Blood Group:</strong> {$booking['blood_group']}</p>";
                echo "<p><strong>Government ID Number:</strong> {$booking['government_id']}</p>";
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
