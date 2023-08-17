<?php
include('db.php');
include('mail.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}

if (isset($_GET['org_name'], $_GET['blood_group'], $_GET['org_email'])) {
    $org_name = $_GET['org_name'];
    $blood_group = $_GET['blood_group'];
    $email = $_GET['org_email'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeker Confirmation</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h2 class="mb-0">Seeking Confirmation</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Organization Name:</strong> <?php echo $org_name; ?></p>
                        <p><strong>Blood Group:</strong> <?php echo $blood_group; ?></p>
                        <?php
                            $sql = "SELECT iframe FROM bloodcamp WHERE org_name = '$org_name'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 1) {
                                $row = mysqli_fetch_assoc($result);
                                $iframe = $row['iframe'];
                                echo '<p><strong>Location:</strong></p>';
                                echo $iframe;
                            }
                        ?>
                    <form method="post" id="bookingForm">
                        <input type="submit" class="btn btn-primary" name="confirm_booking" value="Confirm Booking">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    
</body>
</html>

<?php
$user_email = $_SESSION['email'];
if(isset($_POST['confirm_booking'])){
    $sql2 = "INSERT INTO seeker (org_name, user_email, blood_group) VALUES (?, ?, ?)";
    $stmt2 = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($stmt2, "sss", $org_name, $user_email, $blood_group);
    $result2 = mysqli_stmt_execute($stmt2);

    if ($result2) {
        $sql = "UPDATE Blood_Stock SET $blood_group = $blood_group - 10 WHERE org_email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        $result = mysqli_stmt_execute($stmt);
  
        $subject = "Blood Donation Booking Details";
        $body = "<p>Hello $name,</p>
                <p>Thank you for seeking the blood from us.</p>
                <p>Please bring your original government ID along with you.</p>
                <h4>Booking Details:</h4>
                <p><strong>Organization Name:</strong> $org_name</p>
                <p><strong>Date:</strong> $date</p>
                <p><strong>Address:</strong> $address</p>
                <p>Thank you for your support!</p>
                <p>Best regards,<br>The Blood Donation Team</p>";

        seek($subject, $body, $user_email);
        header("Location: index.php");
    
        } 
        else {
            echo '<div class="popup-box">
            <p>Error fetching details!</p>
            <button onclick="closePopup()">OK</button>
            </div>';    
        }
    } 


?>