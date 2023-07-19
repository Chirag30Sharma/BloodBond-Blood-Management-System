<?php
session_start();
include("db.php");

if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}

if (isset($_GET['org_name'], $_GET['date'], $_GET['address'])) {
    $org_name = urldecode($_GET['org_name']);
    $date = urldecode($_GET['date']);
    $address = urldecode($_GET['address']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Blood</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h2 class="mb-0">Booking Confirmation</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Organization Name:</strong> <?php echo $org_name; ?></p>
                        <p><strong>Date:</strong> <?php echo $date; ?></p>
                        <p><strong>Address:</strong> <?php echo $address; ?></p>
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

                        <form method="post">
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
    include("mail.php");
    $email = $_SESSION["email"];
    $sql = "SELECT name FROM login WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
    }

    if (isset($_POST['confirm_booking'])) {
        $sql = "INSERT INTO donate (org_name, date, address, user_email, user_name) VALUES ('$org_name', '$date', '$address', '$email', '$name')";

        if (mysqli_query($conn, $sql)) {
            echo "Booking Successful Check the Email";
            $subject = "Blood Donation Booking Details";
            $body = "<p>Hello $name,</p>
                    <p>Thank you for booking a blood donation camp.</p>
                    <h4>Booking Details:</h4>
                    <p><strong>Organization Name:</strong> $org_name</p>
                    <p><strong>Date:</strong> $date</p>
                    <p><strong>Address:</strong> $address</p>
                    <p>Thank you for your support!</p>
                    <p>Best regards,<br>The Blood Donation Team</p>";

            donate($subject, $body, $email);
            header("Location: index.php");
        } else {
            echo "Error Occured during something. Pls check";
        }
    
    }
?>