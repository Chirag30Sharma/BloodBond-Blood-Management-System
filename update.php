<?php 
include('db.php'); 
session_start();
$email = $_SESSION['email'];
$query = "SELECT * FROM login WHERE email='$email'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $gender = $row['gender'];
    $bg = $row['bloodgroup'];
    $name = $row['name'];
    $dob = $row['dob'];
    $mobileno = $row['mobileno'];
    $locality = $row['locality'];
    $pin = $row['pincode'];
    $password = '*******';
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login_d_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
        button {
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        font-size: 16px;
        }

        /* Styles for the "Edit" button */
        button.edit-btn {
        background-color: #007bff; /* Blue color - You can change this as desired */
        color: #fff; /* White text color */
        margin-right: 10px;
        }

        /* Styles for the "Save" button */
        button.save-btn {
        background-color: #28a745; /* Green color - You can change this as desired */
        color: #fff; /* White text color */
        }

        /* Styles for the "Edit" button when in edit mode (not displayed) */
        button.edit-btn.hide {
        display: none;
        }
    </style>
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
        <span class="dashboard">Profile Updation</span>
      </div>

      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Welcome! <?php echo $name?></span>
        <a href = "logout.php">Logout</a>
      </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Update Profile</div>
          <div class="sales-details">
            <form method = "post">
            <label for="name">Name:</label>
              <input type="text" id="name" name="name" value="<?php echo $name; ?>" readonly><br><br>
            <label for="dob">Date of Birth:</label>
              <input type="text" id="dob" name="dob" value="<?php echo $dob; ?>" readonly><br><br>
            <label for="mobileno">Mobile Number:</label>
              <input type="text" id="mobileno" name="mobileno" value="<?php echo $mobileno; ?>" readonly><br><br>
            <label for="gender">Gender:</label>
              <input type="text" id="gender" name="gender" value="<?php echo $gender; ?>" readonly><br><br>
            <label for="bg">Blood Group:</label>
              <input type="text" id="bg" name="bg" value="<?php echo $bg; ?>" readonly><br><br>
            <label for="locality">Locality:</label>
              <input type="text" id="locality" name="locality" value="<?php echo $locality; ?>" readonly><br><br>
            <label for="pin">Pin Code:</label>
              <input type="text" id="pin" name="pin" value="<?php echo $pin; ?>" readonly><br><br>
            <button type="button" onclick="enableEditing()">Edit</button><br>
            <button type="submit" name = "save" id="saveBtn" style="display: none;">Save</button>
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
    function enableEditing() {
      // Enable editing of input fields
      document.getElementById("name").readOnly = false;
      document.getElementById("dob").readOnly = false;
      document.getElementById("mobileno").readOnly = false;
      document.getElementById("gender").readOnly = false;
      document.getElementById("bg").readOnly = false;
      document.getElementById("locality").readOnly = false;
      document.getElementById("pin").readOnly = false;

      // Show the save button and hide the edit button
      document.getElementById("saveBtn").style.display = "block";
      document.querySelector("button[onclick='enableEditing()']").style.display = "none";
    }
  </script>

</body>
</html>

<?php
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $mobileno = $_POST['mobileno'];
    $gender = $_POST['gender'];
    $bg = $_POST['bg'];
    $locality = $_POST['locality'];
    $pin = $_POST['pin'];

    $query = "UPDATE login SET name='$name', dob='$dob', mobileno='$mobileno', gender='$gender', bloodgroup='$bg', locality='$locality', pincode='$pin' WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Refresh:0");
        exit();
    }

}

?>

