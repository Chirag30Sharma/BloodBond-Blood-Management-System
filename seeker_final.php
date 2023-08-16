<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}?>


<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Live Blood Camps</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">


        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <style>
            .card {
                width: 450px;
                height: 350px;
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 20px;
                margin: 20px;
                width: 300px;
                box-shadow: 2px 2px 4px #ccc;
                font-family: Arial, sans-serif;
                background-color: #ADD8E6;
                
            }

            .card h3 {
                margin-top: 0;
                font-size: 24px;
                font-weight: bold;
                color: #333;
            }

            .card p {
                margin: 10px 0;
                font-size: 16px;
                color: #333;
            }

            .card span {
                font-weight: bold;
                color: #333;
            }
            .card-bottom {
                position: absolute;
                bottom: 10px;
                width: 100%;
                text-align: center;
                font-weight: bold;
                color: #FFFFFF;
            
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
        <!-- Navbar & Carousel Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
                <a href="indexphp" class="navbar-brand p-0">
                    <h1 class="m-0">BLOODBOND</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="livebloodcampphp" class="nav-item nav-link">Live Blood Camps</a>
                        <a href="donor.php" class="nav-item nav-link">Donor Registration</a>
                        <a href="guidelinesphp" class="nav-item nav-link">Guidelines</a>
                        <a href="login.php" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </nav>

            <form action="seeker_final.php" method = "POST">
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class = "img-fluid custom-size" src="img/seeker.jpeg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <!--<div class="p-3" style="max-width: 900px;">-->
                                <!-- <h1 style="color: white; font-size: 70px;">Lets unite to Save Lives !</h1> -->
                                <div class="search_select_box">
                                    <select id="address" name="address" style="width: 400px; height: 40px;" data-live-search = "true">
                                        <option disabled selected hidden>Choose Location</option>
                                        <option>Ghatkopar</option>
                                        <option>Kurla</option>
                                        <option>Andheri</option>
                                        <option>Vile Parle</option>
                                        <option>Bandra</option>
                                    </select>
                                </div>
                                <div class="search_select_box">
                                    <select id="blood_group" name="blood_group" style="width: 400px; height: 40px;" data-live-search = "true">
                                        <option disabled selected hidden>Choose Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                                
                                <button class="nextBtn" type="submit" name="submit">
                                <span class="btnText">Search</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
</form>

        <!--Boostrap js libraries links-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

        <!-- Navbar & Carousel End -->

    <?php 
    include('db.php'); 
    if(isset($_POST['submit'])) {

        $blood_group = $_POST['blood_group'];
        $address = $_POST['address'];
        $query = "SELECT org_email,sufsup FROM Blood_Stock WHERE sufsup = '$blood_group'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $email = $row['org_email'];
                $sufsup = $row['sufsup'];
        }
            
        }
        else{
            echo '<div class="popup-box">
                        <p>Error fetching details</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
        }


        $stmt = $conn->prepare("SELECT org_name, org_add, org_no, website_url FROM admin_registration WHERE org_email = ?");
        $stmt->bind_param("s", $email);

        
        if (!$stmt->execute()) {
            die("Error executing the query: " . $stmt->error);
        }

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
                    $org_name = $row['org_name'];
                    $org_add = $row['org_add'];
                    $org_no = $row['org_no'];
                    $website_url = $row['website_url'];
                
            }
        } else {
            
            echo '<div class="popup-box">
                        <p>No booking details found for the organization: $name</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
    }
        }


        echo '<div class="card">';
        echo '<h2>'. $org_name.'</h2>';
        echo '<h5> Contact Details </h5>';
        echo '<p><span>Address : </span>'. $org_add.'</p>';
        echo '<p><span>Email : </span>'. $email.'</p>';
        echo '<p><span>Contact Info : </span>'. $org_no.'</p>';
        echo '<p><span>Website URL : </span>'. $website_url.'</p>';
        echo '<button type="sub" class="btn" name="upd">Seek</button>';
        echo '</div>';
        
        // if(isset($_POST["upd"])){
        //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //         $sufsup = $_POST["sufsup"];
        //         $stmt = $conn->prepare("UPDATE Blood_Stock SET sufsup = ? WHERE org_email = ?");
        //         $stmt->bind_param("ss", $sufsup, $email);
        //         $result = $stmt->execute();
        //     }
        // }
    

    
    ?>

    </body>
</html>