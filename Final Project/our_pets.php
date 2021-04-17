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
			<h2><strong>Our Pets are looking for someone like you!</Strong></h2>
				<p>Because of tough economic times, fewer people can afford to keep their pets. So the number of homeless animals in and around Springfield is increasing dramatically.
				   Pets to Go is a nonprofit, no-kill animal shelter serving the Springfield area. Our mission is to give these homeless animals a second chance through our rescue, shelter, and adoption programs.
				   We were founded in 1990 with a few simple goals: save and place cats and dogs in new homes, and educate the public about spaying and neutering their pets.
				   We’re now one of the largest no-kill shelters in the state! Each year, Pets to Go helps more than 1,300 cats and dogs find permanent homes.</p>
			<br>
			<br>
			<br>	
			<h4><strong>VOLUNTEERS:</strong></h4>
				<p> We can always use a hand! You can help by caring for our homeless cats and dogs, keeping the shelter clean, helping us raise funds, or fostering pets. 
					Find out about becoming a Pets to Go volunteer by giving sending us a message via our contact us page in the sidebar. If you would like to volunteer you can 
					also click the Volunteer link in the sidebar and send us a form to let us know what days work best for you!</p>
			<br>
				<h4><strong>SPAY/NEUTER CLINIC:</strong></h4>
				<p>Spaying or neutering your pet is the best way to stop the flood of homeless animals in Springfield. Our modern spay and neuter clinic has a top-notch professional team.</p>
			<br>
				<h4><strong>ANIMAL RESCUE:</strong></h4>
				<p>Our animals come from overcrowded area shelters, local families that can no longer care for their dog or cat, and rescue groups throughout the state. 
					We give homeless, abandoned, and sometimes abused animals a second chance at a healthy, happy life with a caring guardian.</p>
			<br>
				<h4><strong>REHABILITATION:</strong><h4>
				<p>Pets to Go retrains animals with behavioral problems to be better companions in their new homes. And after the adoption, we’re here to help with behavior consultations, training classes, and more.</p>
			<br>
			<br>
			<br>
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