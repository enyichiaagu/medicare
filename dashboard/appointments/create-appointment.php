<?php 

require_once('../../index.php');

$appointment_type = [
    'General Check-up', 
    'Eye related Checkup', 
    'Ear, Nose and Throat Checkup', 
    'Obstetrics and Gynecology', 
    'Orthopedics', 
    'Others'
];

generatePageHead('Create New Appointment', 'forms.css') ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="classic-form">
    <h2 class="secondary-text">Create New Appointment</h2>
    <input type="text" name="" id="" placeholder="Patient Email" class="full">
    <select name="appointment_type" id="appointment_type" class="full" required>
        <option value='' selected>Appointment Type</option>
        <?php array_map(function ($item) { ?>
            <option value="<?= $item ?>">
                <?= $item ?>
            </option>
        <?php }, $appointment_type); ?>
    </select>
    <input type="text" class="full date-box" placeholder="Date of Appointment">
    <input type="text" name="" id="" class="full time-box" placeholder="Time">
    <select name="doctor_id" class="full">
        <option>Select Doctor</option>
    </select>
    <div class="button-container">
        <button class="submit">Book Appointment</button>
    </div>
</form>

<?= generatePageFoot('normalize-form.js') ?>