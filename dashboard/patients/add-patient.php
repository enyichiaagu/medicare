<?php require_once('../../index.php') ?>

<?= generatePageHead('Add New Patient', 'forms.css') ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" class="classic-form">

    <h2 class="secondary-text"> Personal Information</h2>
    <input type="text" class="full" id="name" placeholder ="Full Name">
    <div class="split">
        <input type="date" id="dob">
        <!-- Gender -->
        <select id="gender" name="gender">
            <option value="" disabled selected>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    <div class="split">
        <!-- Genotype -->
        <select id="genotypeSelection">
            <option value="" disabled selected>Genotype</option>
            <option value="AA">AA</option>
            <option value="AS">AS</option>
            <option value="AC">AC</option>
            <option value="SS">SS</option>
        </select>
        <!-- bloodGroup -->
        <select id="bloodGroup">
            <option value="" disabled selected>Blood Group</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>
    </div>

    <h2 class="secondary-text">Identification Details</h2>
    <input type="text" id="address" placeholder ="Residential Address" class="full">
    <div class="split">
        <input type="tel" id="phone" placeholder ="Phone Number">
        <input type="email" id="email" placeholder="Email">
    </div>

    <h2 class="secondary-text">Emergency Contact Information</h2>
    <div class="split">
        <input type="text" id="nextOfKinName" placeholder ="Next of Kin's Name">
        <input type="tel" id="nextOfKinPhone" placeholder ="Next of Kin's Phone Number">
    </div>
    <h2 class="secondary-text">Medical History</h2>
    <div class="split">
        <label> <input type="checkbox" class="custom-checkbox" name="condition" value="diabetics">Diabetics</label>
        <label> <input type="checkbox" class="custom-checkbox" name="condition" value="high blood pressure">High Blood Pressure</label>
        <label> <input type="checkbox" class="custom-checkbox" name="condition" value="asthma">Asthma</label>
        <label> <input type="checkbox" class="custom-checkbox" name="condition" value="arthritis">Arthritis</label>
        <label> <input type="checkbox" class="custom-checkbox" name="condition" value="stroke">Stroke</label>
    </div>
    <input type="text" id="others" placeholder ="Others" class="full">
    <textarea type="text" id="allergies" placeholder ="Allergies (optional)" class="full"></textarea>
    <div class="button-container">
        <button type="submit" id="submit" class="submit">Submit</button>
    </div>
</form>

<?= generatePageFoot() ?>