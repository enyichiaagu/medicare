<?php 

require_once('../../index.php');

$labId = $_GET['id'] ?? null;

if ($labId === null) {
    header('Location: record-list.php');
    exit;
}

$lab_details = fetch_database_row($labId, 'lab_id', 'laboratory');
$patient = fetch_database_row($lab_details['patient_id'], 'id', 'patients');

$labInfo = [
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
        'title' => 'Test Type',
        'value' => $lab_details['lab_tests']
    ],
    [
        'title' => 'Last Updated',
        'value' => date('d M Y', strtotime($lab_details['entry_date']))
    ],
    [
        'title' => 'Time',
        'value' => date('h:i A', strtotime($lab_details['entry_date']))
    ]
];

function checkedRadio($stored, $value) {
    return ($stored == $value) ? 'checked' : null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    $result = $_POST['result'];

    $save_query = "UPDATE laboratory SET lab_status = '$status', result = '$result' WHERE lab_id = '$labId'";
    save_record($save_query);

    header('Location: record-list.php');
    exit;
}

?>

<?= generatePageHead('Lab Report', 'forms.css') ?>

<form class="classic-form" method="POST">

    <h2 class="secondary-text">Laboratory Information</h2>

    <div class="show-info">
    <?php array_map(function ($item) { ?>
        <span>
            <span class="title"><?= $item['title'] ?>:</span>
            <span class="value"><?= $item['value'] ?></span>
        </span>
    <?php }, $labInfo) ?> 
    </div>

    <h2 class="secondary-text">Report Form</h2>

    <div class="radio-box">
        <span class="title">Change Status</span>
        <span>
            <input type="radio" name="status" id="new" value="-1" <?= checkedRadio($lab_details['lab_status'], -1)?>>
            <label for="new">New</label>
        </span>
        <span>
            <input type="radio" name="status" id="pending" value="0" <?= checkedRadio($lab_details['lab_status'], 0)?>>
            <label for="pending">Pending</label>
        </span>
        <span>
            <input type="radio" name="status" id="finished" value="1" <?= checkedRadio($lab_details['lab_status'], 1)?>>
            <label for="finished">Finished</label>
        </span>
    </div>


    <textarea name="result" id="result" rows="3" placeholder="Results (If Available)" class="full"><?= $lab_details['result'] ?></textarea>

    <div class="button-container">
        <a class="cancel-link" href="record-list.php">Cancel</a>
        <button class="submit default-button">Submit</button>
    </div>

</form>

<?= generatePageFoot() ?>