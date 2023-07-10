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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addition</title>
    <style>
        body {
            padding-top: 5%;
            font-family: sans-serif;
            background: #4070f4;
            color: black;
        }


        h1 {
            text-align: center;
        }


        form {
            width: 35rem;
            margin: auto;
            color: black;
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            background-color: white;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.125);
            padding: 20px 25px;
            
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            margin: 10px 0;
            border-radius: 5px;
            padding: 15px 18px;
            box-sizing: border-box;
        }

        button {
            background-color: white;
            color: black;
            padding: 14px 20px;
            border-radius: 5px;
            margin: 7px 0;
            width: 100%;
            font-size: 18px;
        }

        button:hover {
            opacity: 0.6;
            cursor: pointer;
        }

        .headingsContainer {
            text-align: center;
        }

        .headingsContainer p {
            color: black;
        }

        .mainContainer {
            padding: 16px;
        }


        .subcontainer {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .subcontainer a {
            font-size: 16px;
            margin-bottom: 12px;
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


        .register {
            color: black;
            text-align: center;
        }

        .register a {
            color: black;
        }

        .register a:link {
            text-decoration: none;
        }

        /* Media queries for the responsiveness of the page */
        @media screen and (max-width: 600px) {
            form {
            width: 25rem;
            }
        }

        @media screen and (max-width: 400px) {
            form {
            width: 20rem;
            }
        }
    </style>


        

</head>

<body>
  
        <div class="mainContainer">
            <div class="headingsContainer">
            <h2>Add Necessary Details</h2>
            </div>
            <div class="form-popup" id="add-form">
                <form method="post" action="add.php?email=<?php echo $email;?>" >
                    <label for="reqbg"><b>Blood Group</b></label>
                    <select id="reqbg" name="reqbg">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    </select>
                    <br><br>
                    <label for="hospital_name"><b>Hospital Name</b></label>
                    <?php echo $hospital_name;?><br><br>
                    <label for="Address"><b>Hospital Address</b></label>
                    <?php echo $hospital_address?><br><br>
                    <label for="hospital-contact"><b>Hospital Contact Number</b></label>
                    <?php echo $hospital_num?><br><br>
                    <button type="sub" class="btn" name="upd" onclick="showPopup()">Update</button>
                </form>
            </div>
        </div>

        <!-- Popup message -->
        <div id="popup" class="popup">
            <div class="popup-message">
                Blood group updated successfully!
            </div>
        </div>

        <script>
            function showPopup() {
                // Show the popup message
                document.getElementById("popup").style.display = "flex";

                // Hide the popup message after 3 seconds
                setTimeout(function() {
                    document.getElementById("popup").style.display = "none";
                }, 3000);
            }
        </script>
</body>
</html>

<?php
if(isset($_POST["upd"])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $reqbg = $_POST["reqbg"];
        $stmt = $conn->prepare("UPDATE mp_admin SET Reqbg = ? WHERE Email = ?");
        $stmt->bind_param("ss", $reqbg, $email);
        $result = $stmt->execute();
        // if($result) {
        //     echo "Blood group updated successfully!";
        // } else {
        //     echo "Error updating blood group.";
        // }
    }
}
?>
