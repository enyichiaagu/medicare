<?php require_once('../../index.php');

$formOptions = [
    [
        'name' => 'gender',
        'options' => ['Male', 'Female', 'Others']
    ],
    [
        'name' => 'genotype',
        'options' => ['AA', 'AS', 'SS', 'AC', 'SC']
    ],
    [
        'name' => 'blood_group',
        'options' => ['A', 'B', 'AB', 'O']
    ],
    [
        'name' => 'condition',
        'options' => ['Diabetics', 'High BP', 'Asthma', 'Arthritis', 'Stroke']
    ]
];

// Import database credentials
require_once('../db-credentials.php');
// $hostname
// $db_username
// $db_password
// $database

$message = '';

function escapeSingleQuotes($str) {
    return str_replace("'", "\\'", $str);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Connect to the database
    $mysqli = new mysqli($hostname, $db_username, $db_password, $database);

    $full_name = $_POST['patient-name'];
    $date_of_birth = $_POST['dob'];
    $gender = $_POST['gender'];
    $genotype = $_POST['genotype'];
    $blood_group = $_POST['blood-group'];
    $home_address = escapeSingleQuotes($_POST['home-address']);
    $email_address = $_POST['email'];
    $phone_number = $_POST['phone'];
    $next_of_kin_name = $_POST['next-of-kin-name'];
    $next_of_kin_no = $_POST['next-of-kin-phone'];
    $conditionsArray = $_POST['condition'];
    $conditionsString = '';
    foreach ($conditionsArray as $condition) {
        $conditionsString .= $condition . ', ';
    }
    $allergies = $_POST['allergies'];
    $patient_id = uniqid();

    // Query for adding a new Patient
    $query = "INSERT INTO patients(id, patient_id, full_name, gender, date_of_birth, phone_no, residential_address, email_address, next_of_kin_name, next_of_kin_no, existing_medical_conditions, allergies, blood_group, genotype) VALUES (null, '$patient_id', '$full_name', '$gender', '$date_of_birth', '$phone_number', '$home_address', '$email_address', '$next_of_kin_name', '$next_of_kin_no', '$conditionsString', '$allergies', '$blood_group', '$genotype')";

    // Get a response from db
    $result = $mysqli->query($query);
    $message = "Patient Added Successfully";
}

generatePageHead('Add New Patient', 'forms.css'); ?>

<?= $message === '' ? '' : "<p class='success-message'>$message</p>" ?>


<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="classic-form">
    <h2 class="secondary-text">Personal Information</h2>
    <input type="name" class="full" id="patient-name" placeholder ="Full Name" name="patient-name">
    <div class="split">
        <input type="text" id="dob" placeholder="Date of Birth" class="date-box" name="dob">
        <!-- Gender -->
        <select id="gender" name="gender">
            <option value="" selected>Gender</option>
            <?php array_map(function ($item) { ?>
                <option value=<?= $item ?>>
                    <?= $item ?>
                </option>
            <?php }, $formOptions[0]['options']); ?>
        </select>
    </div>
    <div class="split">
        <!-- Genotype -->
        <select id="genotype" name="genotype">
            <option value="" selected>Blood Genotype</option>
            <?php array_map(function ($item) { ?>
                <option value=<?= $item ?>>
                    <?= $item ?>
                </option>
            <?php }, $formOptions[1]['options']); ?>
        </select>
        <!-- bloodGroup -->
        <select id="blood-group" name="blood-group">
            <option value="" selected>Blood Group</option>
            <?php array_map(function ($item) { ?>
                <option value=<?= $item ?>>
                    <?= $item ?>
                </option>
            <?php }, $formOptions[2]['options']); ?>
        </select>
    </div>

    <h2 class="secondary-text">Identification Details</h2>
    <input type="text" id="home-address" placeholder="Residential Address" class="full" min="10" name="home-address">
    <div class="split">
        <input type="tel" id="phone" name="phone" placeholder ="Phone Number">
        <input type="email" id="email" name="email" placeholder="Email">
    </div>

    <h2 class="secondary-text">Emergency Contact Information</h2>
    <div class="split">
        <input type="text" id="next-of-kin-name" placeholder="Next of Kin's Name" name="next-of-kin-name">
        <input type="tel" id="next-of-kin-phone" placeholder="Next of Kin's Phone Number" name="next-of-kin-phone">
    </div>
    <h2 class="secondary-text">Medical History</h2>
    <div class="split">
        <?php $counter = 0 ?>
        <?php array_map(function($item) use (&$counter) { ?>
            <span class="check-container">
                <input id="check-<?= $counter ?>" type="checkbox" name="condition[]" value="<?= $item ?>">
                <label for="check-<?= $counter ?>"><?= $item ?></label>
            </span>
        <?php $counter = $counter + 1 ?>
        <?php }, $formOptions[3]['options']); ?>
    </div>
    <input type="text" id="others" placeholder="Others (If any)" class="full" name="condition[]">
    <textarea type="text" id="allergies" name="allergies" placeholder ="Allergies (optional)" class="full"></textarea>
    <div class="button-container">
        <button type="submit" id="submit" class="submit">Submit</button>
    </div>
</form>

<?= generatePageFoot('normalize-form.js') ?>