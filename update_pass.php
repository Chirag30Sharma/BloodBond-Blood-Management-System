<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login_d_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
     
      <span class="logo_name">BLOODBOND</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="login_dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
          <li>
          <a href="update.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Update Login Profile</span>
          </a>
        </li>
        <li>
          <a href="update_donor.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Update Donor Profile</span>
          </a>
        </li>
        <li>
          <a href="update_pass.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Update Password</span>
          </a>
        </li>

      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Password Updation</span>
        <a href = "logout.php">Logout</a>
      </div>

    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Update Password</div>
          <div class="sales-details">
            <form method = "post">
            <label for="cur_pass">Current Password:</label>
              <input type="text" id="cur_pass" name="cur_pass" placeholder="Your Current Password"><br><br>
            <label for="new_pass">New Password:</label>
              <input type="password" id="new_pass" name="new_pass" placeholder="New Password"><br><br>
            <label for="con_pass">Confirm New Number:</label>
              <input type="password" id="con_pass" name="con_pass" placeholder="Confirm New Password"><br><br>
            <button type="submit" name = "save">Submit</button>
    </div>
  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

</body>
</html>

<?php 
include('db.php'); 
session_start();

$email = $_SESSION['email'];

// Function to display an error message and redirect back to the update_pass.php page
function displayError($message) {
    echo "<script>alert('$message'); window.location.href = 'update_pass.php';</script>";
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
    $query = "SELECT password FROM login WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

        if ($cur_pass != $stored_password) {
            displayError("Incorrect current password.");
        }
    } else {
        displayError("User not found.");
    }

    // Update the password in the database
    $update_query = "UPDATE login SET password='$con_pass' WHERE email='$email'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>alert('Password updated successfully.'); window.location.href = 'update_pass.php';</script>";
        exit();
    } else {
        displayError("Failed to update password.");
    }
}
?>
