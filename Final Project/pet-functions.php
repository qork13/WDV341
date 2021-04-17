<?php 
require_once('pet-connect-pdo.php');

function write_log($log, $location = 'debug.log') {
    error_log(print_r($log, true)."\n\r", 3, $location);
}

function v_array($needle, $haystack) {
    if(is_array($haystack) && array_key_exists($needle, $haystack)) {
        return $haystack[$needle];
    }

    return 0;
}

function set_connection_exception_handler($conn, $e) {
    write_log($e->getMessage(), 'debug.log');
    write_log($conn, 'debug.log');

    header('Location: 505_error_response_page_1.php');
}


function set_statement_exception_handler($stmt, $e) {
    write_log($e->getMessage(), 'debug.log');
    write_log($stmt->errno, 'debug.log');
    write_log($stmt->error, 'debug.log');

    header('Location: 505_error_response_page_2.php');
}

/**
 * Log in the user
 */
function log_in($username, $password) {
    

    try {
        $conn = db_connect();
        $query = "SELECT id FROM wdv341_users where username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch();
        $conn = null;

        $_SESSION['is_logged_in'] = $result ? 1 : 0;

        return $_SESSION['is_logged_in'];

    } catch(PDOException $e) {
        $conn = null;

        write_log('Error:');
        write_log($e);

        return 0;
    }
}

function log_out() {
    // Destroy the session and log the user out
    unset($_SESSION['is_logged_in']);
}

function get_events() {
    // PDO will go here to get events from the DB
    $conn = db_connect();

    $query = "SELECT id, name, description, presenter, date, time
        FROM wdv341_pet_events 
        ORDER BY date ASC";
    $query_obj = $conn->query($query);
    $results = $query_obj->fetchAll(PDO::FETCH_ASSOC);

    $conn = null;

    return $results;
}
?>