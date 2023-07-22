<?php 
include('db.php'); 
session_start();
$email = $_SESSION['email'];
$query = "SELECT name, gender,bloodgroup FROM login WHERE email='$email'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $gender = $row['gender'];
    $bg = $row['bloodgroup'];
    $name = $row['name'];
}

?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="login_d_style.css">
    <!-- Boxicons CDN Link -->

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
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Welcome! <?php echo $name?></span>
        <a href = "logout.php">Logout</a>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Name:</div>
            <div class="number"><?php echo $name?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
            
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Gender:</div>
            <div class="number"><?php echo $gender?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
             
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Blood Type:</div>
            <div class="number"><?php echo $bg ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
         
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Action:</div>
            <div class="number">Donate</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
            
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Donation History</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Date</li>
              <li><a href="#">02 Jan 2018</a></li>
              <li><a href="#">30 April 2019</a></li>
              <li><a href="#">15 September 2020</a></li>
              <li><a href="#">07 December 2021</a></li>
              <li><a href="#">17 Feb 2022</a></li>
              <li><a href="#">31 May 2022</a></li>
              <li><a href="#">03 April 2023</a></li>
            </ul>
            <ul class="details">
            <li class="topic">Hospital</li>
            <li><a href="#">Rajawadi Hospital</a></li>
            <li><a href="#">City Hospital</a></li>
            <li><a href="#">City Hospitalr</a></li>
         
            <li><a href="#">Kokilaben Hospital</a></li>
            <li><a href="#">Rajawadi Hospital</a></li>
            <li><a href="#">Venus Hospital</a></li>
             <li><a href="#">Seven Hills Hospital</a></li>
          </ul>
          <ul class="details">
            <li class="topic">Status</li>
            <li><a href="#">Sucessful</a></li>
            <li><a href="#">Sucessful</a></li>
            <li><a href="#">Sucessful</a></li>
            <li><a href="#">Sucessful</a></li>
            <li><a href="#">Sucessful</a></li>
            <li><a href="#">Sucessful</a></li>
            <li><a href="#">Sucessful</a></li>
          
          </ul>
          <ul class="details">
            <li class="topic">Unit</li>
            <li><a href="#">65</a></li>
            <li><a href="#">80</a></li>
            <li><a href="#">70</a></li>
            <li><a href="#">60</a></li>
            <li><a href="#">50</a></li>
            <li><a href="#">100</a></li>
            <li><a href="#">65</a></li>
         
          </ul>
          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Request for Donation</div>
         
              <div class="button">
                <a href="#">Request</a>
              </div>
              <div class="title">Request for Seeking</div>
         
              <div class="button">
                <a href="#">Request</a>
              </div>
          </li>
          </ul>
        </div>
      </div>
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

