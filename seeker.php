<?php 
include('db.php'); 
session_start();
if(isset($_POST['submit'])) {
    $blood_group = $_POST['blood_group'];
    $address = $_POST['address'];
    $query = "SELECT hospital_name,email,address,phonenum,sufsup  FROM mp_admin WHERE blood_group = '$blood_group' AND address = '$address'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {

        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $hospital_name = $row['hospital_name'];
            $email = $row['email'];
            $address = $row['address'];
            $phonenum = $row['phonenum'];
            $sufsup = $row['sufsup'];
            echo $hospital_name;
            echo $email;
            echo $address;
            echo $phonenum;
            echo $sufsup;

      }
        
    }
    else{
        echo "0 results";
    }
}
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
                width: 400px;
                height: 250px;
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
                        <a href="indexphp" class="nav-item nav-link">Home</a>
                        <a href="livebloodcampphp" class="nav-item nav-link">Live Blood Camps</a>
                        <a href="donor.php" class="nav-item nav-link">Donor Registration</a>
                        <a href="guidelinesphp" class="nav-item nav-link">Guidelines</a>
                        <a href="login.php" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </nav>

            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class = "img-fluid custom-size" src="img/seeker.jpeg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <!--<div class="p-3" style="max-width: 900px;">-->
                                <!-- <h1 style="color: white; font-size: 70px;">Lets unite to Save Lives !</h1> -->
                                <div class="search_select_box">
                                    <select id="address" name="address" style="width: 400px; height: 40px;" data-live-search = "true">
                                    <label for="address">Location: </label>
                                        <option value="" disabled selected hidden>Choose Location</option>
                                        <option>Ghatkopar</option>
                                        <option>Borivali</option>
                                        <option>Andheri</option>
                                        <option>Versova</option>
                                        <option>Juhu</option>
                                        <option>Bandra</option>
                                    </select>
                                </div>
                                <div class="search_select_box">
                                    <select id="blood_group" name="blood_group" style="width: 400px; height: 40px;" data-live-search = "true">
                                    <label for="blood_group">Blood Group: </label>
                                        <option value="" disabled selected hidden>Choose Blood Group</option>
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
                                
                                <div>
                                    <input type="submit" name="submit" value="Search">
                                </div>
                                

                                
                        
                        </div>

                    </div>
                </div>
                
            </div>

            <div class="card">
                <h3>hospital name</h3>
                <p><span>Address:</span>address</p>
                <p><span>Phone number:</span> hospital number</p>
            </div>

        </div>
        <!--Boostrap js libraries links-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

        <!-- Navbar & Carousel End -->
    </body>
</html>