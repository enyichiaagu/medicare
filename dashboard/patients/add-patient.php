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

function escapeSingleQuotes($str) {
    return str_replace("'", "\\'", $str);
}

function formatInput($value) {
    if ($value === '') return null;
    else return $value;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $full_name = formatInput($_POST['patient-name']);
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

    if ($full_name !== null) {

        $patient_id = uniqid();

        // Query for adding a new Patient
        $query = "INSERT INTO patients(patient_id, full_name, gender, date_of_birth, phone_no, residential_address, email_address, next_of_kin_name, next_of_kin_no, existing_medical_conditions, allergies, blood_group, genotype) VALUES ('$patient_id', '$full_name', '$gender', '$date_of_birth', '$phone_number', '$home_address', '$email_address', '$next_of_kin_name', '$next_of_kin_no', '$conditionsString', '$allergies', '$blood_group', '$genotype')";

        // Get a response from db
        $result = $mysqli->query($query);
        // $message = ["success", "Patient Added Successfully. Please Direct to the Bursary"];

        // Fetch User Id from Database
        $fetchUserQuery = "SELECT id FROM patients WHERE patient_id='$patient_id'";
        $fetchedUser = $mysqli->query($fetchUserQuery);
        $userId = $fetchedUser->fetch_assoc()['id'];

        // Specify variables for the bursary
        $registrationAmount = 1000;
        $reason = 'Patient Registration';

        // Query for creating a payment record
        $payment_id = uniqid();
        $timestamp = date('Y-m-d H:i:s');
        $addPaymentQuery = "INSERT INTO payments(payment_id, entry_date, patient_id, amount, reason) VALUES('$payment_id', '$timestamp', '$userId', '$registrationAmount', '$reason')";
        $savedPaymentRecord = $mysqli->query($addPaymentQuery);

        header("Location: success.php?id=$patient_id");
        exit;

    } else {
        $message = ['error', 'Something went wrong. Please try again later'];
    }
}

?>

<?= generatePageHead('Add New Patient', 'forms.css'); ?>

<?php if (isset($message[0]) && $message[0] === 'error') { ?>
    <div class="error-message notification"><span class="material-symbols-outlined">error</span><?= $message[1] ?></div>
<?php } elseif (isset($message[0]) && $message[0] === 'success') { ?>
    <div class="success-message notification"><?= $message[1]?><span class="material-symbols-outlined">check_circle</span></div>
<?php } ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="classic-form">
    <h2 class="secondary-text">Personal Information</h2>
    <input type="name" class="full" id="patient-name" placeholder ="Full Name" name="patient-name" required>
    <div class="split">
        <input type="text" id="dob" placeholder="Date of Birth" class="date-box" name="dob" required>
        <!-- Gender -->
        <select id="gender" name="gender" required>
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
            <option value="">Genotype: Not Applicable</option>
        </select>
        <!-- bloodGroup -->
        <select id="blood-group" name="blood-group">
            <option value="" selected>Blood Group</option>
            <?php array_map(function ($item) { ?>
                <option value=<?= $item ?>>
                    <?= $item ?>
                </option>
            <?php }, $formOptions[2]['options']); ?>
            <option value="">Blood Group: Not Applicable</option>
        </select>
    </div>

    <h2 class="secondary-text">Identification Details</h2>
    <input type="text" id="home-address" placeholder="Residential Address" class="full" min="10" name="home-address" required>
    <div class="split">
        <input type="tel" id="phone" name="phone" placeholder ="Phone Number" required>
        <input type="email" id="email" name="email" placeholder="Email" required>
    </div>

    <h2 class="secondary-text">Emergency Contact Information</h2>
    <div class="split">
        <input type="text" id="next-of-kin-name" placeholder="Next of Kin's Name" name="next-of-kin-name">
        <input type="tel" id="next-of-kin-phone" placeholder="Next of Kin's Phone Number" name="next-of-kin-phone">
    </div>
    <h2 class="secondary-text">Medical History</h2>
    <p>Please tick if the patient has any of the following conditions:</p>
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
        <button type="submit" id="submit" class="submit default-button">Submit</button>
    </div>
</form>

<?= generatePageFoot('forms/normalize-date-time.js') ?>