<?php 
require_once('event-db-connect.php');
function write_log($log, $location = 'debug.log') {
    error_log(print_r($log, true)."\n\r", 3, $location);
}

/**
 * Validate array by making sure that the data we're working with is in fact an array
 * and that the key we're searching for exists
 */
function v_array($needle, $haystack) {
    if(is_array($haystack) && array_key_exists($needle, $haystack)) {
        return $haystack[$needle];
    }

    return 0;
}

function get_events() {
    // PDO will go here to get events from the DB
    $conn = db_connect();

    $query = "SELECT name, description, presenter, date, time
        FROM wdv341_events 
        ORDER BY name";
    $query_obj = $conn->query($query);
    $results = $query_obj->fetchAll(PDO::FETCH_ASSOC);

    $conn = null;

    return $results;
}
?>
