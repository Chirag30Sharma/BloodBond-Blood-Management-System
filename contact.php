<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom CSS styles */
    body {
      margin: 20px;
    }
    
    .map-container {
      height: 400px;
      margin-bottom: 20px;
      border-radius: 5px;
      overflow: hidden;
    }
    
    .contact-form {
      background-color: #f8f9fa;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .contact-form h3 {
      margin-top: 0;
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }
    
    .contact-form .form-group label {
      font-weight: bold;
    }
    
    .contact-form textarea {
      resize: none;
    }
    
    .company-details {
      background-color: #f8f9fa;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .company-details h5 {
      margin-top: 0;
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }
    
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    
    .btn-primary:hover {
      background-color: #0069d9;
      border-color: #0062cc;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="mt-4">Contact Us</h1>
    
    <div class="row">
      <div class="col-md-6">
        <!-- Contact Form -->
        <div class="contact-form">
          <h3>Send us a message</h3>
          <form action="contact.php" method="POST">
            <div class="form-group">
              <label for="name">Your Name:</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="email">Your Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="message">Message:</label>
              <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name = "but">Submit</button>
          </form>
        </div>
      </div>
      
      <div class="col-md-6">
        <!-- Map and Company Details -->
        <div class="row">
          <div class="col-md-12">
            <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15083.171062356223!2d72.8999262!3d19.072847!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c627a20bcaa9%3A0xb2fd3bcfeac0052a!2sK.%20J.%20Somaiya%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1689523122939!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            
            </div>
          </div>
          
          <div class="col-md-12">
            <div class="company-details">
              <h5>Blood Bond</h5>
              <p>KJSCE, Vidyvihar, Mumbai</p>
              <p>Phone: +1 123-456-7890</p>
              <p>Email: bloodbond37@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (jQuery is required) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    include("mail.php");
    
    if(isset($_POST["but"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $msg = $_POST["message"];
        $subject = "Someone wants help";
        $body = "Name: $name<br>Email: $email<br> Sent this problem:<br> $msg ";
        contact($subject, $body);
        echo "Your complaint has been successfully captured";
    }
    
?>