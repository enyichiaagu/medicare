<?php 

require_once('../../index.php');

isset($_GET['id']) ? $appointmentId = $_GET['id'] : null;

if (!isset($appointmentId)){

    header('Location: my-appointments.php');
    exit;

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $observations = $_POST['observations'];
    $finished = true;
    $save_query = "UPDATE appointments SET observations = '$observations', finished = '$finished' WHERE appointment_id = '$appointmentId'";
    save_record($save_query);

    header('Location: my-appointments.php');
    exit;

}

$appointmentDetails = fetch_database_row($appointmentId, 'appointment_id', 'appointments');
$patientDetails = fetch_database_row($appointmentDetails['patient_id'], 'id', 'patients');
$signDetails = fetch_database_row($patientDetails['id'], 'patient_id', 'vital_signs');

function signDetails($db_column, $unit='') {
    global $signDetails;
    return ($signDetails === false) ? null : $signDetails[$db_column].' '.$unit;
}

function lastUpdated($timestamp) {
    if ($timestamp !== null) {
        return date('M j, Y h:i A', strtotime($timestamp));
    }
    return null;
}


$personalInfo = [
    [
        'title' => 'Name',
        'value' => $patientDetails['full_name']
    ],
    [
        'title' => 'Age',
        'value' => findAge($patientDetails['date_of_birth'])
    ],
    [
        'title' => 'Genotype',
        'value' => $patientDetails['genotype']
    ],
    [
        'title' => 'Blood Group',
        'value' => $patientDetails['blood_group']
    ],
    [
        'title' => 'Allergies',
        'value' => $patientDetails['allergies']
    ]
];

$appointment_data = [
    [
        'title' => 'Appointment Type',
        'value' => $appointmentDetails['appointment_type']
    ],
    [
        'title' => "Patient's Comment",
        'value' => $appointmentDetails['comment_for_doctor']
    ]
];

$vitalSigns = [
    [
        'title' => 'Body Temperature',
        'value' => signDetails('body_temperature', '°C')
    ],
    [
        'title' => 'Blood Pressure',
        'value' => signDetails('blood_pressure')
    ],
    [
        'title' => 'Pulse Rate',
        'value' => signDetails('pulse_rate', 'BPM')
    ],
    [
        'title' => 'Body Weight',
        'value' => signDetails('body_weight', 'lbs')
    ],
    [
        'title' => 'Urine Composition',
        'value' => signDetails('urine_composition')
    ],
    [
        'title' => 'Last Updated',
        'value' => lastUpdated(signDetails('last_updated'))
    ]
];

?>

<?= generatePageHead("Doctor's Appointment Report", 'forms.css') ?>

<form class="classic-form" method="POST">

    <h2 class="secondary-text">Patient's Personal Information</h2>

    <div class="show-info">
    <?php array_map(function ($item) { ?>
        <span>
            <span class="title"><?= $item['title'] ?>:</span>
            <span class="value"><?= $item['value'] ?></span>
        </span>
    <?php }, $personalInfo) ?> 
    </div>

    <h2 class="secondary-text">Appointment Details</h2>
    <div class="show-info">
    <?php array_map(function ($item) { ?>
        <span>
            <span class="title"><?= $item['title'] ?>:</span>
            <span class="value"><?= $item['value'] ?></span>
        </span>
    <?php }, $appointment_data) ?>
    </div>

    <h2 class="secondary-text">Recent Vital Signs</h2>
    <div class="show-info">
    <?php array_map(function ($item) { ?>
        <span>
            <span class="title"><?= $item['title'] ?>:</span>
            <span class="value"><?= $item['value'] ?></span>
        </span>
    <?php }, $vitalSigns) ?> 
    </div>
    <h2 class="secondary-text">Doctor's Report Form</h2>
    <textarea name="observations" id="observations" placeholder="Observations" class="full" rows="4"></textarea>
    <input type="text" class="full" placeholder="Laboratory request (Optional)">
    <input type="text" class="full" placeholder="Drug Prescription (Optional)">
    <span class="check-container">
        <input id="check" type="checkbox" name="" value="">
        <label for="check">Admit Patient</label>
    </span>
    <input type="text" class="full" placeholder="Reason for Admission (Optional)">
    <div class="button-container">
        <a class="cancel-link" href="my-appointments.php">Cancel</a>
        <button class="submit default-button">Finish Appointment</button>
    </div>
</form>

<?= generatePageFoot() ?>