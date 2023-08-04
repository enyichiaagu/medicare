<?php

	// Grab session variables using this function
	session_start();

	// Import database credentials
	require_once('helpers/db-credentials.php');

	function redirectUser() {
		header('Location: dashboard/overview.php');
		exit;
	}

	// Check if the page loaded because of a post request
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		// Connect to the database
		$mysqli = new mysqli($hostname, $db_username, $db_password, $database);

		// Grab the user's email and password
		$email = $_POST['staff-email'];
		$password = $_POST['password'];

		// Verify for correct username and password
		$query = "SELECT * FROM staff WHERE email_address='$email'";
		$result = $mysqli->query($query);
		
		// Check if any row came back
		if ($result->num_rows === 1) {
			$user = $result->fetch_assoc();

			// Check password for match
			if (password_verify($password, $user['staff_password'])) {

				// Set Session variables for correct user
				$_SESSION['isLoggedIn'] = true;
				$_SESSION['user'] = $user;

				// Redirect the user
				redirectUser();
			}
		}

		$errorMessage = "Username or Password is Incorrect, Please Try Again";

	// Else make sure user cannot arrive at this page anymore
	} else if (isset($_SESSION['isLoggedIn'])) {
		redirectUser();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./css/utils.css" />
		<link rel="stylesheet" href="./css/login.css" />
		<title>Medicare - Login</title>
	</head>
	<body>
		<header>
			<h1 class="logo-text">
				<span id="med">Med</span><span id="icare">icare</span>
			</h1>
		</header>
		<main>
			<h2 class="greeting">Welcome Back!</h2>
			<p class="greeting-sub">Sign in, Let's get started</p>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="field">
					<span class="material-symbols-outlined start-icon"
						>account_circle</span
					>
					<input
						required
						type="email"
						name="staff-email"
						autocomplete="email"
						id="email"
						placeholder="Staff Email"
					/>
				</div>
				<div class="field">
					<span class="material-symbols-outlined start-icon"
						>key</span
					>
					<input
						required
						type="password"
						name="password"
						autocomplete="off"
						id="password-input"
						placeholder="Password"
						minlength="5"
					/>
					<span class="material-symbols-outlined" id="visibility">visibility</span>
				</div>
				<div class="forgot-password">
					<a href="forgot-password.php">Forgot Password?</a>
				</div>
				<?php if (isset($errorMessage)) { ?>
					<div class="error-message notification"><span class="material-symbols-outlined">error</span><?= $errorMessage ?></div>
				<?php } ?>
				<button id="submit" type="submit">Sign in</button>
			</form>
		</main>
		<!-- Importing JavaScript file -->
		<script src="js/login.js"></script>
	</body>
</html>
