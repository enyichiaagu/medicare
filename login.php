<?php
	// Grab session variables using this function
	session_start();

	// Check if the page loaded because of a post request
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		// Grab the user's email and password
		$email = $_POST['staff-email'];
		$password = $_POST['password'];

		// Verify if they match the correct values and set session variable isLoggedIn based on the input
		$_SESSION['isLoggedIn'] = $email === 'enyichiaagu@gmail.com' && $password === 'admin';

		// Check if isLoggedIn is true
		if ($_SESSION['isLoggedIn']) {

			// Redirect the user to home page and exit
			header('Location: ./overview.php');
			exit;
		}
	
	// Else make sure user cannot arrive at this page anymore
	} else if (isset($_SESSION['isLoggedIn'])) {
		header('Location: ./overview.php');
		exit;
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
					/>
					<span class="material-symbols-outlined" id="visibility">visibility</span>
				</div>
				<div class="forgot-password">
					<a href="forgot-password.php">Forgot Password?</a>
				</div>
				<button id="submit" type="submit">Sign in</button>
			</form>
		</main>

		<!-- Importing JavaScript file -->
		<script src="js/login.js"></script>
	</body>
</html>
