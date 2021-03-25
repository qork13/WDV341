<?php
function v_array($needle, $haystack) {
    if(is_array($haystack) && array_key_exists($needle, $haystack)) {
        return $haystack[$needle];
    }

    return 0;
}


function valid_name($name) {
    if($name == ''){
        return false;
    }
    return true;    
}

function valid_description($description) {
    if($description == ''){
        return false;
    }
    return true; 
}

function valid_presenter($presenter) {
    if($presenter == ''){
        return false;
    }
    return true; 
}

function valid_date($date) {
    if($date == ''){
        return false;
    }
    return true; 
}

function valid_time($time) {
    if($time == ''){
        return false;
    }
    return true; 
}

?>