<?php 

require_once('../../index.php');

isset($_GET['id']) ? $appointmentId = $_GET['id'] : null;

if (!isset($appointmentId)){

    header('Location: my-appointments.php');
    exit;

}

$appointmentDetails = fetch_database_row($appointmentId, 'appointment_id', 'appointments');
$patientDetails = fetch_database_row($appointmentDetails['patient_id'], 'id', 'patients');
$patientId = $patientDetails['id'];

$fetchQuery = "SELECT * FROM appointments WHERE patient_id='$patientId'";
$queryResult = $mysqli->query($fetchQuery);

if ($queryResult->num_rows > 1) {
    $list = [];
    while ($row = $queryResult->fetch_assoc()) {
        $list[] = $row;
    }
} else {
    $message = ['error', 'No Medical Records yet'];
}

?>

<?= generatePageHead("Patient's Medical history", 'forms.css') ?>

<h2 class="secondary-text">
    Medical History of <?= $patientDetails['full_name'] ?>
</h2>
<?php if (isset($message[0]) && $message[0] === 'error') { ?>
    <div class="error-message notification"><span class="material-symbols-outlined">error</span><?= $message[1] ?></div>
<?php } ?>
<form class="classic-form">
    <div class="button-container">
        <a class="cancel-link" href="my-appointments.php">Back</a>
    </div>
</form>

<?= generatePageFoot() ?>