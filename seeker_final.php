<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
include("db.php");
include("navbar.php");

$query = "SELECT DISTINCT location FROM bloodcamp";
$result = mysqli_query($conn, $query);

?>


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
                                        <option value="" disabled selected hidden>Choose Location</option>
                                        <?php
                                        // Fetch all unique locations from the database

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $location = $row['location'];
                                                echo '<option value="' . $location . '">' . $location . '</option>';
                                            }
                                        } else {
                                            echo '<option disabled>No locations available</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="search_select_box">
                                    <select id="blood_group" name="blood_group" style="width: 400px; height: 40px;" data-live-search = "true">
                                        <option disabled selected hidden>Choose Blood Group</option>
                                        <option value="a_pos">A+</option>
                                        <option value="a_neg">A-</option>
                                        <option value="b_pos">B+</option>
                                        <option value="b_neg">B-</option>
                                        <option value="ab_pos">AB+</option>
                                        <option value="ab_neg">AB-</option>
                                        <option value="o_pos">O+</option>
                                        <option value="o_neg">O-</option>
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
        if(isset($_POST['submit'])) {
            $blood_group = $_POST['blood_group'];
            $address = $_POST['address'];
            
            $query = "SELECT * FROM Blood_Stock";
            $result = mysqli_query($conn, $query);
            
            // Initialize variables
            $org_name = "";
            $org_add = "";
            $email = "";
            $org_no = "";
            $website_url = "";

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $email = $row['org_email'];
                    $a_pos = $row['a_pos'];
                    $a_neg = $row['a_neg'];
                    $b_pos = $row['b_pos'];
                    $b_neg = $row['b_neg'];
                    $o_pos = $row['o_pos'];
                    $o_neg = $row['o_neg'];
                    $ab_pos = $row['ab_pos'];
                    $ab_neg = $row['ab_neg'];
                    $sufsup = $row['sufsup'];
                }
            }
            else {
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
                          <p>No booking details found for the organization: ' . $org_name . '</p>
                          <button onclick="closePopup()">OK</button>
                      </div>';
            }

            // Display organization details
            echo '<div class="card">';
            echo '<h2>'. $org_name.'</h2>';
            echo '<h5> Contact Details </h5>';
            echo '<p><span>Address : </span>'. $org_add.'</p>';
            echo '<p><span>Blood Group Available : </span>'. $blood_group.'</p>';
            echo '<p><span>Email : </span>'. $email.'</p>';
            echo '<p><span>Contact Info : </span>'. $org_no.'</p>';
            echo '<p><span>Website URL : </span>'. $website_url.'</p>';
            $urlParams = http_build_query(array(
                'org_name' => $org_name,
                'blood_group' => $blood_group,
                'org_email' => $email
            ));
            echo '<p><span><a href="seeker.php?' . $urlParams . '">Seek</a></span></p>';
            echo '</div>';
        }

        ?>

    </body>
</html>