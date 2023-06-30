<?php 
	// Grabbing session variables, initializing $_SESSION
	session_start();

	// Check if user posted a logout request
	if (isset($_POST['logout'])) {

		// Unset and destroy the session 
		session_unset();
		session_destroy();

		// Redirect to login page
		header('Location: login.php');
		exit;

	// Make sure user cannot load the page unless logged in
	} else if (!$_SESSION['isLoggedIn']) {
		header('Location: ./login.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Congratulations</title>
	</head>
	<body>
		<h1>Congratulations! Website under construction!!</h1>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="submit" name="logout" value="logout">
		</form>
	</body>
</html>
