<?php require_once('../../index.php'); ?>

<?= generatePageHead('My Appointments', 'tables.css') ?>

<h2 class="heading-text">Appointments</h2>

<table class="classic-table highlight">
    <thead>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Genotype</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>25 Dec</td>
            <td>9:00 - 9:30 AM</td>
            <td>John Jones</td>
            <td>Male</td>
            <td>20</td>
            <td>AA</td>
        </tr>
    </tbody>
</table>

<?= generatePageFoot() ?>