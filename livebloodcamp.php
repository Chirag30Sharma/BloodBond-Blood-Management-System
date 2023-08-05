<?php
session_start(); // Add this line to initialize the session
include("db.php");
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
                max-width: 100%;
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 20px;
                margin: 20px;
                box-shadow: 2px 2px 4px #ccc;
                font-family: Arial, sans-serif;
                background-color: #ADD8E6;
                /* Add the following styles to handle bigger address */
                position: relative;
                overflow: hidden;
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
        </style>

    </head>
    <body>
        <!-- Navbar & Carousel Start -->
        <div class="container-fluid position-relative p-0">
            <?php include("navbar.php"); ?>

            <form action="livebloodcamp.php" method = "POST">
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class = "img-fluid custom-size" src="img/blood_camp_thing.jpeg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <!--<div class="p-3" style="max-width: 900px;">-->
                                <!-- <h1 style="color: white; font-size: 70px;">Lets unite to Save Lives !</h1> -->
                                <div class="search_select_box">
                                    <select name="location" style="width: 400px; height: 40px;" data-live-search="true">
                                        <option value="" disabled selected hidden>Choose Location</option>
                                        <?php
                                        // Fetch all unique locations from the database
                                        $query = "SELECT DISTINCT location FROM bloodcamp";
                                        $result = mysqli_query($conn, $query);

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
                                    <br><br>
                                    <div>
                                        <button class="nextBtn" type="submit" name="submit">
                                            <span class="btnText">Search</span>
                                        </button>
                                    </div>
                                </div>
                                
                                
                            <!--</div>-->
                        </div>

                    </div>
                 </div>
            </div>

          </div>
          </form>
          <?php
            include('db.php');
            if (isset($_POST['submit'])) {
                $location = $_POST['location'];
                $query = "SELECT org_name, org_email, date, address, contact_info FROM bloodcamp WHERE location = '$location'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $org_name = $row['org_name'];
                        $date = $row['date'];
                        $address = $row['address'];
                        $contact_info = $row['contact_info'];
                        $org_email = $row['org_email'];

                        // Calculate the height of the card based on the address length
                        $addressHeight = min(100, max(30, substr_count($address, "\n") * 20));
                    }
                } else {
                    echo '<div class="popup-box">
                        <p>Error fetching details</p>
                        <button onclick="closePopup()">OK</button>
                    </div>';
                }

                echo '<div class="card" style="height: ' . (300 + $addressHeight) . 'px;">';
                echo '<h1>' . $org_name . '</h1>';
                echo '<p><span>Date : </span>' . $date . '</p>';
                echo '<p><span>Address : </span>' . $address . '</p>';
                echo '<p><span>Phone number : </span>' . $contact_info . '</p>';
                echo '<p><span>Email : </span>' . $org_email . '</p>';
                $urlParams = http_build_query(array(
                    'org_name' => $org_name,
                    'date' => $date,
                    'address' => $address,
                ));
                echo '<p><span><a href="donate_button.php?' . $urlParams . '</span>">BOOK</a></p>';
            }
            ?>

        <!--Boostrap js libraries links-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.dropdown-toggle').dropdown();
            });
        </script>

        <!-- Navbar & Carousel End -->
    </body>
</html>