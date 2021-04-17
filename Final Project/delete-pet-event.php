<?php 
require_once('pet-functions.php');
require_once('pet-connect-pdo.php');

$event_id = v_array('id', $_GET);
$event_name = v_array('event_name', $_GET);
$result_url = "admin.php?event_name=$event_name&deleted";

try {
    $conn = db_connect();
    $query = "DELETE FROM wdv341_pet_events WHERE id = :event_id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':event_id', $event_id);
    $stmt->execute();
    $conn = null;

    header("Location: $result_url=yes");

} catch(PDOException $e) {
    $conn = null;
    write_log($e->getMessage());
    header("Location: $result_url=no");
}
?>