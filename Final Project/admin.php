<?php
include 'pet-validation.php';
include_once 'pet-functions.php';
session_start();

$year = date('Y');
$logout = v_array('logout', $_POST);

$events = get_events();
$db_time_format = 'H:i:s';
$db_date_format = 'Y-m-d';

$valid_form = true;
$honeypot_value = v_array('do_not_touch', $_POST);
$error_presenter = '';
$error_name = '';
$error_description = '';
$error_date = '';
$error_time = '';
$form_submitted = v_array('submit', $_POST);
$name = '';
$presenter = '';
$description = '';
$date = '';
$time = '';
$result = v_array('result', $_GET);
$id = v_array('id', $_GET);

if($form_submitted){
    $name = v_array('name', $_POST);
    $description = v_array('description', $_POST);
    $presenter = v_array('presenter', $_POST);
    $date = v_array('date', $_POST);
    $time = v_array('time', $_POST);
    

    if(!valid_name($name)) {
        $valid_form = false;
        $error_name = 'Please enter an event name';
    }

    if(!valid_description($description)){
        $valid_form = false;
        $error_description = 'Please give an event description';
    }

    if(!valid_presenter($presenter)){
        $valid_form = false;
        $error_presenter = 'Please give an event presenter';
    }


    if(!valid_date($date)){
        $valid_form = false;
        $error_date = 'Please give an event date';
    }

    if(!valid_time($time)){
        $valid_form = false;
        $error_time = 'Please give an event time';
    }


    
}

//If the user is not logged in then send them back to login
if($logout || !v_array('is_logged_in', $_SESSION)){
    if($logout){
        log_out();
    }

    header('Location: pet-login.php');
} 
?>
<!doctype html>
<html>
<head>
 <title>Pets 2 Go</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/petstogo.css">
<script>
    function deleteEventCheck(eventId, eventName) {
        const deleteEvent = confirm('Are you sure you want to delete this event?');

        if(deleteEvent) {
            window.location = 'delete-pet-event.php?id=' + eventId + '&event_name=' + eventName;
        }
    }
</script>
 <style>
 
    .container-fluid {
        width: 150%;
        
    }
	.page-header{
	background-color: #00ffff;
	padding: 0px;
	}
	
	body {
	overflow-x: hidden;
	background-color: #00ffff;
	}
    
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #00ffff;
      color: white;
      padding: 15px;
      
    }
	
	.logo a{
	justify-content: left !important;
	color: black !important;
	}

    
    .center {
        margin-left: auto;
        margin-right: auto;
    }
	
.action {
        height: 20px !important;
        width: 20px !important;
    }
/*Panel CSS*/
	
.panel-danger {
	border-color: black !important;
}

th {
    text-align: center;
}

#do-not-touch{display: none}

