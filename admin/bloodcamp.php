<?php
include("inc/db.php");
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

$email = $_SESSION["email"];
$sql = "SELECT org_name FROM admin_registration WHERE org_email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $org_name = $row['org_name'];
}

?>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<style>
body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #4070f4;
}

.container {
  max-width: 500px;
  width: 100%;
  padding: 30px;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.container header {
  font-size: 20px;
  font-weight: 600;
  color: #333;
  margin-bottom: 20px;
  text-align: center;
}

.container form .input-field {
  margin-bottom: 20px;
}

.container form label {
  font-size: 14px;
  font-weight: 500;
  color: #2e2e2e;
  display: block;
  margin-bottom: 6px;
}

.container form input[type="text"],
.container form input[type="date"] {
  width: 100%;
  outline: none;
  font-size: 14px;
  font-weight: 400;
  color: #333;
  border-radius: 5px;
  border: 1px solid #aaa;
  padding: 10px;
  height: 42px;
}

.container form button {
  display: block;
  width: 100%;
  height: 45px;
  border: none;
  outline: none;
  color: #fff;
  border-radius: 5px;
  margin-top: 20px;
  background-color: #4070f4;
  transition: all 0.3s linear;
  cursor: pointer;
}

.container form button:hover {
  background-color: #265df2;
}

.container form .buttons {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}

.container form .buttons button {
  width: 48%;
}

.container form .buttons button i {
  margin-right: 6px;
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
<body>
  <div class="container">
    <header>Bloodcamp</header>

    <form action="bloodcamp.php" method="POST">
      <div class="input-field">
        <label>Organisation Name</label>
        <input type="text" name="org_name" value="<?php echo $org_name;?>" readonly>
      </div>

      <div class="input-field">
        <label>Date of event</label>
        <input type="date" name="date" required>
      </div>

      <div class="input-field">
        <label>Address</label>
        <input type="text" name="address" placeholder="Enter Address" required>
      </div>

      <div class="input-field">
        <label>Locality</label>
        <input type="text" name="location" placeholder="Enter Location" required>
      </div>

      <div class="input-field">
        <label>Google Maps Frame:</label>
        <input type="text" name="frame" placeholder="Enter Frame Tag" required>
      </div>

      <div class="input-field">
        <label>Contact info</label>
        <input type="text" name="contact_info" placeholder="Enter contact number" required>
      </div>

      <div class="input-field">
        <label>Message</label>
        <input type="text" name="content" placeholder="Enter 1 line message" required>
      </div>

      <div class="buttons">
        <button type="submit" name="create">
          <i class="uil uil-navigator"></i>
          <span class="btnText">Create Event</span>
        </button>

        <button type="button" class="backBtn" onclick="window.history.back();">
          <i class="uil uil-navigator"></i>
          <span class="btnText">Back</span>
        </button>
      </div>
    </form>
  </div>

  <?php
  if (isset($_POST["create"])) {
          $date = $_POST['date'];
          $address = $_POST['address'];
          $location = $_POST['location'];
          $frame = $_POST['frame'];
          $contact_info = $_POST['contact_info'];
          $content = $_POST['content'];

          $stmt = $conn->prepare("INSERT INTO bloodcamp(org_email,org_name,date, address, location, iframe, contact_info, content) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssssss", $email, $org_name, $date, $address, $location, $frame, $contact_info, $content);
          $stmt->execute();
  }
  
  ?>

</body>
</html>