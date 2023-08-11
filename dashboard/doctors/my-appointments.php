<?php require_once('../../index.php'); 

$doctorID = $_SESSION['user']['id'];

$fetchAppointments = "SELECT appointments.*, patients.full_name, patients.gender, patients.date_of_birth, patients.genotype FROM appointments INNER JOIN patients ON appointments.patient_id=patients.id WHERE appointments.doctor_id='$doctorID'";

$appointmentsList = $mysqli->query($fetchAppointments);

if ($appointmentsList->num_rows > 0) {

    $appointmentsArray = [];
    
    while ($row = $appointmentsList->fetch_assoc()) {
        $appointmentsArray[] = $row;
    }
}

function formatTime($time) {
    $start = date('h:i', strtotime($time));
    $end = date('h:i A', strtotime($time) + (30 * 60));
    return "$start - $end";
}

?>
<?= generatePageHead('My Appointments', 'tables.css') ?>

<h2 class="heading-text">Appointments</h2>

<?php if (isset($appointmentsArray)) { ?>
<table class="classic-table highlight">
    <thead>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Genotype</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php array_map(function ($item){ ?>
            <tr data-href="<?= 'report.php?id='.$item['appointment_id'] ?>">
                <td><?= date('d M', strtotime($item['appointment_date'])) ?></td>
                <td><?= formatTime($item['appointment_time']) ?></td>
                <td><?= $item['full_name'] ?></td>
                <td><?= $item['gender'] ?></td>
                <td><?= findAge($item['date_of_birth']) ?></td>
                <td><?= $item['genotype'] ?></td>
                <td>
                    <div class="badge <?= $item['finished'] ? 'success' : 'new' ?>">
                        <span><?= $item['finished'] ? 'finished' : 'new' ?></span>
                    </div>
                </td>
            </tr>
        <?php }, $appointmentsArray); ?>
    </tbody>
</table>
<?php } else { ?>
<div class="error-message notification"><span class="material-symbols-outlined">error</span>No Appointments Found</div>
<?php } ?>

<?= generatePageFoot('click-tables.js') ?>