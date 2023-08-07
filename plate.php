<?php
session_start();
include("db.php");
include("mail.php");

if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}

// Sample questions for the platelet quiz
$questions = array(
    array(
        'question' => 'Is this your first time donating platelets?',
        'options' => array(
            'A. Yes, it is my first time',
            'B. No, I have donated before'
        ),
        'answer' => 'A. Yes, it is my first time'
    ),
    array(
        'question' => 'If not, when did you last donate?',
        'options' => array(
            'A. Less than 1 month ago',
            'B. 1 to 3 months ago',
            'C. 3 to 6 months ago',
            'D. More than 6 months ago'
        ),
        'answer' => 'D. More than 6 months ago'
    ),
    array(
        'question' => 'How much did you donate in this year?',
        'options' => array(
            'A. Less than 1 time',
            'B. 1 to 3 times',
            'C. 3 to 5 times',
            'D. More than 5 times'
        ),
        'answer' => 'A. Less than 1 time'
    ),
);

// Function to check the quiz answers
function checkAnswers($userAnswers, $questions) {
    $score = 0;
    foreach ($userAnswers as $index => $answer) {
        if ($answer === $questions[$index]['answer']) {
            $score++;
        }
    }
    return $score;
}

if (isset($_POST['submit'])) {
    $userAnswers = $_POST['answer'];
    $score = checkAnswers($userAnswers, $questions);

    // Evaluation criteria for platelet donation
    $canDonatePlatelet = false;

    // Question 1: Is this your first time donating platelets?
    if ($userAnswers[0] === 'A. Yes, it is my first time') {
        $canDonatePlatelet = true;
    }

    // Question 2: If not, when did you last donate?
    if ($userAnswers[1] === 'D. More than 6 months ago') {
        $canDonatePlatelet = true;
    }
    if ($userAnswers[1] === 'C. 3 to 6 months ago') {
        $canDonatePlatelet = true;
    }
    if ($userAnswers[1] === 'B. 1 to 3 months ago') {
        $canDonatePlatelet = false;
    }
    if ($userAnswers[1] === 'A. Less than 1 month ago') {
        $canDonatePlatelet = false;
    }


    // Question 3: How much did you donate in this year?
    if ($userAnswers[2] === 'D. More than 5 times') {
        $canDonatePlatelet = false;
    }
    if ($userAnswers[2] === 'C. 3 to 5 times') {
        $canDonatePlatelet = true;
    }
    if ($userAnswers[2] === 'B. 1 to 3 times') {
        $canDonatePlatelet = true;
    }
    if ($userAnswers[2] === 'A. Less than 1 time') {
        $canDonatePlatelet = true;
    }

    if ($canDonatePlatelet) {
        // Perform the database entry here for users who can donate platelets.
        // Modify this part based on your database structure and requirements.
        $email = $_SESSION["email"];
        $answer1 = $userAnswers[0];
        $answer2 = $userAnswers[1];
        $answer3 = $userAnswers[2];
    
        $sql = "INSERT INTO platelet_donors (email, answer1, answer2, answer3) VALUES ('$email', '$answer1', '$answer2', '$answer3')";
        if (mysqli_query($conn, $sql)) {
            // If the database entry is successful, show the success message and redirect using JavaScript.
            echo '<script>alert("Congratulations! You can donate platelets. Thank you for your willingness to donate!"); window.location.href = "index.php";</script>';
            $subject = "Platelet Donation Booking Details";
            $body = "<p>Hello $email,</p>
                    <p>Thank you for booking a platelet donation camp with us.</p>
                    <p>Come on time and please bring any government official ID.</p>
                    <p>Best regards,<br>The Blood Donation Team</p>";

            plate($subject, $body, $email);
            exit;
        } else {
            $message = "Error occurred during database entry. Please try again.";
        }
    } else {
        echo '<div class="popup-box">
        <p>Sorry Sorry Sorry!! You can not donate blood right now.</p>
        <button onclick="closePopup()">OK</button>
        </div>'; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platelet Quiz</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h2 class="mb-0">Platelet Test</h2>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <?php foreach ($questions as $index => $question): ?>
                                <p><strong><?php echo $question['question']; ?></strong></p>
                                <?php foreach ($question['options'] as $option): ?>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="answer[<?php echo $index; ?>]" value="<?php echo $option; ?>" required>
                                        <label class="form-check-label" for="answer<?php echo $index; ?>"><?php echo $option; ?></label>
                                    </div>
                                <?php endforeach; ?>
                                <hr>
                            <?php endforeach; ?>
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        </form>
                        <?php if (isset($message)): ?>
                            <p class="mt-3"><?php echo $message; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
