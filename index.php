<?php 
	session_start();

	if (isset($_POST['logout'])) {
		session_unset();
		session_destroy();
		header('Location: login.php');
		exit;
	} else if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
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
			<input type="submit" name="logout" value="Logout">
		</form>
	</body>
</html>
