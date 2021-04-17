<?php 
date_default_timezone_set('America/Chicago');
include 'pet-functions.php';

if(v_array('update', $_POST)){
    require_once('connect-pdo.php');
    $event_id = v_array('event_id', $_POST);
    $event_name = v_array('event_name', $_POST);
    $current_date = date('Y-m-d H:i:s');
    $result_url = "admin.php?event_name=$event_name&updated";
    try {
    
        $conn = db_connect();
        $data = array(
            'name'=> v_array('name', $_POST),
            'description'=> v_array('description', $_POST),
            'presenter'=> v_array('presenter', $_POST),
            'date'=> v_array('date', $_POST),
            'time'=> v_array('time', $_POST),
            'date_updated'=> $current_date,
            'id' => $event_id
        );

        $query = 'UPDATE wdv341_pet_events ';
        $query .= 'SET name = :name, description = :description, presenter = :presenter, ';
        $query .= 'date = :date, time = :time, date_updated = :date_updated ';
        $query .= 'WHERE id = :id';
        $stmt = $conn->prepare($query);
        $stmt->execute($data);
        $conn = null;

        header("Location: $result_url=yes");
    } catch(PDOException $e){
        $conn = null;
        write_log($e->getMessage());
        header("Location: $result_url=no");
    }
}

$event_id = v_array('id', $_GET);
$db_time_format = 'H:i:s';
$db_date_format = 'Y-m-d';

$conn = db_connect();
$query = 'SELECT id, name, description, presenter, time, date ';
$query .= 'FROM wdv341_pet_events ';
$query .= 'WHERE id = :id';
$queryObj = $conn->prepare($query);
$queryObj->bindValue(':id', $event_id);
$queryObj->execute();
$result = $queryObj->fetch(PDO::FETCH_ASSOC);
$conn = null;
?>
<!DOCTYPE html>
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

</style>
<div class="page-header">
<img src= "images/petstogobanner.jpg" alt="petsbanner" width="100%" height="auto">
</div>
</head>
<body>
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
        <form action="update-pet-event.php" method="post">
            <p>Name<br>
            <input type="text" name="name" id="name" value="<?=$result['name']?>" /></p>
            <p>Description<br>
            <input type="text" name="description" id="description" value="<?=$result['description']?>" /></p>
            <p>Presenter<br>
            <input type="text" name="presenter" id="presenter" value="<?=$result['presenter']?>" /></p>
            <p>Date<br>
            <input type="date" name="date" id="date" value="<?=$result['date']?>" /></p>
            <p>Time<br>
            <input type="time" name="time" id="time" value="<?=$result['time']?>" /></p>

            <input type="hidden" name="event_id" id="event-id" value="<?=$event_id?>" />
            <input type="hidden" name="event_name" id="event-name" value="<?=$result['name']?>" />

            <input type="submit" name="update" id="update" value="Update Event" />
        </form>
    </section>
</div>
</div>
</div>
</body>
</html>