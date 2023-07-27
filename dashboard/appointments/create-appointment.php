<?php 

require_once('../../index.php');

$appointment_type = [
    'General Check-up', 
    'Eye related Checkup', 
    'Ear nose and throat Checkup', 
    'Obstetrics and Gynecology', 
    'Orthopedics', 
    'Others'
];

generatePageHead('Create New Appointment', 'forms.css') ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="classic-form">
    <h2 class="secondary-text">Create New Appointment</h2>
    <input type="text" name="" id="" placeholder="Patient Email" class="full">
    <select name="appointment_type" id="appointment_type" class="full" required>
        <option>Appointment Type</option>
        <?php array_map(function ($item) { ?>
            <option value=<?= $item ?>>
                <?= $item ?>
            </option> ?>
        <?php }, $appointment_type); ?>
    </select>
    <input type="date" class="full">
    <input type="time" name="" id="" class="full">
    <select name="doctor_id" class="full">
        <option>Select Doctor</option>
    </select>
    <div class="button-container">
        <button class="submit">Book Appointment</button>
    </div>
</form>

<?= generatePageFoot('other-staff.js') ?>