<?php

require_once('../../index.php');

$lab_list = fetch_database_row(null, null, 'laboratory');

function patientDetails($id) {
    return fetch_database_row($id, 'id', 'patients');
}

?>
<?= generatePageHead('Laboratory Records', 'tables.css') ?>

<form class="search-form">
    <span class="search-icon">
        <span class="material-symbols-outlined">
            search
        </span>
    </span>
    <input type="text" placeholder="Search Patient Email" class="input-bar" value="">
    <button class="default-button">Submit</button>
</form>

<?php if ($lab_list !== false) { ?>
<table class="classic-table highlight">
    <thead>
        <tr>
            <th>Date Created</th>
            <th>Time Created</th>
            <th>Patient Name</th>
            <th>Patient Email</th>
            <th>Gender</th>
            <th>Test Type</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        array_map(function ($item){
            $patient = patientDetails($item['patient_id']);
        
        ?>
            <tr data-href="<?= 'lab-report.php?id='.$item['lab_id']?>">
                <td><?= date('d M', strtotime($item['entry_date'])) ?></td>
                <td><?= date('h:i A', strtotime($item['entry_date'])) ?></td>
                <td><?= $patient['full_name'] ?></td>
                <td class="clip-data"><?= $patient['email_address'] ?></td>
                <td><?= $patient['gender'] ?></td>
                <td><?= $item['lab_tests'] ?></td>
                <td class="badge <?= $item['lab_status'] > 0 ? 'success' : ($item['lab_status'] < 0 ? 'new' : 'pending') ?>">
                    <span><?= $item['lab_status'] > 0 ? 'finished' : ($item['lab_status'] < 0 ? 'new' : 'pending') ?></span>
                </td>
            </tr>
        <?php }, $lab_list); ?>
    </tbody>
</table>
<?php } else { ?>
<div class="error-message notification"><span class="material-symbols-outlined">error</span>No Records Found</div>
<?php } ?>

<?= generatePageFoot('click-tables.js') ?>

<?= generatePageFoot() ?>