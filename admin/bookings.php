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
    $name = $row['org_name'];
} else {
    echo "Organization not found!";
    exit;
}

$stmt = $conn->prepare("SELECT date, address, user_email, user_name FROM donate WHERE org_name = ?");
$stmt->bind_param("s", $name);

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
            'date' => $row['date'],
            'address' => $row['address'],
            'user_email' => $row['user_email'],
            'user_name' => $row['user_name']
        );
    }
} else {
    echo "No booking details found for the organization: $name";
}


// Fetch user details for each booking
$userDetails = array();

foreach ($bookingDetails as $booking) {
    $user_email = $booking['user_email'];

    $stmt = $conn->prepare("SELECT dob, mobileno, gender, bloodgroup, locality FROM login WHERE email = ?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userDetails[$user_email] = array(
            'dob' => $row['dob'],
            'mobileno' => $row['mobileno'],
            'gender' => $row['gender'],
            'bloodgroup' => $row['bloodgroup'],
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
    <title>Booking Information - Blood Donation Management</title>
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
                $user_name = $booking['user_name'];

                echo '<div class="card">';
                echo "<h2>{$name}</h2>";
                echo '<h3>Person Details</h3>';
                echo "<p><strong>Name:</strong> {$user_name}</p>";
                echo "<p><strong>Email:</strong> {$user_email}</p>";

                // Check if user details are available for this booking
                if (isset($userDetails[$user_email])) {
                    $userDetail = $userDetails[$user_email];
                    echo "<p><strong>Date of Birth:</strong> {$userDetail['dob']}</p>";
                    echo "<p><strong>Phone:</strong> {$userDetail['mobileno']}</p>";
                    echo "<p><strong>Blood Group:</strong> {$userDetail['bloodgroup']}</p>";
                    echo "<p><strong>Gender:</strong> {$userDetail['gender']}</p>";
                    echo "<p><strong>Locality:</strong> {$userDetail['locality']}</p>";
                } else {
                    echo '<p><strong>User details not found.</strong></p>';
                }

                echo '<h3>Event Details</h3>';
                echo "<p><strong>Date:</strong> {$booking['date']}</p>";
                echo "<p><strong>Address:</strong> {$booking['address']}</p>";
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
