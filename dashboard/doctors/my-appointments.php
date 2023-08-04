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

function findAge($dob) {
    $birthDate = date_create($dob);
    $today = date_create();
    return date_diff($today, $birthDate)->format('%y');
}

?>
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
        <?php array_map(function ($item){ ?>
            <tr data-href="<?= 'report.php?id='.$item['appointment_id'] ?>">
                <td>25 Dec</td>
                <td>9:00 - 9:30 AM</td>
                <td><?= $item['full_name'] ?></td>
                <td><?= $item['gender'] ?></td>
                <td><?= findAge($item['date_of_birth']) ?></td>
                <td><?= $item['genotype'] ?></td>
            </tr>
        <?php }, $appointmentsArray); ?>
    </tbody>
</table>

<?= generatePageFoot('click-tables.js') ?>