<?php 

require_once('../../index.php');

$paymentId = $_GET['id'] ?? null;

if ($paymentId === null) {
    header('Location: list-payments.php');
    exit;
}

$payment_details = fetch_database_row($paymentId, 'payment_id', 'payments');
$patient = fetch_database_row($payment_details['patient_id'], 'id', 'patients');

$paymentInfo = [
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
        'value' => date('d M Y', strtotime($payment_details['entry_date']))
    ],
    [
        'title' => 'Time',
        'value' => date('h:i A', strtotime($payment_details['entry_date']))
    ],
    [
        'title' => 'Amount',
        'value' => "₦ ".number_format($payment_details['amount']).".00"
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $save_query = "UPDATE payments SET paid = true WHERE payment_id = '$paymentId'";
    save_record($save_query);

    header('Location: list-payments.php');
    exit;
}

?>

<?= generatePageHead('Payment', 'forms.css') ?>

<form class="classic-form" method="POST">

    <h2 class="secondary-text">Payment Information</h2>

    <div class="show-info">
    <?php array_map(function ($item) { ?>
        <span>
            <span class="title"><?= $item['title'] ?>:</span>
            <span class="value"><?= $item['value'] ?></span>
        </span>
    <?php }, $paymentInfo) ?> 
    </div>

    <div class="button-container">
        <a class="cancel-link" href="list-payments.php">Cancel</a>
        <button class="submit default-button">Mark as Paid</button>
    </div>

</form>

<?= generatePageFoot() ?>
