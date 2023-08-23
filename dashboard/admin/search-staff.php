<?php 

require_once('../../index.php');

$searchEmail = isset($_GET['search']) ? $_GET['search'] : null;
$staff = fetch_database_row($searchEmail, 'email_address', 'staff');

function nameOfUnit($unit) {
    global $hospital_units;
    $index = array_search($unit, array_column($hospital_units, 'value'));
    return $hospital_units[$index]['title'];
}

?>

<?= generatePageHead('All Staff', 'tables.css', 'show-card.css') ?>

<form class="search-form">
    <span class="search-icon">
        <span class="material-symbols-outlined">
            search
        </span>
    </span>
    <input type="email" name="search" id="search" placeholder="Search Staff Email" class="input-bar" value='<?= $searchEmail ?>' required>
    <button class="default-button">Submit</button>
</form>

<?php if (isset($searchEmail) && isset($staff) && $staff !== false) { ?>
<div class="show-card">
    <div class="card-header">
        <span class="patient-name"><?= $staff['full_name'] ?></span>
        <span class="patient-id">Staff ID: <?= $staff['staff_id'] ?></span>
    </div>
    <div class="card-body">
        <div>
            <span class="item-label">Gender</span>
            <span class="item-value"><?= $staff['gender'] ?></span>
        </div>
        <div>
            <span class="item-label">Email Address</span>
            <span class="item-value"><?= $staff['email_address'] ?></span>
        </div>
        <div>
            <span class="item-label">Unit</span>
            <span class="item-value"><?= nameOfUnit($staff['unit']) ?></span>
        </div>
        <div>
            <span class="item-label">Position</span>
            <span class="item-value"><?= $staff['position'] ?></span>
        </div>
        <div>
            <span class="item-label">Phone Number</span>
            <span class="item-value"><?= $staff['phone_no'] ?></span>
        </div>
    </div>
</div>
<?php } elseif (isset($searchEmail)) { ?>
<div class="error-message notification"><span class="material-symbols-outlined">error</span>Patient Email is not valid</div>
<?php } ?>

<?= generatePageFoot() ?>