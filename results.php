<?php
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	?>
	<?php if (!isset($_SESSION['score'])) {
		header("location: question.php?n=1");
	}
	?>
	<html>

	<head>
		<title>PHP-kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/results.css">
	</head>

	<body>
	<header>
        <div class="container">
            <h1 class="quiz-title">PHP-Kuiz</h1>
        </div>
    </header>

    <main>
        <div class="result-container">
            <h2 class="congrats-text">Congratulations!</h2>
            <p class="message">You have successfully completed the test.</p>
            <p class="score">Total Points: <span><?php if (isset($_SESSION['score'])) { echo $_SESSION['score']; } ?></span></p>
            <div class="button-container">
                <a href="question.php?n=1" class="button restart">Start Again</a>
                <a href="home.php" class="button home">Go home</a>
            </div>
        </div>
    </main>
	</body>

	</html>

	<?php
	$score = $_SESSION['score'];
	$email = $_SESSION['email'];
	$query = "UPDATE users SET score = '$score' WHERE email = '$email'";
	$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
	?>


	<?php unset($_SESSION['score']); ?>
	<?php unset($_SESSION['time_up']); ?>
	<?php unset($_SESSION['start_time']); ?>
<?php } else {
	header("location: home.php");
}
?>
