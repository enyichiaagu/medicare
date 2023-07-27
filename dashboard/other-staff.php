<?php 

require_once('../index.php');

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
        "options" => [
            [
                "title" => "Accounting Unit",
                "value" => "bursary"
            ],
            [
                "title" => "Laboratory Unit",
                "value" => "lab"
            ],
            [
                "title" => "Out Patients Department",
                "value" => "opd"
            ],
            [
                "title" => "Nursing Unit",
                "value" => "nursing"
            ],
            [
                "title" => "Pharmacy Unit",
                "value" => "pharmacy"
            ],
            [
                "title" => "Management",
                "value" => "management"
            ],
            [
                "title" => "Physician Unit",
                "value" => "physician"
            ]
        ]
    ]

];

// Import database credentials
require_once('./db-credentials.php');
// $hostname
// $db_username
// $db_password
// $database

// Status message
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Connect to the database
    $mysqli = new mysqli($hostname, $db_username, $db_password, $database);

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

    $encryptedPassword = password_hash($staff_password, PASSWORD_BCRYPT);
    $staff_id = uniqid();

    // Query for adding a new Staff
    $query = "INSERT INTO staff(id, staff_id, full_name, gender, date_of_birth, email_address, staff_password, phone_no, position, unit, specialty) VALUES(null, '$staff_id', '$full_name', '$gender', '$date_of_birth', '$email', '$encryptedPassword', '$phone_number', '$staff_position', '$staff_unit', '$specialty')";

    // Get a response from db
    $result = $mysqli->query($query);
    $message = "Staff Successfully Added";

}

?>

<?= generatePageHead('Add New Staff', 'forms.css') ?>

<p><?= $message ?></p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="classic-form">
    <h2 class="secondary-text">Personal Information</h2>
    <input type="text" name="staff-name" id="staff-name" placeholder="Full Name" class="full" required>
    <div class="split">
        <input type="date" name="dob" id="dob" required>
        <select name="gender" id="gender" placeholder="Gender" required>
            <option>Gender</option>
            <?php array_map(function ($item) { ?>
                <option value=<?= $item ?>>
                    <?= $item ?>
                </option> ?>
            <?php }, $formOptions[0]['options']); ?>
        </select>
    </div>
    <input type="tel" name="staff-phone" id="staff-phone" class="full" placeholder="Phone Number" required>

    <h2 class="secondary-text">Staff Details</h2>
    <select name="unit" id="unit" class="full" required>
        <option>Select Unit</option>
        <?php array_map(function ($item) { ?>
            <option value=<?= $item['value'] ?>>
                <?= $item['title'] ?>
            </option> ?>
        <?php }, $formOptions[1]['options']); ?>
    </select>
    <select name="position" id="position" class="full" required>
        <option>Select Position</option>
    </select>
    <input type="text" name="specialty" id="specialty" class="full" placeholder="Specialty (Optional)">

    <h2 class="secondary-text">Dashboard Details</h2>
    <input type="email" name="staff-email" id="staff-email" class="full" placeholder="New Staff Email" required>
    <input type="password" name="staff-password" id="staff-password" class="full" placeholder="New Staff Password" required>
    <div class="button-container">
        <button class="submit">Submit</button>
    </div>
</form>

<?= generatePageFoot('other-staff.js') ?>