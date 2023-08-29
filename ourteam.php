<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
    <link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/animate/animate.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">
</head>
<style>
.icon-block svg {
  width: 100%;
  height: 100%;
}

* {
  font-family: Nunito, sans-serif;
}

.team-cards-inner-container {
  display: flex;
  row-gap: 1.3rem;
  column-gap: 1.3rem;
}

.text-blk {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  line-height: 25px;
}

.responsive-cell-block {
  min-height: 75px;
}

.responsive-container-block {
  min-height: 75px;
  height: fit-content;
  width: 100%;
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  justify-content: flex-start;
}

.inner-container {
  max-width: 1200px;
  min-height: 100vh;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  justify-content: center;
}

.section-head {
  font-size: 60px;
  line-height: 70px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 24px;
  margin-left: 0px;
}

.section-body {
  font-size: 14px;
  line-height: 18px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 64px;
  margin-left: 0px;
}

.team-cards-outer-container {
  display: flex;
  align-items: center;
}

.content-container {
  display: flex;
  justify-content: flex-start;
  flex-direction: row;
  align-items: center;
  padding-top: 0px;
  padding-right: 25px;
  padding-bottom: 0px;
  padding-left: 0px;
}

.img-box {
  max-width: 130px;
  max-height: 130px;
  width: 100%;
  height: 100%;
  overflow-x: hidden;
  overflow-y: hidden;
  margin-top: 0px;
  margin-right: 25px;
  margin-bottom: 0px;
  margin-left: 0px;
}

.card {
  background-color: rgb(255, 255, 255);
  display: flex;
  padding-top: 16px;
  padding-right: 16px;
  padding-bottom: 16px;
  padding-left: 16px;
  box-shadow: rgba(95, 95, 95, 0.1) 6px 12px 24px;
  flex-direction: row;
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
  border-bottom-right-radius: 15px;
  border-bottom-left-radius: 15px;
}

.card-container {
  max-width: 350px;
}

