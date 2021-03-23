<?php
    require_once('deliverEventObject.php');

    function verify_array($needle, $haystack) {
        if(is_array($haystack) && array_key_exists($needle, $haystack)) {
            return $haystack[$needle];
        }

        return false;
    }

   
    $outputObj = new Event();

    {
        $query = "SELECT name, description, presenter, date, time ";
        $query .= "FROM wdv341_events ";
        $query .= "WHERE name = :name ";
        $outputObj = $outputObj->get_events($query);

        


    } 
    


    echo json_encode($outputObj);

?>