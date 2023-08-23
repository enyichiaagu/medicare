<?php 

require_once('../../index.php');

$appointment_options = [
    'General Check-up', 
    'Eye related Checkup', 
    'Ear, Nose and Throat Checkup', 
    'Obstetrics and Gynecology', 
    'Orthopedics', 
    'Others'
];

// Query for fetching all doctors
$first_query = "SELECT full_name, id FROM `staff` WHERE position='Doctor'";
$doctors = $mysqli->query($first_query);


if ($doctors->num_rows > 0) {
    $doctorsArray = [];
    // Fetch each row and add it to the $doctorsArray
    while ($row = $doctors->fetch_assoc()) {
        $doctorsArray[] = $row;
    }
}

// Variables for Staff Details
$email = '';
$appointment_type = '';
$appointment_day = '';
$appointment_time = '';
$doctor_id = '';
$comment = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Grab the staff's details
    $email = $_POST['patient-email'];
    $appointment_type = $_POST['appointment_type'];
    $appointment_day = $_POST['appointment-date'];
    $appointment_time = $_POST['appointment_time'];
    $doctor_id = $_POST['doctor-id'];
    $comment = $_POST['comment'];

    $fetch_patient_query = "SELECT id FROM patients WHERE email_address='$email'";
    $patient = $mysqli->query($fetch_patient_query);

    if ($patient->num_rows === 1) {

        $fetch_appointment = "SELECT * FROM appointments WHERE appointment_date='$appointment_day' AND appointment_time='$appointment_time:00' AND doctor_id='$doctor_id'";
        $booked = $mysqli->query($fetch_appointment);

        if ($booked->num_rows === 1) $message = ['error', 'Another Patient has booked this time, pick another Doctor or Time'];
        else {
            $patient_id = $patient->fetch_assoc()['id'];

            $appointment_id = uniqid();

            $third_query = "INSERT INTO appointments(appointment_id, patient_id, appointment_type, doctor_id, comment_for_doctor, appointment_date, appointment_time) VALUES('$appointment_id', '$patient_id', '$appointment_type', '$doctor_id', '$comment', '$appointment_day', '$appointment_time')";
            $result = $mysqli->query($third_query);
            $message = ['success', 'Appointment Booked Successfully'];

            $email = '';
        }

    } else {
        $message=['error', "The Patient's Email is not registered"];
    }

} 

?>

<?= generatePageHead('Create New Appointment', 'forms.css') ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="classic-form">
    <?php if (isset($message[0]) && $message[0] === 'error') { ?>
        <div class="error-message notification"><span class="material-symbols-outlined">error</span><?= $message[1] ?></div>
    <?php } elseif (isset($message[0]) && $message[0] === 'success') { ?>
        <div class="success-message notification"><?= $message[1]?><span class="material-symbols-outlined">check_circle</span></div>
    <?php } ?>

    <h2 class="secondary-text">Create New Appointment</h2>
    <input type="text" name="patient-email" id="" placeholder="Patient Email" class="full" value="<?= $email ?>">
    <select name="appointment_type" id="appointment_type" class="full" required>
        <option value="">Appointment Type</option>
        <?php array_map(function ($item) { ?>
            <option value="<?= $item ?>">
                <?= $item ?>
            </option>
        <?php }, $appointment_options); ?>
    </select>
    <div class="split">
        <input type="text" class="date-box min-today" placeholder="Date of Appointment" name="appointment-date">
        <!-- <input type="text" name="appointment_time" id="" class="time-box" placeholder="Time" min="09:00" max="16:30" name="appointment-time"> -->
        <select name="appointment_time" id="appointment_time">
            <option value="">Time</option>
            <option value="09:00">9:00 - 9:30 AM</option>
            <option value="09:30">9:30 - 10:00 AM</option>
            <option value="10:00">10:00 - 10:30 AM</option>
            <option value="10:30">10:30 - 11:00 AM</option>
            <option value="11:00">11:00 - 11:30 AM</option>
            <option value="11:30">11:30 - 12:00 PM</option>
            <option value="01:00">1:00 - 1:30 PM</option>
            <option value="01:30">1:30 - 2:00 PM</option>
            <option value="02:00">2:00 - 2:30 PM</option>
            <option value="02:30">2:30 - 3:00 PM</option>
        </select>
    </div>
    <select name="doctor-id" class="full">
        <option value="" selected>Select Doctor</option>
        <?php array_map(function ($item) { ?>
            <option value="<?= $item['id'] ?>">
                <?= $item['full_name'] ?>
            </option>
        <?php }, $doctorsArray); ?>
    </select>
    <textarea placeholder="Comment for Doctor (Optional)" class="full" name="comment"></textarea>
    <div class="button-container">
        <button class="submit default-button">Book Appointment</button>
    </div>
</form>

<?= generatePageFoot('forms/normalize-date-time.js') ?>