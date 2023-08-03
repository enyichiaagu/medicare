<?php 

require_once('../../index.php'); 

$fetchRecordsQuery = "SELECT payments.*, patients.full_name, patients.email_address FROM payments INNER JOIN patients ON payments.patient_id=patients.id";
$records = $mysqli->query($fetchRecordsQuery);

if ($records->num_rows > 0) {

    $paymentArray = [];

    while ($row = $records->fetch_assoc()) {
        $paymentArray[] = $row;
    }

    usort($paymentArray, function ($a, $b){
        return strtotime($b['entry_date']) - strtotime($a['entry_date']);
    });
}

function convertToDate($timestamp) {
    $strTime = strtotime($timestamp);
    return date("d M Y", $strTime);
}

function convertToTime($timestamp) {
    $strTime = strtotime($timestamp);
    return date("h:i A", $strTime);
}

function formatAmount($amount) {
    return number_format($amount);
}

?>

<?= generatePageHead('Bursary', 'tables.css') ?>

<h2>Bursary</h2>
<table class="classic-table highlight">
    <thead>
        <tr>
            <th>Date</th>
            <th>Created Time</th>
            <th>Patient Name</th>
            <th>Patient Email</th>
            <th>Payment Type</th>
            <th>Amount</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php array_map(function ($item) { ?>
        <tr title="Click to view details" class="click-item" data-href="<?= 'payment.php?id='.$item['payment_id'] ?>">
            <td><?= convertToDate($item['entry_date']) ?></td>
            <td><?= convertToTime($item['entry_date']) ?></td>
            <td><?= $item['full_name'] ?></td>
            <td><?= $item['email_address'] ?></td>
            <td><?= $item['reason'] ?></td>
            <td>₦ <?= formatAmount($item['amount']) ?></td>
            <td class="badge <?= $item['paid'] ? 'success' : 'error' ?>">
                <span><?= $item['paid'] ? 'Paid' : 'Not Paid' ?></span>
            </td>
        </tr>
    <?php }, $paymentArray) ?>
    </tbody>
</table>

<?= generatePageFoot('click-tables.js') ?>