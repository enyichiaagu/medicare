<?php
	session_start();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$email = $_POST['staff-email'];
		$password = $_POST['password'];
		$_SESSION['loggedIn'] = $email === 'enyichiaagu@gmail.com' && $password === 'admin';
		if ($_SESSION['loggedIn']) {
			header('Location: ./');
			exit;
		}
	} else if (isset($_SESSION['loggedIn'])) {
		header('Location: ./');
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
		<title>Medicare</title>
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
						id="password"
						placeholder="Password"
					/>
					<span class="material-symbols-outlined" id="visibility"
						>visibility</span
					>
				</div>
				<div class="forgot-password">
					<a href="/forgot-password">Forgot Password?</a>
				</div>
				<button id="submit" type="submit">Sign in</button>
			</form>
		</main>
	</body>
</html>
