<?php require_once('../index.php') ?>
<?= generatePageHead('Add Patient') ?>

<div class="body">
<form action="">
    <div>
        <h3 class="first"> Personal Information</h3>
            <input type="text" class="personal" id="name" placeholder ="Name">
    </div>

        <input type="date"  id="dob" placeholder="Date of Birth">
        <!-- Gender -->
        <select id="gender" name="gender">
            <option value="" disabled selected>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <br>

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
    <h3>Identification Details</h3>
            <input type="text" id="address" placeholder ="Residential Address">
            <input type="tel" id="phone" placeholder ="Phone Number">
            <input type="email" id="email" placeholder ="Email">

    <h3>Emergency Contact Information</h3>
            <input type="text" id="nextOfKinName" placeholder ="Next of Kin's Name">
            <input type="tel" id="nextOfKinPhone" placeholder ="Next of Kin's Phone Number">

    <h3>Medical History (Checkbox for the following conditions)</h3>
            <label> <input type="checkbox" class="custom-checkbox" name="condition" value="diabetics">Diabetics</label>
            <label> <input type="checkbox" class="custom-checkbox" name="condition" value="high blood pressure">High Blood Pressure</label>
            <label> <input type="checkbox" class="custom-checkbox" name="condition" value="asthma">Asthma</label>
            <label> <input type="checkbox" class="custom-checkbox" name="condition" value="arthritis">Arthritis</label>
            <label> <input type="checkbox" class="custom-checkbox" name="condition" value="stroke">Stroke</label>

            <input type="text" id="others" placeholder ="Others">
            <input type="text" id="allergies" placeholder ="Allergies (optional)">

            <div class="submit">
                <input type="submit" id="submit" value="Submit">
            </div>


    

</form>
</div>
    <!-- <script>
    //JavaScript code to set the placeholder text
    const dobInput = document.getElementById("dob");
    dobInput.addEventListener("focus", function () {
        this.setAttribute("placeholder", "Date of Birth");
    });

    dobInput.addEventListener("blur", function() {
        this.removeAttribute("placeholder");
    });
    </script> -->
        


<?= generatePageFoot() ?>