<?php require_once('../../index.php'); ?>



<?= generatePageHead('Create New Appointment', 'forms.css') ?>

<?php if (isset($message[0]) && $message[0] === 'error') { ?>
    <div class="error-message notification"><span class="material-symbols-outlined">error</span><?= $message[1] ?></div>
<?php } elseif (isset($message[0]) && $message[0] === 'success') { ?>
    <div class="success-message notification"><?= $message[1]?><span class="material-symbols-outlined">check_circle</span></div>
<?php } ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="classic-form">
    
    <h2 class="secondary-text">Input Vital Signs</h2>
    <input type="text" name="" id="" placeholder="Patient Email" class="full">
    <input type="text" name="" id="" placeholder="Blood Pressure (e.g 180/60)" class="full">
    <div class="split">
        <input type="number" name="" id="" placeholder="Pulse Rate (bpm)">
        <input type="number" name="" id="" placeholder="Weight (lbs)">
    </div>
    <input type="text" name="" id="" placeholder="Body Temperature (°C)" class="full">
    <textarea name="" id="" placeholder="Urine Composition" class="full"></textarea>
    <div class="button-container">
        <button class="submit default-button">Submit</button>
    </div>
</form>
<?= generatePageFoot() ?>