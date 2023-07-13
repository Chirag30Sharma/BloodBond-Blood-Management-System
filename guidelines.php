<?php

session_start(); // Add this line to initialize the session
include("db.php");

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guidelines</title>
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
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <style>
            h1,
            h3,
            h2 {
                text-align: center;
            }


            th {
                text-align: left;
            }

            .styled-table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            .styled-table thead tr {
                background-color: #3f86cd;
                color: #ffffff;
                text-align: left;
            }

            .styled-table th,
            .styled-table td {
                padding: 12px 15px;
                text-align: center;
            }

            .styled-table tbody tr {
                border-bottom: 1px solid #dddddd;
            }

            .styled-table tbody tr:nth-of-type(even) {
                background-color: #f3f3f3;
            }

            .styled-table tbody tr:last-of-type {
                border-bottom: 2px solid #3c7dc8;
            }

            .styled-table tbody tr.active-row {
                font-weight: bold;
                color: #009879;
            }

            .accordion {
                background-color: #eee;
                color: #444;
                cursor: pointer;
                padding: 18px;
                width: 100%;
                border: none;
                text-align: left;
                outline: none;
                font-size: 15px;
                transition: 0.4s;
            }

            .active,
            .accordion:hover {
                background-color: #e06377;
            }

            .panel {
                padding: 0 18px;
                background-color: white;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.2s ease-out;
            }

            .accordion:hover {
                background-color: #b8a9c9;
            }

            .accordion {
                text-align: center;
            }

            .tab {
                padding-left: 400px;
            }

            .xyz
            {
                width: 100%;
                font-family: sans-serif;
                text-decoration-color: black;
            }
        </style>

        <body>
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner"></div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar & Carousel Start -->
            <div class="container-fluid position-relative p-0">
                <?php include("navbar.php"); ?>

                <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="w-100" src="img/blood_guidelines.png" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div>
                                    <h1 style="color: white; font-size: 90px;">Guidelines</h1>
                                    <h1 style="color: white; font-size: 90px;">for</h1> 
                                    <h1 style="color: white; font-size: 90px;">Blood Donation</h1>  
                                    <!-- <a href="quote.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Donate</a>
                                    <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Seeker</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Navbar & Carousel End -->
            
            <br><br><br>
            <h1 style="color:#06A3DA;">Who's your Match?</h1>
            <div class="tab">
                <table class="styled-table" style="width: 65%;" align="center" >
                    <thead>
                        <tr>
                            <th>Blood Type</th>
                            <th>Donate</th>
                            <th>Receive</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>A+</b></td>
                            <td>A+ AB+</td>
                            <td>A+ A- O+ O-</td>
                        </tr>
                        <tr>
                            <td><b>O+</b></td>
                            <td>O+ A+ B+ AB+</td>
                            <td>O+ O-</td>
                        </tr>
                        <tr>
                            <td><b>B+</b></td>
                            <td>B+ AB+</td>
                            <td>B+ B- O+ O-</td>
                        </tr>
                        <tr>
                            <td><b>AB+</b></td>
                            <td>AB+</td>
                            <td>Everyone</td>
                        </tr>
                        <tr>
                            <td><b>A-</b></td>
                            <td>A+ A- AB+ AB-</td>
                            <td>A- O-</td>
                        </tr>
                        <tr>
                            <td><b>O-</b></td>
                            <td>Everyone</td>
                            <td>O-</td>
                        </tr>
                        <tr>
                            <td><b>B-</b></td>
                            <td>B+ B- AB+ AB-</td>
                            <td>B- O-</td>
                        </tr>
                        <tr>
                            <td><b>AB-</b></td>
                            <td>AB+ AB-</td>
                            <td>AB- A- B- O-</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <br><br><br>



            <h1 style="color:#06A3DA;"><strong>Guidelines For Blood Donation</strong></h1>
            <br>
            <table cellpadding="30">
                <thead>
                    <tr>
                        <th>
                            <div class="v1">
                                <iframe width="400" height="300" src="https://www.youtube.com/embed/YHxdhI5ZrHc"
                                    frameborder="0"></iframe>
                            </div>
                        </th>
                        <th>
                            <div class="v2">
                                <iframe width="400" height="300" src="https://www.youtube.com/embed/p6-hVDcz3zQ"
                                    frameborder="0"></iframe>
                            </div>
                        </th>
                        <th>
                            <div class="v3">
                                <iframe width="400" height="300" src="https://www.youtube.com/embed/NYZBmdT_o8I"
                                    frameborder="0"></iframe>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <br><br>
            <h1 style="color:#06A3DA;"><strong>Myths About Blood Donation</strong></h1>
            <br>
            <table cellpadding = 30>
                <thead>
                    <tr>
                        <th>
                            <div class="v4">
                                <iframe width="400" height="300" src="https://www.youtube.com/embed/5nDk3PjtaEM"
                                    frameborder="0"></iframe>
                            </div>
                        </th>
                        <th>
                            <div class="v5">
                                <iframe width="400" height="300" src="https://www.youtube.com/embed/FXmkVg8a2Mo"
                                    frameborder="0"></iframe>
                            </div>
                        </th>
                    </tr>
                </thead>

            </table>
            <br><br>
            <h2 style="color:#06A3DA;"><strong>FREQUENTLY ASKED QUESTIONS</strong></h2>
            <br>

            <div class="xyz">
                <button class="accordion">Is it possible to contract an infectious disease from donating blood?</button>
                <div class="panel">
                    <p>The risk of contracting an infectious disease from donating blood is very low. All blood donations are
                        carefully screened for infectious agents, including HIV, hepatitis B and C, and other viruses, before
                        they
                        are used. In addition, sterile equipment is used for each donation, and donors must meet eligibility
                        criteria and pass a health screening before donating. However, if you are feeling unwell or have any
                        symptoms of an infectious disease, it's important to avoid donating blood until you are feeling better.
                    </p>
                </div>

                <button class="accordion">Can I donate blood if I have recently traveled outside of the country?</button>
                <div class="panel">
                    <p>It depends on where you have traveled. Some countries or regions may have a higher risk of certain
                        infections, and you may need to wait a certain amount of time before donating blood. It's always best to
                        consult with a healthcare provider or the blood donation center to determine your eligibility.</p>
                </div>

                <button class="accordion">How much blood is taken during a donation?</button>
                <div class="panel">
                    <p> The amount of blood taken during a donation depends on the type of donation. For a whole blood donation,
                        typically around one pint (or 450 ml) of blood is collected. For other types of donations, such as
                        platelets
                        or plasma, only certain components of the blood are collected.</p>
                </div>

                <button class="accordion">Can I donate blood if I have received a COVID-19 vaccine?</button>
                <div class="panel">
                    <p> Yes, in most cases individuals who have received a COVID-19 vaccine are eligible to donate blood, as
                        long as
                        they meet other eligibility criteria. However, some blood donation centers may require a waiting period
                        after receiving a vaccine before donating, so it's always best to consult with the donation center.</p>
                </div>

                <button class="accordion">Can I donate blood if I am taking medication?</button>
                <div class="panel">
                    <p> It depends on the medication. Some medications may prevent you from donating blood, while others may
                        require
                        you to wait a certain amount of time before donating. It's always best to consult with a healthcare
                        provider
                        or the blood donation center to determine your eligibility.</p>
                </div>
            </div>

            <script>
                var acc = document.getElementsByClassName("accordion");
                var i;

                for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function () {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight) {
                            panel.style.maxHeight = null;
                        } else {
                            panel.style.maxHeight = panel.scrollHeight + "px";
                        }
                    });
                }
            </script>
                  
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


        </body>
    </head>
</html>