<?php
include('inc/db.php');
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

$email = $_SESSION["email"];
$sql = "SELECT org_name FROM admin_registration WHERE org_email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['org_name'];
}


$stmt = $conn->prepare("SELECT a_pos, a_neg, b_pos, b_neg, o_pos, o_neg, ab_pos, ab_neg FROM Blood_Stock WHERE org_email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

$bloodGroups = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $bloodGroups = array(
            'A+' => $row['a_pos'],
            'A-' => $row['a_neg'],
            'B+' => $row['b_pos'],
            'B-' => $row['b_neg'],
            'O+' => $row['o_pos'],
            'O-' => $row['o_neg'],
            'AB+' => $row['ab_pos'],
            'AB-' => $row['ab_neg'],
        );
    }
} else {
    echo "0 results";
} 

$orgDetails = array();

$stmt = $conn->prepare("SELECT org_add, org_no, website_url FROM admin_registration WHERE org_email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $orgDetails = array(
        'org_add' => $row['org_add'],
        'org_no' => $row['org_no'],
        'website_url' => $row['website_url']
    );
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available</title>
    <style>
        body {
            padding-top: 5%;
            font-family: sans-serif;
            background: #4070f4;
            color: white;
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
                <form method="post" action="avail.php?email=<?php echo $email;?>" >
                    <label for="hospital_name"><b>Hospital Name : </b></label>
                    <?php echo $name;?><br><br>
                    <label for="sufsup"><b>Available Blood Group : </b></label>
                    <select id="sufsup" name="sufsup">
                        <?php foreach ($bloodGroups as $bloodGroup => $count) : ?>
                            <?php if ($count >= 55) : ?>
                                <option value="<?php echo $bloodGroup; ?>"><?php echo $bloodGroup; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select><br><br>
                    <label for="hospital_add"><b>Hospital Address : </b></label>
                    <?php echo isset($orgDetails['org_add']) ? $orgDetails['org_add'] : 'N/A'; ?><br><br>
                    <label for="hospital_no"><b>Contact Info : </b></label>
                    <?php echo isset($orgDetails['org_no']) ? $orgDetails['org_no'] : 'N/A'; ?><br><br>
                    <label for="hospital_url"><b>Website URL : </b></label>
                    <?php echo isset($orgDetails['website_url']) ? $orgDetails['website_url'] : 'N/A'; ?><br><br>
                    <button type="sub" class="btn" name="upd" onclick="showPopup()">Update</button>
                </form>
            </div>
        </div>

        <!-- Popup message -->
        <div id="popup" class="popup">
            <div class="popup-message">
                Blood group availability updated successfully!
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
        $sufsup = $_POST["sufsup"];
        $stmt = $conn->prepare("UPDATE Blood_Stock SET sufsup = ? WHERE org_email = ?");
        $stmt->bind_param("ss", $sufsup, $email);
        $result = $stmt->execute();
    }
}
?>