#logout{float: right};
.alert {font-size:.875rem;color:#fff;text-align: center;position:fixed;left:0;top:0;width:100%;padding:.5rem 0;}
.alert.success {background:#5cb85c;}
.alert.error {background:#d9534f;}

</style>
<div class="page-header">
<img src= "images/petstogobanner.jpg" alt="petsbanner" width="100%" height="auto">
</div>
</head>
<body>
<?php 
    if($deleted = v_array('deleted', $_GET)) {
        $class = $deleted == 'yes' ? 'success' : 'error';
        $event_name = v_array('event_name', $_GET) ?: 'The event';
        $message = $deleted == 'yes' ? $event_name.' was deleted successfully!' 
        : 'There was an error deleting '.$event_name;

        echo "<div class='alert $class'>$message</div>";
    }

    if($updated = v_array('updated', $_GET)) {
        $class = $updated == 'yes' ? 'success' : 'error';
        $event_name = v_array('event_name', $_GET) ?: 'The event';
        $message = $updated == 'yes' ? $event_name.' was updated successfully!' 
        : 'There was an error updating '.$event_name;

        echo "<div class='alert $class'>$message</div>";
    }

    
    ?>
<nav class="navbar navbar-default">
  <div class="container-fluid col-xs-12 col-sm-8 col-lg-8">
    <div class="navbar-header">
      <p class="navbar-brand ">Pets To Go</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="pet-index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="our_pets.php">Our Pets</a></li>
      <li><a href="current_pets.php">Current Pets</a></li>
      <li><a href="pet-login.php">Admin Login</a></li>
      <li><a href="contact_us.php">Contact Us</a></li>
    </ul>
  </div>
</nav>
<div class="container-fluid text-center">    
    <div class="row content">
    <div class = "col-xs-12 col-sm-8 col-lg-8">
    <section>
    <?php if($valid_form && $form_submitted && !$honeypot_value){ ?>
        <div>
            <h2>Form submission successful!</h2>
            <p>Your event was added</p>
        </div>
         <?php } ?>
        <?php if(!$valid_form && $form_submitted || !$form_submitted || $honeypot_value || $form_submitted) { ?>  
        <div id="form-content">
            <form name="form1" id="form-1" method="post" action="pet-event-upload.php" enctype="multipart/form-data">
                <p>
                    <span id="error-name" class="error"><?=$error_name?></span>
                    <label for="name">Event Name: </label>
                    <input type="text" name="name" id="name" value="<?=$name ? $name : ''?>">
                
                </p>
                <p>
                    <span id="error-description" class="error"><?=$error_description?></span>
                    <label for="description">Event Description: </label>
                    <input type="text" name="description" id="description" value="<?=$description ? $description : ''?>">
                </p>
                <p>
                    <span id="error-presenter" class="error"><?=$error_presenter?></span>
                    <label for="presenter">Event Presenter: </label>
                    <input type="text" name="presenter" id="presenter" value="<?=$presenter ? $presenter : ''?>">
                </p>
                <p>
                    <span id="error-date" class="error"><?=$error_date?></span>
                    <label for="date">Event Date: </label>
                    <input type="date" name="date" id="date" value="<?=$date ? $date : ''?>" placeholder = "ex. 2021-03-04">
                </p>
                <p>
                    <span id="error-time" class="error"><?=$error_time?></span>
                    <label for="time">Event Time: </label>
                    <input type="time" name="time" id="time" value="<?=$time ? $time : ''?>" placeholder = "ex. 18:00:00">
                </p>
                <p>
                    <input type="submit" name="submit" id="submit" value="Submit">
                    <input type="reset" name="Reset" id="button" value="Reset">
                </p>
                <input type="text" name="do_not_touch" id="do-not-touch" value=""/> 
            </form>
        </div>
        <form action="admin.php" method="post">
             <input type="submit" name="logout" id="logout" value="Logout"/>
        </form>
        <?php } ?>
        </div>
        <div class="row">
	        <div class="col-xs-12 col-sm-8 col-lg-8">
	            <div class="panel panel-danger" style="background-color:#80ffff">
	                <div class="panel-body">
                        <table class="table" id="events">
                        <thead>
		                    <tr>
			                    <th scope="col">Event</th>
			                    <th scope="col">Presenter</th>
			                    <th scope="col">Time</th>
			                    <th scope="col">Date</th>
			                    <th scope="col">Description</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
		                    </tr>
                        </thead>
                        <tbody>
	                        <?php foreach($events as $result) { ?>
		                    <tr>
			                    <td><?=$result['name']?></td>
			                    <td><?=$result['presenter']?></td>
			                    <?php $time = DateTime::createFromFormat($db_time_format, $result['time']); ?>
			                    <td><?=$time->format('g:i a')?></td>
			                    <?php $date = DateTime::createFromFormat($db_date_format, $result['date']); ?>
			                    <td><?=$date->format('l M. d, Y')?></td>
			                    <td><?=$result['description']?></td>
                                <td>
                                <a href="update-pet-event.php?id=<?=$result['id']?>" >
                                    <img class="action" src="images/edit.svg" alt="Edit" />
                                 </a>    
                                </td>
                                <td>
                                <a href="javascript:deleteEventCheck('<?=$result['id']?>','<?=$result['name']?>')" >
                                     <img class="action" src="images/delete.svg" alt="Delete" />
                                </a>
                                </td>
		                    </tr>
	                        <?php } ?>
                        </tbody>
	                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 </section>
</body>
<footer class="container-fluid">
<div class="col-xs-12 col-sm-8 col-lg-8">
<img src="images/pawprint.jpg" alt="pawprintlogo" style="float:left; height:100px; width:100px;">
  <p class="footer text-center">Pets To Go Animal Shelter</p>
  <p class="footer text-center">3183 S Veterans Pkwy Springfield, Illinois 62704</p>
  <p class="footer text-center">(217) 698-3091</p>
  <p class="footer text-right">©<?php echo $year?></p>
 </div> 
</footer>
</html>