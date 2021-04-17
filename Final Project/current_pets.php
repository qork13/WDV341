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
	  width: 150%;
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

 .left,
.middle,
.right { 
	padding: 30px;
}

* {
box-sizing:border-box;
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container-fluid text-center"> 
	<div class="row">
	<div class="col-xs-12 col-xs-offset-2 col-sm-8 col-lg-8">
		<h3>Please fill out the contact us form by clicking the link below if you are interested in adopting any of our pets</h3>
		<p><a href="contact_us.php">Contact Us</a></p>
	</div>
   </div>
   <div class="row"> 	
    <div class="left col-xs-12 col-sm-4 col-lg-4"> 
	 <div class="post">
      <h3>SNOWBALL & SALLY:  6 months old, spayed female domestic shorthairs, 4 lbs. (Snowball) and 5 lbs. (Sally)</h3>
		<p>If you’re looking to bring some love and joy into your home, look no further than these two girls. They’re 6-month-old rescues—amazingly sweet and loving. 
		   They’re affectionate (big-time purrers and cuddlers), playful, and endlessly entertaining. They are also healthy, have had their shots, have been spayed, and are litterbox trained. 
		   Because they’ve bonded to each other, we’d like to keep them together.</p>
	  <img class="animal" src="images\kittens.jpg" class="img-circle"height="200" width="200">	
	 </div> 
	</div>
	<div class="middle col-xs-12 col-sm-4 col-lg-4">	
	 <div class="post">
	  <h3>Astro:  2 years old, neutered male, domestic shorthair, 11 lbs</h3>
	  <p>Astro can thank his lucky stars, because after a car hit him, he made it out of the vet hospital in Springfield and found a temporary home with us. Astro’s a little nervous, but once he settles down, he loves people to pet him. He’s lean and lanky, and even though we think he’s fit to run a kitty marathon, he weighs almost 12 pounds!
		 Astro is a sweetheart, but he’s very scared right now. Come meet with him and see what a great guy he can be. Maybe you can give him his forever home!</p>
	  <p>For information about Astro, call Jessica at Pets to Go: (555) 555-5555.</p>
	  <img class="animal" src="images\astro.jpg" class="img-circle" height="200" width="200">
	 </div> 
	</div>
	<div class="right col-xs-12 col-sm-4 col-lg-4">	
	 <div class="post">
	  <h3>CINDY: 3 years old, spayed female, Shepherd mix, 40 lbs.</h3>
	  <p>Cindy came to us because her family was splitting up. She’s never gotten the attention a young dog needs.
		 Cindy is super playful. She loves toys, and her favorite game is fetch. She’s a smart cookie and adapts well to positive training. 
		 She already knows “sit,” “down,” “stay,” “shake,” and “sit pretty,” and she’s learning more fun tricks like “roll over.” 
		 Cindy is house-trained, rides well in the car, and enjoys being brushed and groomed. She behaves well around the house and respects her boundaries.
		 This special girl needs an adult-only home with people who have experience with large dogs, so she can continue to develop into a well-adjusted dog. 
		 Cindy needs someone who’ll give her very clear rules, lots of love, and plenty of exercise. In return, she’ll be your loyal friend for life.</p>
	  <img class="animal" src="images\cindy.jpg" class="img-circle" height="200" width="200">
	 </div> 
	</div>
 </div>
</div>
</body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
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