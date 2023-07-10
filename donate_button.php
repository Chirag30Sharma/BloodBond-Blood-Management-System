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
                display: inline-block;
                width: 450px;
                height: 300px;
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
            .popup {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1;
                justify-content: center;
                align-items: center;
            }

            .popup-message {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0px 0px 5px #999999;
                font-size: 18px;
                text-align: center;
            }
            .book-btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: transparent; 
                color: #000; 
                font-size: 16px;
                font-weight: bold;
                text-align: center;
                text-decoration: none;
                border-radius: 50px;
                transition: background-color 0.3s ease;
                border: 2px solid #000;
                }

            .book-btn span {
                display: inline-block;
                position: relative;
                top: -2px;
            }

            .book-btn:hover {
                background-color: white;
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

            <form action="donate_button.php" method = "POST">
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
                                        <option>Vile Parle</option>
                                        <option>Andheri</option>
                                        <option>Kurla</option>
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
                $query = "SELECT hospital_name,email,address,phonenum,reqbg FROM mp_admin WHERE reqbg = '$blood_group' AND address = '$address'";
                $result = mysqli_query($conn, $query);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $hospital_name = $row['hospital_name'];
                        $email = $row['email'];
                        $address = $row['address'];
                        $phonenum = $row['phonenum'];
                        $reqbg = $row['reqbg'];

                        echo '<div class="card">';
                        echo '<h1>' . $hospital_name .'</h1>';
                        echo '<p><span>Address : </span>'. $address.'</p>';
                        echo '<h5> Contact Details </h5>';
                        echo '<p><span>Email : </span>'. $email.'</p>';
                        echo '<p><span>Phone number : </span>'.$phonenum.'</p>';
                        echo '<a href="new_page.php" class="book-btn"><span>Book a slot</span></a>';
                        echo '</div>';
                    }
                }
                else{
                    echo "0 results";
                }
            }
        ?>

    <!-- Popup message -->
    <div id="popup" class="popup">
            <div class="popup-message">
                Blood group updated successfully!
            </div>
    </div>

    </body>
</html>