<?php 

// Connect to the database
$mysqli = new mysqli($hostname, $db_username, $db_password, $database);

function fetch_database_row($id, $column, $table) {
    global $mysqli;
    $query = "SELECT * FROM `$table` WHERE `$column` = '$id'";

    $result = $mysqli->query($query);

    if ($result->num_rows === 1) {
        return $result->fetch_assoc();
    }
    return false;
}

function save_record($query) {
    global $mysqli;
    $result = $mysqli->query($query);
    return true;
}

?>