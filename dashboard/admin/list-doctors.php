<?php

require_once('../../index.php');

// Query for fetching all doctors
$fetch_doctors = "SELECT full_name, gender, email_address, specialty FROM `staff` WHERE position='Doctor'";
$doctors = $mysqli->query($fetch_doctors);

if ($doctors->num_rows > 0) {
    $doctorsArray = [];
    // Fetch each row and add it to the $doctorsArray
    while ($row = $doctors->fetch_assoc()) {
        $doctorsArray[] = $row;
    }
}

?>

<?= generatePageHead('List all Doctors', 'tables.css') ?>

<h2 class="heading-text">Available Doctors</h2>

<div>
    <table class="classic-table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Doctor's Name</th>
                <th>Email Address</th>
                <th>Gender</th>
                <th>Specialty</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($doctorsArray)) { ?>
                <?php $i = 1; ?>
                <?php array_map(function ($item) use(&$i) { ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= 'Dr. ' . $item['full_name'] ?></td>
                        <td class="clip-data"><?= $item['email_address'] ?></td>
                        <td><?= $item['gender'] ?></td>
                        <td><?= $item['specialty'] === '' ? '--' : $item['specialty'] ?></td>
                    </tr>
                    <?php $i += 1; ?>
                <?php }, $doctorsArray); ?>
            <?php } ?>
        </tbody>
    </table>
</div>

<?= generatePageFoot() ?>