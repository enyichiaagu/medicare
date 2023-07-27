<?php require_once('../../index.php'); ?>

<?= generatePageHead('Create New Appointment', 'forms.css') ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="classic-form">
    
    <h2 class="secondary-text">Input Vital Signs</h2>
    <input type="text" name="" id="" placeholder="Patient Email" class="full">
    <input type="text" name="" id="" placeholder="Blood Pressure" class="full">
    <div class="split">
        <input type="text" name="" id="" placeholder="Pulse Rate">
        <input type="text" name="" id="" placeholder="Weight (lbs)">
    </div>
    <input type="text" name="" id="" placeholder="Body Temperature" class="full">
    <input type="text" name="" id="" placeholder="Urine Composition" class="full">
    <input type="text" name="" id="" placeholder="Oxygen Composition" class="full">
    <div class="button-container">
        <button class="submit">Submit</button>
    </div>
</form>
<?= generatePageFoot('other-staff.js') ?>