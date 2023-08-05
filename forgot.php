<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    p {
      text-align: center;
      color: #666;
    }

    form {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #333;
    }

    input[type="email"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
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
  <h1>Forgot Password</h1>
  <p>Please enter your email to reset your password.</p>
  <form action="forgot.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>
    <input type="submit" value="Reset Password" name ="click">
  </form>
</body>
</html>

<?php
    include("db.php");
    include("mail.php");

    if(isset($_POST["click"])){
        $mail = $_POST["email"];
        $subject = "Password Reset Request - BloodBond";
        $encodedEmail = base64_encode($mail); // Encode the email using base64
        $resetLink = "http://localhost:3306/reset_pass.php?email=" . urlencode($encodedEmail); // Append encoded email to the reset password link

        // Retrieve customer name from the database
        $sql = "SELECT name FROM login WHERE email = '$mail'";
        $result = mysqli_query($conn, $sql);
      
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $customerName = $row['name'];

            $body = "<p>Dear $customerName,</p>
            <p>We have received a request to reset your password for your account. To proceed with the password reset, please click on the link below:</p>
            
            <p><a href='$resetLink'>$resetLink</a></p>
            
            <p>If you did not initiate this request or if you believe this email was sent in error, please ignore it and your password will remain unchanged.</p>
                        
            <p>Thank you for using our services.</p>
            
            <p>Best regards,<br> BloodBond.</p>";
            echo '<div class="popup-box">
                        <p>You are registered with us. Sending you an email to reset your password.</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
            forgot($subject, $body, $mail);
        } else {
            echo '<div class="popup-box">
                        <p>You are not registered with us.</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
        }
    }
?>


