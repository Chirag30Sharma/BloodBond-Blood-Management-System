<?php
include('inc/db.php');
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

$email = $_SESSION["email"];
$sql = "SELECT org_name FROM admin_registration WHERE org_email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['org_name'];
}

$stmt = $conn->prepare("SELECT org_name, org_add, org_no FROM admin_registration WHERE org_email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $organisation_name = $row['org_name'];
        $organisation_address = $row['org_add'];
        $organisation_num = $row['org_no'];
    }

} else {
    echo '<div class="popup-box">
                        <p>Error while fetching details</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
}  


$stmt = $conn->prepare("SELECT a_pos, a_neg, b_pos, b_neg, o_pos, o_neg, ab_pos, ab_neg FROM Blood_Stock WHERE org_email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $a_pos = $row['a_pos'];
        $a_neg = $row['a_neg'];
        $b_pos = $row['b_pos'];
        $b_neg = $row['b_neg'];
        $o_pos = $row['o_pos'];
        $o_neg = $row['o_neg'];
        $ab_pos = $row['ab_pos'];
        $ab_neg = $row['ab_neg'];
    }

} else {
    echo "0 results";
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['security_pin'])) {
        $securityPin = '1234';
        $enteredPin = $_POST['security_pin'];

        if ($enteredPin === $securityPin) {
            $showBloodStockPopup = true;
        } else {
            echo "<script>alert('Invalid security pin!');</script>";
        }
    }
    if (isset($_POST["save"])) {
        $bloodGroup = $_POST['blood_group'];
        $unitCount = $_POST['unit_count'];

        // Insert the data into the database
        // Modify the following code to insert the values into your database table
        $sql = "INSERT INTO blood_stock (blood_group, unit_count) VALUES ('$bloodGroup', '$unitCount')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Blood stock saved successfully!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hospital Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="acss/abootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="acss/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div> -->
    <!-- Spinner End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a class="navbar-brand p-0">
                <h1 class="m-0"><?php echo $organisation_name; ?></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a class="nav-item nav-link"><?php echo $organisation_address; ?></a>
                    <a class="nav-item nav-link"><?php echo $organisation_num; ?></a>
                </div>

            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-hover" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More Action</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="change_pass.php">Change Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
            </nav>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="aimg/hospital.jpeg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                        <div class="card-container">
                            <div class="card add-card">
                                <div class="card-content">
                                    <a href="add.php?email=<?php echo $email;?>">
                                        <div class="card-icon">
                                            <i class="fa fa-plus-circle"></i>
                                        </div>
                                        <div class="card-text">
                                            Add
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card available-card">
                                <div class="card-content">
                                    <a href="avail.php?email=<?php echo $email;?>">
                                        <div class="card-icon">
                                            <i class="fa fa-plus-circle"></i>
                                        </div>
                                        <div class="card-text">
                                            Available
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card bookings-card">
                                <div class="card-content">
                                    <a href = "bookings.php">
                                        <div class="card-icon">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                        <div class="card-text">
                                            Bookings
                                        </div>
                                    </a>
                                </div>
                            
                            </div>
                        </div>
                        <br><br>
                        
                        <a href="blood.php" class="btn btn-outline-light py-md-3 px-md-5">Manage Blood Stock</a>
                        <a href="bloodcamp.php" class="btn btn-outline-light py-md-3 px-md-5">Create Blood Camp</a>
                        <a href="seeking.php" class="btn btn-outline-light py-md-3 px-md-5">Seeker List</a>
                    
                         <!-- Popup for Security Pin -->
                        
                        <!-- <div id="popup1" class="overlay">
                            <div class="popup">
                                <h2>Here i am</h2>
                                <a class="close" href="#popup1">&times;</a>
                                <div class="content">
                                Thank to pop me out of that button, but now i'm done so you can close this window.
                                </div>
                            </div>
                        </div> -->
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

  

    <!-- Footer Start -->
    
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">BloodBond</a>. All Rights Reserved. 
						
						<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						Designed by <a class="text-white border-bottom" href="https://miniprojectguys.com">miniprojectguys</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>



