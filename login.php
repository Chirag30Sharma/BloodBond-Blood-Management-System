<?php
  include("db.php");
  session_start(); // Start the session

  if (isset($_POST["log"])) {
    $email = $_POST["email"];
    $pswrd = $_POST["pswrd"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM login WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $pswrd);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
      session_regenerate_id();
      $_SESSION['loggedin'] = true;
      $_SESSION["email"] = $email;

      header("Location: profile.php");
      exit;
    } else {
      echo '<div class="popup-box">
      <p>Invalid username or password</p>
      <button onclick="closePopup()">OK</button>
      </div>';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>

  
   body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 20px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
    }

    .container label {
      font-size: 14px;
      color: #555;
    }

    .container input[type="text"],
    .container input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .container button {
      width: 100%;
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 18px;
    }

    .container button:hover {
      background-color: #0056b3;
    }

    .forgotpsd {
      text-align: right;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .register {
      text-align: center;
      font-size: 14px;
    }

    .popup-box {
      display: none;
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


     .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh; /* Ensure the container takes up the full viewport height */
  }

  .form-container {
    width: 100%;
    max-width: 400px; /* Adjust this value to your preference */
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  }
</style>


<body>
  <div class="container">
    <!-- Headings for the form -->
    <h2>Sign in</h2>

    <!-- Main container for all inputs -->
    <form action="login.php" method="post">
      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Your Email</label>
        <input type="text" class="form-control" id="email" name="email" required>
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="pswrd" class="form-label">Your password</label>
        <input type="password" class="form-control" id="pswrd" name="pswrd" required>
      </div>

      <div class="forgotpsd">
        <p><a href="forgot.php">Forgot Password?</a></p>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary" name="log">Login</button>

      <!-- Sign up link -->
      <p class="register">Don't Have An Account? <a href="signup.php">Sign up</a></p>
    </form>
  </div>

  <script>
    function closePopup() {
      var popupBox = document.querySelector('.popup-box');
      popupBox.style.display = 'none';
    }
  </script>
</body>
</html>