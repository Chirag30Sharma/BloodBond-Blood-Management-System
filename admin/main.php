<?php
include('inc/db.php');

if(isset($_GET['email'])){
    $email = $_GET['email'];
}

$stmt = $conn->prepare("SELECT Hospital_name, Address, Phonenum FROM mp_admin WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $hospital_name = $row['Hospital_name'];
        $hospital_address = $row['Address'];
        $hospital_num = $row['Phonenum'];
    }
} else {
    echo "0 results";
}  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hospital Dashboard</title>
	<style>
		body {
			background-image: url('hospital.jpeg');
			background-repeat: no-repeat;
			background-size: cover;
			font-family: Arial, sans-serif;
			color: #333;
			margin: 0;
			padding: 0;
		}

		.navbar {
			display: flex;
			justify-content: space-between;
			align-items: center;
			background-color: #0077cc;
			color: #fff;
			padding: 20px;
			}

			.navbar h1 {
			margin: 0;
			font-size: 36px;
			font-weight: bold;
			}

			.navbar p {
			margin: 0;
			font-size: 20px;
			text-align: right;
			}


		.container {
			max-width: 960px;
			margin: 0 auto;
			padding: 20px;
			text-align: center;
		}

		.header {
			margin-bottom: 40px;
		}

		.header h1 {
			font-size: 48px;
			margin: 0;
		}

		.header p {
			font-size: 24px;
			margin: 10px 0;
		}

		.button {
			display: inline-block;
			padding: 20px;
			border-radius: 10px;
			background-color: #0077cc;
			color: #fff;
			font-size: 24px;
			font-weight: bold;
			text-decoration: none;
			margin: 20px;
			box-shadow: 2px 2px 2px #333;
			transition: background-color 0.3s ease-in-out;
		}

		.button:hover {
			background-color: #0051a8;
		}
		.popup-box {
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: white;
			padding: 20px;
			border: 1px solid #ccc;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			z-index: 1000;
}

	</style>
</head>
<body>
	<div class="navbar">
		<h1><?php echo $hospital_name; ?></h1>
		<p><?php echo $hospital_address . ' ' . $hospital_num; ?></p>
	</div>
	<div class="container">
		

		<a href="add.php" class="button">Add</a>
		<a href="available.php" class="button">Available</a>
	</div>
</body>
</html>


