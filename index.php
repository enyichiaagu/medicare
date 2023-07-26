<?php
	// Redirect to overview if user navigates to '/'
	$prefix = '/medicare/';
	if ($_SERVER['REQUEST_URI'] === $prefix . 'index.php' || $_SERVER['REQUEST_URI'] === $prefix) {
		header('Location: ./overview.php');
		exit;
	}

	// Function to check the relative path type to use
	function relativePath() {
		return count(explode('/', $_SERVER['PHP_SELF'])) === 3 ? '.' : '..';
	}

	function generatePageHead($pageTitle) {
		// Grabbing session variables, initializing $_SESSION
		session_start();

		// Check if user posted a logout request
		if (isset($_POST['logout'])) {

			// Unset and destroy the session 
			session_unset();
			session_destroy();

			// Redirect to login page
			header('Location: ./login.php');
			exit;

		// Make sure user cannot load the page unless logged in
		} else if (!$_SESSION['isLoggedIn']) {
			header('Location: ./login.php');
			exit;
		}

		$path = relativePath();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?= $path ?>/css/utils.css">
		<link rel="stylesheet" href="<?= $path ?>/css/header.css">
		<link rel="stylesheet" href="<?= $path ?>/css/sidebar.css">
		<link rel="stylesheet" href="<?= $path ?>/patients/add-patient.css">
		<title>Medicare - <?= $pageTitle ?> </title>
	</head>
	<body>

		<!-- Import Header -->
		<?php require_once($path.'/components/header.php'); ?>

		<!-- Define Layout of body -->
		<div class="body-layout">

			<!-- Add Sidebar -->
			<?php require_once($path.'/components/sidebar.php') ?>

			<!-- Add Requested Page -->
			<main class="main-content">
<?php } ?>


<?php function generatePageFoot() { ?>
	<?php $path = relativePath(); ?>

			</main>
		</div>
	
		<!-- JavaScript Imports -->
		<script src="<?= $path ?>/js/header.js"></script>
		<script src="<?= $path ?>/js/sidebar.js"></script>
	</body>
</html> 
<?php } ?>