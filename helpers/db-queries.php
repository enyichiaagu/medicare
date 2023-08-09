<?php 

// Connect to the database
$mysqli = new mysqli($hostname, $db_username, $db_password, $database);

function fetchPatientByEmail($email) {
    global $mysqli;
    $query = "SELECT * FROM patients WHERE email_address='$email'";

    $result = $mysqli->query($query);

    if ($result->num_rows === 1) {
        return $result->fetch_assoc();
    }
    return false;
}

function saveRecord($query) {
    global $mysqli;
    $result = $mysqli->query($query);
    return true;
}

?>