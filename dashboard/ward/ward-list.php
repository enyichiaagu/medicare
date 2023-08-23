<?php require_once('../../index.php') ?>

<?= generatePageHead('Ward Patients', 'tables.css') ?>

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
    <table class="classic-table">
        <thead>
            <tr>
                <th>Date Admitted</th>
                <th>Time Admitted</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Gender</th>
                <th>Room Number</th>
                <th>Days Admitted</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td>Victor Abraham</td>
                <td>abrahmavictor@gmail.com</td>
                <td>Male</td>
                <td>C5</td>
                <td>5</td>
            </tr>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td>Victor Abraham</td>
                <td>abrahmavictor@gmail.com</td>
                <td>Male</td>
                <td>C5</td>
                <td>5</td>
            </tr>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td>Victor Abraham</td>
                <td>abrahmavictor@gmail.com</td>
                <td>Male</td>
                <td>C5</td>
                <td>5</td>
            </tr>
            <tr>
                <td>12 Dec</td>
                <td>4:32 PM</td>
                <td>Victor Abraham</td>
                <td>abrahmavictor@gmail.com</td>
                <td>Male</td>
                <td>C5</td>
                <td>5</td>
            </tr>
        </tbody>
    </table>
</div>

<?= generatePageFoot('click-tables.js') ?>