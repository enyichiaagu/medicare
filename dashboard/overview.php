<?php 

require_once('../index.php');

$currentTime = date('H');

function getGreeting($time) {
    $morningStart = 6;
    $afternoonStart = 12;
    $eveningStart = 18;

    if ($time >= $morningStart && $time < $afternoonStart) {
        return 'Morning';
    } elseif ($time >= $afternoonStart && $time < $eveningStart) {
        return 'Afternoon';
    } else {
        return 'Evening';
    }
}

function getFirstName($fullName) { return explode(' ', $fullName)[0]; }

$fetch_appointments = "SELECT COUNT(*) AS row_count FROM appointments";
$appointments_num = $mysqli->query($fetch_appointments);
$appointment_count = $appointments_num->fetch_assoc();

$fetch_doctors = "SELECT COUNT(*) AS row_count FROM staff WHERE position='Doctor'";
$doctors_num = $mysqli->query($fetch_doctors);
$doctor_count = $doctors_num->fetch_assoc();

?>

<?= generatePageHead('Overview', 'overview.css') ?>
<h2 class="overview-greeting">
    Good <?= getGreeting($currentTime) ?>
    <span class="material-symbols-outlined">waving_hand</span>
</h2>

<!-- creating brief description of medicare -->
<div class="description">
    <p id="describe">Medicare is a Hopital Management System that performs the following functions: </p>
    <ul class="lists">
        <li>Register and add patients</li>
        <li>Take patient's vital signs</li>
        <li>Book appointments for patients </li>
    <ul>
    <ul class="lists">
        <li>Manage drug dispencing</li>
        <li>Share doctor's report</li>
        <li>Supervise payments and lots more...</li>
    </ul>
<div>

<?= generatePageFoot() ?>