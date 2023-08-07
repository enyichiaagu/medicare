<?php require_once('../../index.php') ?>

<?= generatePageHead('Laboratory Records', 'tables.css') ?>

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
            <tr data-href="ward-report?id=bdj78382gv">
                <th>Date Created</th>
                <th>Time Created</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Gender</th>
                <th>Test Type</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td class="clip-data">Victor Abraham</td>
                <td class="clip-data">abrahmavictor@gmail.com</td>
                <td>Male</td>
                <td>Blood Genotype Test</td>
                <td class="badge success">
                    <span>finished</span>
                </td>
            </tr>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td class="clip-data">Victor Abraham</td>
                <td class="clip-data">abrahmavictor@gmail.com</td>
                <td>Male</td>
                <td>Urinalysis, HPV</td>
                <td class="badge pending">
                    <span>pending</span>
                </td>
            </tr>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td class="clip-data">Victor Abraham</td>
                <td class="clip-data">abrahmavictor@gmail.com</td>
                <td>Male</td>
                <td>Urinalysis</td>
                <td class="badge success">
                    <span>finished</span>
                </td>
            </tr>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td class="clip-data">Victor Abraham</td>
                <td class="clip-data">abrahmavictor@gmail.com</td>
                <td>Male</td>
                <td>Urinalysis</td>
                <td class="badge new">
                    <span>new</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?= generatePageFoot('click-tables.js') ?>

<?= generatePageFoot() ?>