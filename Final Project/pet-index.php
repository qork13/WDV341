<?php
    include 'pet-functions.php';

    $year = date('Y');

    $events = get_events();
    $db_time_format = 'H:i:s';
    $db_date_format = 'Y-m-d';
    $name = '';
    $presenter = '';
    $description = '';
    $date = '';
    $time = '';
    $result = v_array('result', $_GET);
?>


<!DOCTYPE html>
<html lang="en">
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
	
/*Panel CSS*/
	
.panel-danger {
	border-color: black !important;
}

th {
    text-align: center;
}

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
	        <h3> Welcome to Pets To Go!</h3>
	        <br>
	        <p> Our company was founded in 1996, Pets To Go is a non-profit and Springfield’s only no-kill animal shelter. Since it’s opening Pets to Go has placed an estimated 18,000 homeless cats and dogs in new households. 
		        Pet’s To Go works in conjunction with the Animal Rescue League location services to locate the original owners of lost pets as well as finding new homes for abandoned animals. 
		        Pet’s To Go is relies on donations from United way, private donations, and volunteers to operate this facility.</p>
	    </div>	
        <div class="row">
	        <div class="col-xs-12 col-sm-8 col-lg-8">
	            <div class="panel panel-danger" style="background-color:#80ffff">
	
                    <div class="panel-heading" style=" background-color:#00ffff">
                        <h3 class="panel-title" >
                            <span class="glyphicon glyphicon-calendar"  ></span> 
                            Upcoming Events
                        </h3>
                    </div>

                    <div class="panel-body">
                        <table class="table" id="events">
                        <thead>
		                    <tr>
			                    <th scope="col">Event</th>
			                    <th scope="col">Presenter</th>
			                    <th scope="col">Time</th>
			                    <th scope="col">Date</th>
			                    <th scope="col">Description</th>
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

 
   