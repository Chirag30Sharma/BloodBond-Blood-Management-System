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

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $a_pos = $row['a_pos'];
        $a_neg = $row['a_neg'];
        $b_pos = $row['b_pos'];
        $b_neg = $row['b_neg'];
        $o_pos = $row['o_pos'];
        $o_neg = $row['o_neg'];
        $ab_pos = $row['ab_pos'];
        $ab_neg = $row['ab_neg'];
    }



} else {
    echo "0 results";
} 
if(isset($_POST["save"])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $upd_A_pos = $_POST['upd_A_pos'];
        $upd_A_neg = $_POST['upd_A_neg'];
        $upd_B_pos = $_POST['upd_B_pos'];
        $upd_B_neg = $_POST['upd_B_neg'];
        $upd_O_pos = $_POST['upd_O_pos'];
        $upd_O_neg = $_POST['upd_O_neg'];
        $upd_AB_pos = $_POST['upd_AB_pos'];
        $upd_AB_neg = $_POST['upd_AB_neg'];
        $stmt = $conn->prepare("UPDATE Blood_Stock SET a_pos=?, a_neg=?, b_pos=?, b_neg=?, o_pos=?, o_neg=?, ab_pos=?, ab_neg=? WHERE org_email= ?");
        $stmt->bind_param("iiiiiiiis", $upd_A_pos,$upd_A_neg,$upd_B_pos,$upd_B_neg,$upd_O_pos,$upd_O_neg ,$upd_AB_pos, $upd_AB_neg,$email);
        $result = $stmt->execute();
        // if($result) {
        //     echo "Blood group updated successfully!";
        // } else {
        //     echo "Error updating blood group.";
        // }
    }
}

     
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Blood Stock Management</title>
    <!-- Add your CSS stylesheets here -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        table {
            width: 100%;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
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
</head>

<body>
<div class="container">
    <h1>Blood Stock Management</h1>

    <form method="post" action="">
        <table>
            <tr>
                <th>Blood Group</th>
                <th>Unit Count</th>
            </tr>
            <tr>
                <td>A+</td>
                <td><input type="number" name="upd_A_pos" value="<?php echo $a_pos;?>"></td>
            </tr>
            <tr>
                <td>A-</td>
                <td><input type="number" name="upd_A_neg" value="<?php echo $a_neg;?>"></td>
            </tr>
            <tr>
                <td>B+</td>
                <td><input type="number" name="upd_B_pos" value="<?php echo $b_pos;?>"></td>
            </tr>
            <tr>
                <td>B-</td>
                <td><input type="number" name="upd_B_neg" value="<?php echo $b_neg;?>"></td>
            </tr>
            <tr>
                <td>O+</td>
                <td><input type="number" name="upd_O_pos" value="<?php echo $o_pos;?>"></td>
            </tr>
            <tr>
                <td>O-</td>
                <td><input type="number" name="upd_O_neg" value="<?php echo $o_neg;?>"></td>
            </tr>
            <tr>
                <td>AB+</td>
                <td><input type="number" name="upd_AB_pos" value="<?php echo $ab_pos;?>"></td>
            </tr>
            <tr>
                <td>AB-</td>
                <td><input type="number" name="upd_AB_neg" value="<?php echo $ab_neg;?>"></td>
            </tr>
        </table>
        <button type="submit" name="save">Save</button>
    </form>
</div>

    <script>
        
        const bloodGroups = [
            { name: 'A+', count: <?php echo $a_pos; ?> },
            { name: 'A-', count: <?php echo $a_neg; ?> },
            { name: 'B+', count: <?php echo $b_pos; ?> },
            { name: 'B-', count: <?php echo $b_neg; ?> },
            { name: 'O+', count: <?php echo $o_pos; ?> },
            { name: 'O-', count: <?php echo $o_neg; ?> },
            { name: 'AB+', count: <?php echo $ab_pos; ?> },
            { name: 'AB-', count: <?php echo $ab_neg; ?> },
        ];

        const tableRows = document.querySelectorAll('tr');

        bloodGroups.forEach((bloodGroup, index) => {
            const countCell = tableRows[index + 1].querySelector('input[type="number"]');
            if (bloodGroup.count <= 10) {
                countCell.style.backgroundColor = 'red';
                countCell.style.color = 'white';
            }
        });
    </script>

</body>

</html>