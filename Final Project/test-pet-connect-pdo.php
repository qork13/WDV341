<?php 
require_once('pet-functions.php');

function db_connect() {
    $serverName = '127.0.0.1';
    $db_username = 'root';
    $db_password = '';
    $database = 'wdv341';

    try {
        $conn = new PDO("mysql:host=$serverName; dbname=$database;", $db_username, $db_password);

        // Set the PDO error mode to exception
        // ATTR_ERRMODE: Error Reporting type, ERRMODE_EXCEPTION: Throw Exceptions
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        return $conn;
    } catch(PDOException $e) {
        // write_log('Connection Failed', 'debug.log');
        // write_log($e->getMessage(), 'debug.log');

        set_connection_exception_handler($conn, $e);
    }
}
?>