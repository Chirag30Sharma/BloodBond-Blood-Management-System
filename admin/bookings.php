<?php
include('inc/db.php');
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

$email = $_SESSION["email"];
$sql = "SELECT org_name FROM admin_registration WHERE org_email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['org_name'];
}


$stmt = $conn->prepare("SELECT date, address, user_email, user_name FROM donate WHERE org_name = ?");
$stmt->bind_param("s", $org_name);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $date = $row['date'];
        $address = $row['address'];
        $user_email = $row['user_email'];
        $user_name = $row['user_name'];
        
    }

} else {
    echo "0 results";
} 


$sql1 = "SELECT name FROM login WHERE email = '$user_email'";
$result1 = mysqli_query($conn, $sql1);
$stmt = $conn->prepare("SELECT dob, mobileno, gender, bloodgroup, locality FROM login WHERE email = ?");
$stmt->bind_param("s", $user_email);
$stmt->execute();

$result1 = $stmt->get_result();

if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        $dob = $row['dob'];
        $mobileno = $row['mobileno'];
        $gender = $row['gender'];
        $bloodgroup = $row['bloodgroup'];
        $locality = $row['locality'];
        
    }

} else {
    echo "0 results";
} 


// if(isset($_POST["confirm"])){
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
//     }
// }

     
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
            max-width: 800px;
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
        }

        .card {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            color: #0080ff;
        }

        .card p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bookings Received</h1>
        <div class="booking-cards">
                <div class="card">
                    <h2>"<?php echo $org_name ?>"</h2>
                    <h3>Person Details</h3>
                    <p><strong>Name:</strong>"<?php echo $user_name ?>"</p>
                    <p><strong>Email:</strong>"<?php echo $user_email ?>"</p>
                    <p><strong>Phone:</strong>"<?php echo $mobileno ?>"</p>
                    <p><strong>BloodGroup:</strong>"<?php echo $bloodgroup ?>"</p>
                    <p><strong>Gender:</strong>"<?php echo $gender ?>"</p>
                    <h3>Event Details</h3>
                    <p><strong>Date:</strong>"<?php echo $date ?>"</p>
                    <p><strong>Address:</strong>"<?php echo $address ?>"</p>
                </div>
               
        </div>
    </div>
</body>
</html>