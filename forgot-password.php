<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./css/utils.css" />
		<link rel="stylesheet" href="./css/login.css" />
		<title>Medicare - Forgot Password</title>
	</head>
	<body>
		<header>
			<h1 class="logo-text">
				<span id="med">Med</span><span id="icare">icare</span>
			</h1>
		</header>
		<main>
			<h2 class="greeting">Forgot Password?</h2>
			<p class="greeting-sub">No worries, we'll send you reset instructions</p>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="field">
					<span class="material-symbols-outlined start-icon"
						>mail</span
					>
					<input
						required
						type="email"
						name="staff-email"
						autocomplete="email"
						id="email"
						placeholder="Enter your Email"
					/>
				</div>
                <br>
				<button id="submit" type="submit">Reset password</button>
			</form>
            <p class="back-option">
                <a href="login.php">
                    <span class="material-symbols-outlined back-icon">
                        keyboard_backspace
                    </span> 
                    Back to Login
                </a>
            </p>
		</main>
	</body>
</html>