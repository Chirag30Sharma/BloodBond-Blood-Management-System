<?php
include('db.php');
session_start();
$email = $_SESSION['email'];

// Navbar and basic details
$query = "SELECT name, gender, bloodgroup FROM login WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $gender = $row['gender'];
    $bg = $row['bloodgroup'];
    $name = $row['name'];
}

// Donation history
$donationQuery = "SELECT date, org_name FROM donate WHERE user_email='$email' ORDER BY date DESC";
$donationResult = mysqli_query($conn, $donationQuery);
$donationHistory = mysqli_fetch_all($donationResult, MYSQLI_ASSOC);

if (isset($_GET['search_date'])) {
    $searchDate = $_GET['search_date'];
    // Use the prepared statement to avoid SQL injection
    $donationQuery = "SELECT date, org_name FROM donate WHERE user_email='$email' AND date='$searchDate' ORDER BY date DESC";
    $donationResult = mysqli_query($conn, $donationQuery);
    $donationHistory = mysqli_fetch_all($donationResult, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<!-- Designed by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <!--<title>Responsive Admin Dashboard | CodingLab</title>-->
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
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="update.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Update Login Profile</span>
                </a>
            </li>
            <li>
                <a href="update_donor.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Update Donor Profile</span>
                </a>
            </li>
            <li>
                <a href="update_pass.php" class="active">
                    <i class='bx bx-grid-alt'></i>
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
            <form class="search-form" method="get">
                <div class="search-box">
                    <input type="text" name="search_date" placeholder="Search by Date (YYYY-MM-DD)...">
                    <button type="submit" class="search-btn" name="submit_search"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <div class="profile-details">
                <!--<img src="images/profile.jpg" alt="">-->
                <span class="admin_name">Welcome! <?php echo $name?></span>
                <a href="logout.php">Logout</a>
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
                    <i class="bx bx-user size-large"></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Gender:</div>
                        <div class="number"><?php echo $gender?></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                        </div>
                    </div>
                    <?php if ($gender === 'Female'): ?>
                        <i class="bx bx-female-sign size-large"></i>
                    <?php else: ?>
                        <i class="bx bx-male-sign size-large"></i>
                    <?php endif; ?>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Blood Type:</div>
                        <div class="number"><?php echo $bg ?></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                        </div>
                    </div>
                    <i class="bx bxs-droplet size-large"></i>
                </div>
            </div>
            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Donation History</div>
                    <div class="sales-details">
                        <?php foreach ($donationHistory as $donation): ?>
                            <ul class="details">
                                <li class="topic">Date</li>
                                <li><?php echo $donation['date']; ?></li>
                            </ul>
                            <ul class="details">
                                <li class="topic">Hospital</li>
                                <li><?php echo $donation['org_name']; ?></li>
                            </ul>
                            <ul class="details">
                                <li class="topic">Status</li>
                                <li><?php echo "In Process"; ?></li>
                            </ul>
                            <ul class="details">
                                <li class="topic">Unit</li>
                                <li><?php echo "Default Unit"; ?></li>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        }
    </script>
</body>
</html>