.card-content-box {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.person-name {
  font-size: 20px;
  font-weight: 700;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 5px;
  margin-left: 0px;
}

.person-info {
  font-size: 11px;
  line-height: 15px;
}

.card-container {
  max-width: 350px;
}

.outer-container {
  justify-content: center;
  padding-top: 0px;
  padding-right: 50px;
  padding-bottom: 0px;
  padding-left: 50px;
  background-color: #FAF8CD;
}

.person-img {
  width: 100%;
  height: 100%;
  border-top-left-radius: 6px;
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
  border-bottom-left-radius: 6px;
}

@keyframes bounce {

  0%,
  20%,
  50%,
  80%,
  100% {
    transform: translateY(0px);
  }

  40% {
    transform: translateY(-30px);
  }

  60% {
    transform: translateY(-15px);
  }

  0%,
  20%,
  50%,
  80%,
  100% {
    transform: translateY(0px);
  }

  40% {
    transform: translateY(-30px);
  }

  60% {
    transform: translateY(-15px);
  }
}

@media (max-width: 1024px) {
  .team-card-container {
    justify-content: center;
  }

  .section-head {
    font-size: 50px;
    line-height: 55px;
  }

  .img-box {
    max-width: 109px;
    max-height: 109px;
  }

  .content-container {
    padding-top: 0px;
    padding-right: 20px;
    padding-bottom: 0px;
    padding-left: 0px;
  }

  .inner-container {
    justify-content: space-evenly;
  }
}

@media (max-width: 768px) {
  .inner-container {
    margin-top: 60px;
    margin-right: 0px;
    margin-bottom: 60px;
    margin-left: 0px;
  }

  .section-body {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .img-box {
    margin-top: 0px;
    margin-right: 30px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .content-box {
    text-align: center;
  }

  .content-container {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 30px;
    margin-left: 0px;
  }

  .card-container {
    max-width: 45%;
  }

  .team-cards-inner-container {
    justify-content: center;
  }
}

@media (max-width: 500px) {
  .outer-container {
    padding-top: 0px;
    padding-right: 60px;
    padding-bottom: 0px;
    padding-left: 60px;
  }

  .section-head {
    font-size: 40px;
    line-height: 45px;
  }

  .content-box {
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
  }

  .section-body {
    font-size: 12px;
  }

  .img-box {
    max-width: 68px;
    max-height: 68px;
  }

  .person-name {
    font-size: 14px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 1px;
    margin-left: 0px;
  }

  .content-box {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 46px;
    margin-left: 0px;
    text-align: left;
  }

  .content-container {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  .card-container {
    max-width: 100%;
  }
}

@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap');

*,
*:before,
*:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  margin: 0;
}

.wk-desk-1 {
  width: 8.333333%;
}

.wk-desk-2 {
  width: 16.666667%;
}

.wk-desk-3 {
  width: 25%;
}

.wk-desk-4 {
  width: 33.333333%;
}

.wk-desk-5 {
  width: 41.666667%;
}

.wk-desk-6 {
  width: 50%;
}

.wk-desk-7 {
  width: 58.333333%;
}

.wk-desk-8 {
  width: 66.666667%;
}

.wk-desk-9 {
  width: 75%;
}

.wk-desk-10 {
  width: 83.333333%;
}

.wk-desk-11 {
  width: 91.666667%;
}

.wk-desk-12 {
  width: 100%;
}

@media (max-width: 1024px) {
  .wk-ipadp-1 {
    width: 8.333333%;
  }

  .wk-ipadp-2 {
    width: 16.666667%;
  }

  .wk-ipadp-3 {
    width: 25%;
  }

  .wk-ipadp-4 {
    width: 33.333333%;
  }

  .wk-ipadp-5 {
    width: 41.666667%;
  }

  .wk-ipadp-6 {
    width: 50%;
  }

  .wk-ipadp-7 {
    width: 58.333333%;
  }

  .wk-ipadp-8 {
    width: 66.666667%;
  }

  .wk-ipadp-9 {
    width: 75%;
  }

  .wk-ipadp-10 {
    width: 83.333333%;
  }

  .wk-ipadp-11 {
    width: 91.666667%;
  }

  .wk-ipadp-12 {
    width: 100%;
  }
}

@media (max-width: 768px) {
  .wk-tab-1 {
    width: 8.333333%;
  }

  .wk-tab-2 {
    width: 16.666667%;
  }

  .wk-tab-3 {
    width: 25%;
  }

  .wk-tab-4 {
    width: 33.333333%;
  }

  .wk-tab-5 {
    width: 41.666667%;
  }

  .wk-tab-6 {
    width: 50%;
  }

  .wk-tab-7 {
    width: 58.333333%;
  }

  .wk-tab-8 {
    width: 66.666667%;
  }

  .wk-tab-9 {
    width: 75%;
  }

  .wk-tab-10 {
    width: 83.333333%;
  }

  .wk-tab-11 {
    width: 91.666667%;
  }

  .wk-tab-12 {
    width: 100%;
  }
}

@media (max-width: 500px) {
  .wk-mobile-1 {
    width: 8.333333%;
  }

  .wk-mobile-2 {
    width: 16.666667%;
  }

  .wk-mobile-3 {
    width: 25%;
  }

  .wk-mobile-4 {
    width: 33.333333%;
  }

  .wk-mobile-5 {
    width: 41.666667%;
  }

  .wk-mobile-6 {
    width: 50%;
  }

  .wk-mobile-7 {
    width: 58.333333%;
  }

  .wk-mobile-8 {
    width: 66.666667%;
  }

  .wk-mobile-9 {
    width: 75%;
  }

  .wk-mobile-10 {
    width: 83.333333%;
  }

  .wk-mobile-11 {
    width: 91.666667%;
  }

  .wk-mobile-12 {
    width: 100%;
  }
}

header {
    color:#45413A;
    text-align: center;
    margin-bottom: 0; /* Add this line to remove the default margin */
}

header h1 {
    font-family: 'Open Sans', sans-serif;
    font-size: 2.5rem;
    font-weight: bold;
}

.button {
    background-color: #27ae60;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
}

.button:hover {
    background-color: #2ecc71;
}

.card {
    /* Existing styles */
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.social-icons {
  width: 70px;
  display: flex;
  justify-content: space-between;
  color:#007bff;
}

.card-content-box {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; /* Add this line */
}


body {
    margin: 0;
}

/* Header Styles */
.navbar {
    background-color: #27ae60;
    color: white;
}

.navbar-brand {
    font-size: 24px;
    font-weight: bold;
}

.navbar-nav .nav-link {
    color:black;
    margin-right: 20px;
    font-size: 16px;
    transition: color 0.3s ease-in-out;
}

.navbar-nav .nav-link:hover {
    color:#007bff;
}

/* Footer Styles */
.footer {
    background-color: #f4f4f4;
    color: #333;
    padding: 40px 0;
}

.footer a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease-in-out;
}

.footer a:hover {
    color: #27ae60;
}

.footer .social-icons a {
    font-size: 24px;
    margin-right: 15px;
    color: #fff;
    transition: color 0.3s ease-in-out;
}

.footer .social-icons a:hover {
    color: #27ae60;
}

.footer .contact-info {
    font-size: 14px;
    margin-bottom: 15px;
}

.footer .section-title {
    font-size: 20px;
    margin-bottom: 20px;
    font-weight: bold;
}

.footer .section-content {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 30px;
}

.footer .section-content .section-column {
    flex: 1;
    margin-right: 30px;
}

.footer .section-content .section-column:last-child {
    margin-right: 0;
}

.footer .section-content ul {
    list-style: none;
    padding: 0;
}

.footer .section-content ul li {
    margin-bottom: 10px;
}

.footer .credit-info {
    font-size: 12px;
    margin-top: 20px;
    opacity: 0.7;
}

/* Footer Styles */
.section-body {
  font-size: 16px; /* Adjust the font size to your preference */
  line-height: 24px; /* Increase line height for better readability */
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 64px;
  margin-left: 0px;
}

.content-box {
  padding: 0 20px; /* Add some padding to the sides for better spacing */
  text-align: justify; /* Align the text to justify */
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 80px; /* Increase the margin at the bottom */
  margin-left: 0px;
}


/* Rest of your existing CSS styles for the footer */
.section-header {
        text-align: center;
        margin-bottom: 40px;
        padding-left: 100px;
    }

    .section-header h2 {
        font-size: 30px;
        margin: 0;
    }






</style>
<body>
    <!-- <header class="bg-primary text-white text-center py-5">
        <h1>Meet Our Team</h1>
    </header> -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid ">
    <a class="navbar-brand" href="index.php">Meet Our Team</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="livebloodcamp.php">Live Blood Camps</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="donor.php">Donor Registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="guidelines.php">Guidelines</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="responsive-container-block outer-container">
        <div class="responsive-container-block inner-container">
          <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-4 wk-ipadp-5 content-container">
            <div class="content-box">
              <p class="text-blk section-head">
              Blood Bond
              </p>
              <div class="container-fluid">
        <div class="section-header">
            <h2>Meet Our Team</h2>
        </div>
              </div>
              <p class="text-blk section-body">
                At BloodBond, we believe that every drop of blood counts. Our mission is to connect blood donors with those in need, and to make the process of donating blood as easy and efficient as possible. We are dedicated to saving lives and improving health outcomes for patients across the world.Our platform connects donors with hospitals and blood banks, allowing them to easily register as donors, find local blood drives, and manage their donations. We also offer a variety of tools and resources to help donors make informed decisions about their donations, including blood type compatibility charts, medical history questionnaires, and educational materials. With our user-friendly interface and advanced technology, we are streamlining the blood donation process and helping to save lives every day. Join us in our mission to make a difference in the world.
              </p>
            </div>
          </div>
          <div class="responsive-cell-block wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-8 team-cards-outer-container">
            <div class="responsive-container-block team-cards-inner-container">
              <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-8 wk-desk-6 card-container">
                <div class="card">
                  <div class="img-box">
                    <img class="person-img" src="">
                  </div>
                  <div class="card-content-box">
                    <p class="text-blk person-name">
                      Chirag Sharma
                    </p>
                    <p class="text-blk person-info">
                        Team Member
                    </p>
                    <div class="social-icons">
                        <a href="https://www.twitter.com" target="_blank">
                          <img class="twitter-icon" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/Icon.svg">
                        </a>
                        <a href="https://www.facebook.com" target="_blank">
                          <img class="facebook-icon" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/Icon-1.svg">
                        </a>
                        <a href="http://www.instagram.com/" target="_blank">
                            <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
                        </a>
                        <a href="http://www.gmail.com/" target="_blank">
                            <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
                        </a>
                      </div>
                  </div>
                </div>
              </div>
              <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-8 wk-desk-6 card-container">
                <div class="card">
                  <div class="img-box">
                    <img class="person-img" src="">
                  </div>
                  <div class="card-content-box">
                    <p class="text-blk person-name">
                      Kevin Tank
                    </p>
                    <p class="text-blk person-info">
                        Team Member
                    </p>
                    <div class="social-icons">
                        <a href="https://www.twitter.com" target="_blank">
                          <img class="twitter-icon" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/Icon.svg">
                        </a>
                        <a href="https://www.facebook.com" target="_blank">
                          <img class="facebook-icon" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/Icon-1.svg">
                        </a>
                        <a href="http://www.instagram.com/" target="_blank">
                            <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
                        </a>
                        <a href="http://www.gmail.com/" target="_blank">
                            <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
                        </a>
                      </div>
                  </div>
                </div>
              </div>
              <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-8 wk-desk-6 card-container">
                <div class="card">
                  <div class="img-box">
                    <img class="person-img" src="">
                  </div>
                  <div class="card-content-box">
                    <p class="text-blk person-name">
                      Vedantika Singh
                    </p>
                    <p class="text-blk person-info">
                      Team Member
                    </p>
                    <div class="social-icons">
                        <a href="https://www.twitter.com" target="_blank">
                          <img class="twitter-icon" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/Icon.svg">
                        </a>
                        <a href="https://www.facebook.com" target="_blank">
                          <img class="facebook-icon" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/Icon-1.svg">
                        </a>
                        <a href="http://www.instagram.com/" target="_blank">
                            <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
                        </a>
                        <a href="http://www.gmail.com/" target="_blank">
                            <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
                        </a>
                      </div>
                  </div>
                </div>
              </div>
              <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-8 wk-desk-6 card-container">
                <div class="card">
                  <div class="img-box">
                    <img class="person-img" src="">
                  </div>
                  <div class="card-content-box">
                    <p class="text-blk person-name">
                      Vidhi Shah
                    </p>
                    <p class="text-blk person-info">
                        Team Member
                    </p>
                    <div class="social-icons">
                        <a href="https://www.twitter.com" target="_blank">
                          <img class="twitter-icon" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/Icon.svg">
                        </a>
                        <a href="https://www.facebook.com" target="_blank">
                          <img class="facebook-icon" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/Icon-1.svg">
                        </a>
                        <a href="http://www.instagram.com/" target="_blank">
                            <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
                        </a>
                        <a href="http://www.gmail.com/" target="_blank">
                            <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
                        </a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <!-- Footer Start -->
       <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp footer">
    <!-- ... footer content ... -->

   
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="indexphp" class="navbar-brand">
                            <h1 class="m-0 text-white"></i>Newsletters</h1>
                        </a>
                        <p class="mt-3 mb-4">Stay up-to-date with the latest news, events, and tips on blood donation. Enter your email address below to sign up for our newsletter.</p>
                        <form action="index.php" method = "post">
                            <div class="input-group">
                                <input type="email" class="form-control border-white p-3" placeholder="Your Email" name = "mail">
                                <button class="btn btn-dark" name = "signup">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Get In Touch</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">bloodbond37@gmail.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">022 - 12345678</p>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="contact.php"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>

                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Quick Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="#about-us"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="#services"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="#blog"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                                <a class="text-light mb-2" href="admin/aindex.php"><i class="bi bi-arrow-right text-primary me-2"></i>Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    </div>
    <!-- Footer End -->
</body>
</html>