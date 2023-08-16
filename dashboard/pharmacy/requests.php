<?php

require_once('../../index.php');

$pharm_list = fetch_database_row(null, null, 'pharmacy');

function patientDetails($id) {
    return fetch_database_row($id, 'id', 'patients');
}

?>

<?= generatePageHead('Pharmacy', 'tables.css') ?>

<form class="search-form">
    <span class="search-icon">
        <span class="material-symbols-outlined">
            search
        </span>
    </span>
    <input type="text" placeholder="Search Patient Email" class="input-bar" value="">
    <button class="default-button">Submit</button>
</form>

<?php if ($pharm_list !== false) { ?>
<table class="classic-table highlight">
    <thead>
        <tr>
            <th>Date Updated</th>
            <th>Time</th>
            <th>Patient Name</th>
            <th>Patient Email</th>
            <th>Drugs Requested</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        array_map(function ($item){
            $patient = patientDetails($item['patient_id']);
        
        ?>
            <tr data-href="<?= 'pharm-report.php?id='.$item['pharm_id']?>">
                <td><?= date('d M', strtotime($item['entry_date'])) ?></td>
                <td><?= date('h:i A', strtotime($item['entry_date'])) ?></td>
                <td><?= $patient['full_name'] ?></td>
                <td><?= $patient['email_address'] ?></td>
                <td class="clip-data"><?= $item['drugs'] ?></td>
                <td class="badge <?= $item['finished'] ? 'success' : 'new' ?>">
                    <span><?= $item['finished'] ? 'finished' : 'new' ?></span>
                </td>
            </tr>
        <?php }, $pharm_list); ?>
    </tbody>
</table>
<?php } else { ?>
<div class="error-message notification"><span class="material-symbols-outlined">error</span>No Drug Requests Found</div>
<?php } ?>

<?= generatePageFoot('click-tables.js') ?>