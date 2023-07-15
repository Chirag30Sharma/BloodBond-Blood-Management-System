<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
    }

    h1 {
      color: #333333;
      text-align: center;
      margin-top: 50px;
    }

    form {
      max-width: 300px;
      margin: 30px auto;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #dddddd;
      border-radius: 4px;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #dddddd;
      border-radius: 4px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #ffffff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>Reset Password</h1>
  <form method="POST">
    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required>
    <br><br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    <br><br>
    <input type="submit" name="submit" value="Reset Password">
  </form>
</body>
</html>

<?php
    include("db.php");
    include("validation.php");

    if(isset($_GET["email"])){
        $encodedEmail = $_GET["email"];
        $email = base64_decode(urldecode($encodedEmail)); 
        $decodedEmail = $email;

        if(isset($_POST["submit"])){ 
            $newPassword = $_POST["new_password"];
            $confirmPassword = $_POST["confirm_password"];

            if($newPassword === $confirmPassword){
                if (!checkPassword($newPassword)){
                    return;
                }
                $sql = "UPDATE login SET password = '$newPassword' WHERE email = '$decodedEmail'";
                $result = mysqli_query($conn, $sql);

                if($result){
                    echo "Password has been successfully reset.";
                } else {
                    echo "An error occurred while resetting the password.";
                }
            } else {
                echo "New password and confirm password do not match.";
            }
        }
    }
?>
