<?php require_once('../../index.php') ?>

<?= generatePageHead('Pharmacy', 'tables.css') ?>

<form class="search-form">
    <span class="search-icon">
        <span class="material-symbols-outlined">
            search
        </span>
    </span>
    <input type="text" placeholder="Search Patient Email" class="input-bar" value="">
    <button class="default-button">Submit</button>
</form>

<div>
    <table class="classic-table highlight">
        <thead>
            <tr>
                <th>Prescription Date</th>
                <th>Time Created</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Drugs Requested</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td class="clip-data">Victor Abraham</td>
                <td class="clip-data">abrahmavictor@gmail.com</td>
                <td class="clip-data">Paracetamol (200 mg), Vitamin C, Visita Plus Cream</td>
                <td class="badge success">
                    <span>finished</span>
                </td>
            </tr>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td class="clip-data">Victor Abraham</td>
                <td class="clip-data">abrahmavictor@gmail.com</td>
                <td class="clip-data">Paracetamol (200 mg), Vitamin C, Visita Plus Cream</td>
                <td class="badge success">
                    <span>finished</span>
                </td>
            </tr>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td class="clip-data">Victor Abraham</td>
                <td class="clip-data">abrahmavictor@gmail.com</td>
                <td class="clip-data">Paracetamol (200 mg), Vitamin C, Visita Plus Cream</td>
                <td class="badge success">
                    <span>finished</span>
                </td>
            </tr>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td class="clip-data">Victor Abraham</td>
                <td class="clip-data">abrahmavictor@gmail.com</td>
                <td class="clip-data">Paracetamol (200 mg), Vitamin C, Visita Plus Cream</td>
                <td class="badge success">
                    <span>finished</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?= generatePageFoot('click-tables.js') ?>