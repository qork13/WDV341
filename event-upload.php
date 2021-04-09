<?php include_once 'functions.php'; ?>
<?php include_once 'self-posting-form.php'; ?>
<?php
date_default_timezone_set('America/Chicago');

try {
    $conn = db_connect();
    $name = v_array('name', $_POST);
    $description = v_array('description', $_POST);
    $presenter = v_array('presenter', $_POST);
    $date = v_array('date', $_POST);
    $time = v_array('time', $_POST);
    $current_date = date('Y-m-d H:i:s');

    if(!$name || !$description || !$presenter || !$date || !$time) {
        $valid_form = false;
        throw new Exception('Name, description, presenter, date and time are required');
    } else {
        $valid_form = true;
    }
    

    $data = array(
        'name' => $name,
        'description' => $description,
        'presenter' => $presenter,
        'date' => $date,
        'time' => $time,
        'date_inserted' => $current_date,
        'date_updated' => $current_date
    );
    $query = 'INSERT INTO 
        wdv341_events (name, description, presenter, date, time, date_inserted, date_updated) 
        VALUES (:name, :description, :presenter, :date, :time, :date_inserted, :date_updated)';

    $stmt = $conn->prepare($query);
    $result = $stmt->execute($data
);  
} catch(PDOException $e) {
    write_log($e->getMessage());
} catch(Exception $e) {
    write_log($e);

}

$conn = null;
$message = $result ? '?result=success' : '?result=failed';

?>