<?php 

require_once('../index.php');

$currentTime = (int)date('H');

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

<div class="overview-body">
    <a class="overview-item a" href="appointments/create-appointment.php">
        <span class="material-symbols-outlined round-icons">note_alt</span>
        <span class="overview-text">Book Appointment</span>
    </a>
    <a class="overview-item b" href="appointments/list-appointments.php">
        <span class="material-symbols-outlined round-icons">view_list</span>
        <span class="overview-text"><?= $appointment_count['row_count'] ?> Appointments</span>
    </a>
    <a class="overview-item c" href="doctors/list-doctors.php">
        <span class="material-symbols-outlined large-icons blue-icon">clinical_notes</span>
        <span class="overview-text"><?= $doctor_count['row_count'] ?> Active Doctors</span>
    </a>
    <a class="overview-item d" href="patients/add-patient.php">
        <span class="material-symbols-outlined large-icons white-icon">person_add</span>
        <span class="overview-text">Add New Patient</span>
    </a>
</div>

<?= generatePageFoot() ?>