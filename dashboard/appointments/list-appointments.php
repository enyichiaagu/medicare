<?php 

require_once('../../index.php');

$search = isset($_GET['q']) ? $_GET['q'] : '';

// Query for Fetching Related Info
$query = "SELECT appointments.appointment_date, appointments.appointment_time, patients.full_name AS patient_name, patients.email_address, patients.gender, staff.full_name FROM `appointments` INNER JOIN `patients` ON appointments.patient_id = patients.id INNER JOIN `staff` ON appointments.doctor_id = staff.id";

$appointments = $mysqli->query($query);

if ($appointments->num_rows > 0) {
    $appointmentArray = [];
    
    // Fetch each row and add it to the $appointmentArray
    while ($row = $appointments->fetch_assoc()) {
        $appointmentArray[] = $row;
    }

    $filteredAppointments = array_filter($appointmentArray, function ($item) use ($search){
        return stripos($item['email_address'], $search) !== false;
    });

    usort($filteredAppointments, function ($first, $second) {
        if (strtotime($first['appointment_date']) > strtotime($second['appointment_date'])) return 1;
        elseif (strtotime($first['appointment_date']) < strtotime($second['appointment_date'])) return -1;
        else {
            if (strtotime($first['appointment_time']) > strtotime($second['appointment_time'])) return 1;
            elseif (strtotime($first['appointment_time']) < strtotime($second['appointment_time'])) return -1;
            else return 0;
        }
    });

}

// Format the date as "d F" (e.g., "31 July")
function formatDate($inputDate) {
    $dateStr = strtotime($inputDate);
    $formattedDate = date("d M", $dateStr);
    return $formattedDate;
}

function formatTimeRange($startTime) {
    // Create DateTime objects for start and end times
    $startObj = DateTime::createFromFormat('H:i:s', $startTime);
    $endObj = clone $startObj;
    
    // Add 30 minutes to the end time
    $endObj->modify('+30 minutes');

    // Format the times as "h:i A"
    $formattedStart = $startObj->format('h:i');
    $formattedEnd = $endObj->format('h:i A');

    // Concatenate the formatted times
    $formattedTimeRange = $formattedStart . ' - ' . $formattedEnd;

    return $formattedTimeRange;
}

?>

<?= generatePageHead('View All Appointments', 'tables.css') ?>

<form class="search-form">
    <span class="search-icon">
        <span class="material-symbols-outlined">
            search
        </span>
    </span>
    <input type="text" name="q" id="q" placeholder="Search Patient Email" class="input-bar" value="<?= $search ?>">
    <button class="default-button">Submit</button>
</form>

<div>
    <table class="classic-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Patient Gender</th>
                <th>Assigned Doctor</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($filteredAppointments)) { ?>
                <?php array_map(function ($item) { ?>
                    <tr>
                        <td><?= formatDate($item['appointment_date']) ?></td>
                        <td><?= formatTimeRange($item['appointment_time']) ?></td>
                        <td class="clip-data"><?= $item['patient_name'] ?></td>
                        <td class="clip-data"><?= $item['email_address'] ?></td>
                        <td><?= $item['gender'] ?></td>
                        <td><?= $item['full_name'] ?></td>
                    </tr>
                <?php }, $filteredAppointments); ?>
            <?php } ?>
        </tbody>
    </table>
</div>

<?= generatePageFoot() ?>