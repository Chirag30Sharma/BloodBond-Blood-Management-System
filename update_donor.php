<?php 
include('db.php'); 
session_start();
$email = $_SESSION['email'];
$query = "SELECT * FROM donor_registration WHERE email='$email'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $chronic = $row['chronic'];
    $vices = $row['vices'];
    $covid_vaccine = $row['covid_vaccine'];
    $last_donated = $row['last_donated'];
    $cur_med = $row['cur_med'];
    $allergies = $row['allergies'];
    $weight = $row['weight'];
    $height = $row['height'];
    $last_travel = $row['last_travel'];
    $emerg_name = $row['emerg_name'];
    $emerg_cont = $row['emerg_cont'];
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
        <span class="dashboard">Donor Profile Updation</span>
        <a href = "logout.php">Logout</a>

      </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Update Profile</div>
          <div class="sales-details">
            <form method = "post">
            <label for="name">Email:</label>
              <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly><br><br>
            <label for="name">Chronic Disease:</label>
              <input type="text" id="chronic" name="chronic" value="<?php echo $chronic; ?>" readonly><br><br>
            <label for="name">Any Vices:</label>
              <input type="text" id="vices" name="vices" value="<?php echo $vices; ?>" readonly><br><br>
            <label for="name">Covid Vaccine:</label>
              <input type="text" id="covid_vaccine" name="covid_vaccine" value="<?php echo $covid_vaccine; ?>" readonly><br><br>
            <label for="name">Last Donated:</label>
              <input type="text" id="last_donated" name="last_donated" value="<?php echo $last_donated; ?>" readonly><br><br>
            <label for="name">Current Medication:</label>
              <input type="text" id="cur_med" name="cur_med" value="<?php echo $cur_med; ?>" readonly><br><br>
            <label for="name">Allergies:</label>
              <input type="text" id="allergies" name="allergies" value="<?php echo $allergies; ?>" readonly><br><br>
            <label for="name">Weight:</label>
              <input type="text" id="weight" name="weight" value="<?php echo $weight; ?>" readonly><br><br>
            <label for="name">Height:</label>
              <input type="text" id="height" name="height" value="<?php echo $height; ?>" readonly><br><br>
              <label for="name">Last Travel:</label>
              <input type="text" id="last_travel" name="last_travel" value="<?php echo $last_travel; ?>" readonly><br><br>
              <label for="name">Emergency Name:</label>
              <input type="text" id="emerg_name" name="emerg_name" value="<?php echo $emerg_name; ?>" readonly><br><br>
              <label for="name">Emergency Contact No:</label>
              <input type="text" id="emerg_cont" name="emerg_cont" value="<?php echo $emerg_cont; ?>" readonly><br><br>
            <button type="button" onclick="enable()">Edit</button><br>
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

    function enable() {
      // Enable editing of input fields
      document.getElementById("chronic").readOnly = false;
      document.getElementById("vices").readOnly = false;
      document.getElementById("covid_vaccine").readOnly = false;
      document.getElementById("last_donated").readOnly = false;
      document.getElementById("cur_med").readOnly = false;
      document.getElementById("allergies").readOnly = false;
      document.getElementById("weight").readOnly = false;
      document.getElementById("height").readOnly = false;
      document.getElementById("last_travel").readOnly = false;
      document.getElementById("emerg_name").readOnly = false;
      document.getElementById("emerg_cont").readOnly = false;

      // Show the save button and hide the edit button
      document.getElementById("saveBtn").style.display = "block";
      document.querySelector("button[onclick='enable()']").style.display = "none";
    }
  </script>

</body>
</html>

<?php
if(isset($_POST['save'])){
    $chronic = $_POST['chronic'];
    $vices = $_POST['vices'];
    $covid_vaccine = $_POST['covid_vaccine'];
    $last_donated = $_POST['last_donated'];
    $cur_med = $_POST['cur_med'];
    $allergies = $_POST['allergies'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $last_travel = $_POST['last_travel'];
    $emerg_name = $_POST['emerg_name'];
    $emerg_cont = $_POST['emerg_cont'];

    $query = "UPDATE donor_registration SET chronic='$chronic', vices='$vices', covid_vaccine='$covid_vaccine', last_donated='$last_donated',cur_med='$cur_med', allergies='$allergies', weight='$weight', height='$height', last_travel='$last_travel', emerg_name='$emerg_name', emerg_cont='$emerg_cont' WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Refresh:0");
        exit();
    }

}

?>

