<?php
if (isset($_SESSION['loggedin'])) {
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
            <h1 class="m-0">BLOODBOND</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="livebloodcamp.php" class="nav-item nav-link">Live Blood Camps</a>
                <a href="donor.php" class="nav-item nav-link">Donor Registration</a>
                <a href="guidelines.php" class="nav-item nav-link">Guidelines</a>';
    
    $email = $_SESSION["email"];
    $sql = "SELECT name FROM login WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
    }
    
    echo '<div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle dropdown-hover" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'. $name .'</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="login_dashboard.php">Profile Details</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </div>
        </div>
        </div>
    </nav>';
    
} else {
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
            <h1 class="m-0">BLOODBOND</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="livebloodcamp.php" class="nav-item nav-link">Live Blood Camps</a>
                <a href="donor.php" class="nav-item nav-link">Donor Registration</a>
                <a href="guidelines.php" class="nav-item nav-link">Guidelines</a>
                <a href="login.php" class="nav-item nav-link">Login</a>
            </div>
        </div>
    </nav>';
}
?>
