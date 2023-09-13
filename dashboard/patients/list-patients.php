<?php 

require_once('../../index.php');

$searchId = isset($_GET['patient-id']) ? $_GET['patient-id'] : null;
$patient = isset($searchId) ? fetch_database_row($searchId, 'patient_id', 'patients') : null;

?>

<?= generatePageHead('Find A Patient', 'tables.css', 'show-card.css') ?>

<form class="search-form">
    <span class="search-icon">
        <span class="material-symbols-outlined">
            search
        </span>
    </span>
    <input type="text" name="patient-id" id="search" placeholder="Search Patient ID" class="input-bar" value='<?= $searchId ?>' required>
    <button class="default-button">Submit</button>
</form>
<?php if (isset($searchId) && isset($patient) && $patient !== false) { ?>
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
<?php } elseif (isset($patient)) { ?>
<div class="error-message notification"><span class="material-symbols-outlined">error</span>Patient Email is not valid</div>
<?php } ?>

<?= generatePageFoot() ?>
