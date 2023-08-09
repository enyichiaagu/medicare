<?php 

require_once('../../index.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $patientInfo = fetchProfileByEmail($email, 'patients');

    if ($patientInfo) {
        $patientId = $patientInfo['id'];
        $bp = $_POST['blood-pressure'];
        $pulse = $_POST['pulse-rate'];
        $weight = $_POST['weight'];
        $temp = $_POST['temperature'];
        $urine = $_POST['urine'];

        $updateQuery = "INSERT INTO vital_signs (patient_id, blood_pressure, pulse_rate, body_weight, body_temperature, urine_composition)
            VALUES ('$patientId', '$bp', '$pulse', '$weight', '$temp', '$urine')
            ON DUPLICATE KEY UPDATE
            blood_pressure = VALUES(blood_pressure),
            pulse_rate = VALUES(pulse_rate),
            body_weight = VALUES(body_weight),
            body_temperature = VALUES(body_temperature),
            urine_composition = VALUES(urine_composition)";
        
        saveRecord($updateQuery);
        $message = ["success", "Signs successfully Recorded"];

    } else {
        $message = ["error", "Patient Email is not correct"];
    }
}

?>

<?= generatePageHead('Create New Appointment', 'forms.css') ?>

<?php if (isset($message[0]) && $message[0] === 'error') { ?>
    <div class="error-message notification"><span class="material-symbols-outlined">error</span><?= $message[1] ?></div>
<?php } elseif (isset($message[0]) && $message[0] === 'success') { ?>
    <div class="success-message notification"><?= $message[1]?><span class="material-symbols-outlined">check_circle</span></div>
<?php } ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="classic-form">
    
    <h2 class="secondary-text">Input Vital Signs</h2>
    <input required type="text" name="email" id="email" placeholder="Patient Email" class="full">
    <input type="text" name="blood-pressure" id="blood-pressure" placeholder="Blood Pressure (e.g 180/60)" class="full">
    <div class="split">
        <input type="number" name="pulse-rate" id="pulse-rate" placeholder="Pulse Rate (bpm)">
        <input type="number" name="weight" id="weight" placeholder="Weight (lbs)">
    </div>
    <input type="number" name="temperature" id="temperature" placeholder="Body Temperature (°C)" class="full">
    <textarea name="urine" id="temperature" placeholder="Urine Composition" class="full"></textarea>
    <div class="button-container">
        <button class="submit default-button">Submit</button>
    </div>
</form>
<?= generatePageFoot() ?>