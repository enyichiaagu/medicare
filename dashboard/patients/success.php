<?php 

require_once('../../index.php');

$patientId = $_GET['id'] ?? null;

if ($patientId === null) {
    header('Location: add-patient.php');
    exit;
}

$patient = fetch_database_row($patientId, 'patient_id', 'patients');

?>

<?= generatePageHead('New Patient Added', 'forms.css', 'show-card.css'); ?>
<form class="classic-form">
    <h2 class="secondary-text">
        Patient Registered
        <button type="button" class="print-btn" title="Print">
            <span class="material-symbols-outlined">print</span>
        </button>
    </h2>
    <div class="show-card">
        <div class="card-header">
            <span class="patient-name"><?= $patient['full_name'] ?></span>
            <span class="patient-id">Patient ID: <?= $patient['patient_id'] ?></span>
        </div>
        <div class="card-body">
            <div>
                <span class="item-label">Gender</span>
                <span class="item-value"><?= $patient['gender'] ?></span>
            </div>
            <div>
                <span class="item-label">Email Address</span>
                <span class="item-value"><?= $patient['email_address'] ?></span>
            </div>
            <div>
                <span class="item-label">Residential Address</span>
                <span class="item-value"><?= $patient['residential_address'] ?></span>
            </div>
            <div>
                <span class="item-label">Phone Number</span>
                <span class="item-value"><?= $patient['phone_no'] ?></span>
            </div>
        </div>
    </div>
    <div class="button-container">
        <a class="cancel-link" href="add-patient.php">Back</a>
</div>
</form>

<?= generatePageFoot('print.js') ?>