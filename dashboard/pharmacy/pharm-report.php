<?php 

require_once('../../index.php');

$pharmId = $_GET['id'] ?? null;

if ($pharmId === null) {
    header('Location: record-list.php');
    exit;
}

$pharm_details = fetch_database_row($pharmId, 'pharm_id', 'pharmacy');
$patient = fetch_database_row($pharm_details['patient_id'], 'id', 'patients');

$pharmInfo = [
    [
        'title' => 'Patient Name',
        'value' => $patient['full_name']
    ],
    [
        'title' => 'Email Address',
        'value' => $patient['email_address']
    ],
    [
        'title' => 'Gender',
        'value' => $patient['gender']
    ],
    [
        'title' => 'Last Updated',
        'value' => date('d M Y', strtotime($pharm_details['entry_date']))
    ],
    [
        'title' => 'Time',
        'value' => date('h:i A', strtotime($pharm_details['entry_date']))
    ],
    [
        'title' => 'Drugs Requested',
        'value' => $pharm_details['drugs']
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $result = $_POST['cost'];

    $save_query = "UPDATE pharmacy SET finished = true WHERE pharm_id = '$pharmId'";
    save_record($save_query);

    $patientId = $patient['id'];
    $timestamp = date('Y-m-d H:i:s');
    $createPayment = "INSERT INTO payments (payment_id, patient_id, entry_date, amount, reason) VALUES ('$pharmId', '$patientId', '$timestamp', '$result', 'Payment for Drugs')";
    save_record($createPayment);

    header('Location: requests.php');
    exit;
}

?>

<?= generatePageHead('Pharmacy Report', 'forms.css') ?>

<form class="classic-form" method="POST">

    <h2 class="secondary-text">Pharmacy Information</h2>

    <div class="show-info">
    <?php array_map(function ($item) { ?>
        <span>
            <span class="title"><?= $item['title'] ?>:</span>
            <span class="value"><?= $item['value'] ?></span>
        </span>
    <?php }, $pharmInfo) ?> 
    </div>

    <h2 class="secondary-text">Cost of Drugs</h2>
    <input type="number" class="full" name="cost" required placeholder="Input Total Cost (₦)" min="50">

    <div class="button-container">
        <a class="cancel-link" href="requests.php">Cancel</a>
        <button class="submit default-button">Submit</button>
    </div>
</form>

<?= generatePageFoot() ?>