<?php 

require_once('../../index.php');

$formOptions = [
    [
        "name" => "gender",
        "options" => [
            "Male",
            "Female",
            "Other"
        ]
    ],
    [
        "name" => "unit",
        "options" => $hospital_units
    ]

];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Grab the staff's details
    $full_name = $_POST['staff-name'];
    $date_of_birth = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['staff-email'];
    $phone_number = $_POST['staff-phone'];
    $staff_unit = $_POST['unit'];
    $staff_position = $_POST['position'];
    $specialty = $_POST['specialty'];
    $staff_password = $_POST['staff-password'];

    $check_query = "SELECT email_address FROM staff WHERE email_address='$email'";
    $originalEntry = $mysqli->query($check_query);

    if ($originalEntry->num_rows === 1) {
        $message = ["error", "A Staff already uses this email"];
    } else {
        $encryptedPassword = password_hash($staff_password, PASSWORD_BCRYPT);
        $staff_id = uniqid();

        // Query for adding a new Staff
        $save_query = "INSERT INTO staff(id, staff_id, full_name, gender, date_of_birth, email_address, staff_password, phone_no, position, unit, specialty) VALUES(null, '$staff_id', '$full_name', '$gender', '$date_of_birth', '$email', '$encryptedPassword', '$phone_number', '$staff_position', '$staff_unit', '$specialty')";

        // Get a response from db
        $result = $mysqli->query($save_query);
        $message = ["success", "Staff Added Successfully"];
    }

}

?>

<?= generatePageHead('Add New Staff', 'forms.css') ?>

<?php if (isset($message[0]) && $message[0] === 'error') { ?>
    <div class="error-message notification"><span class="material-symbols-outlined">error</span><?= $message[1] ?></div>
<?php } elseif (isset($message[0]) && $message[0] === 'success') { ?>
    <div class="success-message notification"><?= $message[1]?><span class="material-symbols-outlined">check_circle</span></div>
<?php } ?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="classic-form">
    <h2 class="secondary-text">Personal Information</h2>
    <input type="text" name="staff-name" id="staff-name" placeholder="Full Name" class="full" required>
    <div class="split">
        <input type="text" name="dob" id="dob" required class="date-box" placeholder="Date of Birth">
        <select name="gender" id="gender" placeholder="Gender" required>
            <option value="">Gender</option>
            <?php array_map(function ($item) { ?>
                <option value=<?= $item ?>>
                    <?= $item ?>
                </option>
            <?php }, $formOptions[0]['options']); ?>
        </select>
    </div>
    <input type="tel" name="staff-phone" id="staff-phone" class="full" placeholder="Phone Number" required>

    <h2 class="secondary-text">Staff Details</h2>
    <select name="unit" id="unit" class="full" required>
        <option value="">Select Unit</option>
        <?php array_map(function ($item) { ?>
            <option value=<?= $item['value'] ?>>
                <?= $item['title'] ?>
            </option>
        <?php }, $formOptions[1]['options']); ?>
    </select>
    <select name="position" id="position" class="full" required>
        <option>Select Position</option>
    </select>
    <input type="text" name="specialty" id="specialty" class="full" placeholder="Specialty (Optional)">

    <h2 class="secondary-text">Dashboard Details</h2>
    <input type="email" name="staff-email" id="staff-email" class="full" placeholder="New Staff Email" required>
    <div class="password-container">
        <input type="password" name="staff-password" id="staff-password" class="full" placeholder="New Staff Password" required>
        <span class="material-symbols-outlined visibility">visibility</span>
    </div>
    <div class="button-container">
        <button class="submit default-button">Submit</button>
    </div>
</form>

<?= generatePageFoot('forms/other-staff.js', 'forms/normalize-date-time.js') ?>