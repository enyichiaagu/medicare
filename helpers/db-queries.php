<?php 

// Connect to the database
$mysqli = new mysqli($hostname, $db_username, $db_password, $database);

function fetch_database_row($id, $column, $table) {
    global $mysqli;
    $query = "SELECT * FROM `$table`";
    $extra = ($id===null && $column===null) ? "" : " WHERE `$column` = '$id'";

    $result = $mysqli->query($query.$extra);

    if (($result->num_rows === 1) && ($extra !== "")) {
        return $result->fetch_assoc();
    } elseif ($result->num_rows > 0) {
        $list = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }
        return $list;
    }
    return false;
}

function save_record($query) {
    global $mysqli;
    $result = $mysqli->query($query);
    return true;
}

?>