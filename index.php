<?php

	// Redirect to overview if user navigates to '/'
	$prefix = '/medicare/';
	if ($_SERVER['REQUEST_URI'] === $prefix . 'index.php' || $_SERVER['REQUEST_URI'] === $prefix) {
		header('Location: login.php');
		exit;
	}

	// Grabbing session variables, initializing $_SESSION
	session_start();

	// Fetch Project Essentials ($hospital_units, $mysqli)
	require_once('db-credentials.php');

	// Function to check the relative path type to use
	function relativePath() {
		return count(explode('/', $_SERVER['PHP_SELF'])) === 4 ? '.' : '..';
	}

	function getCurrentFolder() {
		return str_replace(".php", "", explode('/', $_SERVER['PHP_SELF'])[3]);
	}

	function allUsersNotPermitted() {
		$notOverview = getCurrentFolder() !== 'overview';
		$notManager = $_SESSION['user']['unit'] !== 'management';
		return $notOverview && $notManager;
	}

	function hasPermission() {
		global $page_structure;
		$menuIndex = array_search(getCurrentFolder(), array_column($page_structure, 'url'));
		return (
			$menuIndex !== false && 
			stripos(
				$page_structure[$menuIndex]['permission'], 
				$_SESSION['user']['unit']
			) !== false
		);
	}

	function generatePageHead($pageTitle, $styleFormat='') {

		// Initialize path of urls
		$path = relativePath();

		// Check if user posted a logout request
		if (isset($_POST['logout']) || !$_SESSION['isLoggedIn']) {

			// Unset and destroy the session 
			session_unset();
			session_destroy();

			// Redirect to login page
			header("Location: $path/../login.php");
			exit;

		// Send user to Overview if they wander too far
		} elseif (allUsersNotPermitted() && !hasPermission()) {
			// Redirect to Overview page
			header("Location: $path/overview.php");
			exit;
		}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?= $path ?>/../css/utils.css">
		<link rel="stylesheet" href="<?= $path ?>/styles/header.css">
		<link rel="stylesheet" href="<?= $path ?>/styles/sidebar.css">
		<?= $styleFormat === '' ? '' : "<link rel='stylesheet' href='$path/styles/$styleFormat'>" ?>
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
				<div class="content-box">
<?php } ?>
<?php function generatePageFoot($scriptPath1='', $scriptPath2='') { ?>
	<?php $path = relativePath(); ?>
				</div>
			</main>
		</div>
	
		<!-- JavaScript Imports -->
		<script src="<?= $path ?>/scripts/header.js"></script>
		<script src="<?= $path ?>/scripts/sidebar.js"></script>
		<?= $scriptPath1 === '' ? '' : "<script src='$path/scripts/$scriptPath1'></script>" ?>
		<?= $scriptPath2 === '' ? '' : "<script src='$path/scripts/$scriptPath2'></script>" ?>
	</body>
</html> 
<?php } ?>