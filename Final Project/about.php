<?php
    include 'pet-functions.php';

    $year = date('Y');
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
    
  
    
    /* Set background color, white text and some padding */
    footer {
      background-color: #00ffff;
      color: white;
      padding: 15px;
    }
	
	.logo a{
	justify-content: left !important;
	color: black !important;
	}
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
<head>
<div class="page-header">
<img src= "images/petstogobanner.jpg" width="100%" height="auto">
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
 <div class = "col-xs-12 col-sm-8 col-lg-8">
	<h2><strong>About Pets To Go</Strong></h2>
	<p>Founded in 1996 we are Springfield’s only no-kill animal shelter. Since it’s opening Pets to Go has placed an estimated 18,000 homeless cats and dogs in new households. 
		Where do these animals come from? 40% are owner surrenders and the other 60% are animals we rescue from shelters that euthanize.We have a dedicated staff of 15 (half are part-time).
		And our 200-plus volunteers are our backbone (thank you volunteers and donors!). Many of the rescued animals who come to Pets to Go get more love and attention in our shelter than they’ve ever known before. 
		Our shelter continues to grow and improve. Drop by and get to know us better or if you would like to donate or volunteer please click the corresponding links on the sidebar!</p>
	<br>	
	<br>
	<br>
	<br>
	<h3><strong>Hours of Operation</strong></h3>
	<p>Sunday: 12:00 noon to 5:00 pm</p>
	<p>Monday – Thursday: 10:00 am to 7:00 pm</p>
	<p>Friday: 10:00 am to 4:00 pm</p>
    <p>Saturday: 9:00 am to 5:00 pm</p>
</div>
</div>
</div>
</body>
<footer class="container-fluid">
<div class="col-xs-12 col-sm-8 col-lg-8">
<img src="images/pawprint.jpg" alt="pawprintlogo" style="float:left; height:100px; width:100px;">
  <p class="footer text-center">Pets To Go Animal Shelter</p>
  <p class="footer text-center">3183 S Veterans Pkwy
	 Springfield, Illinois 62704</p>
  <p class="footer text-center">(217) 698-3091</p>
  <p class="footer text-right">©<?php echo $year?></p>
 </div> 
</footer>