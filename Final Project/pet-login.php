<?php 
require_once('pet-functions.php');
session_start();

$year = date('Y');

//Check if user is already logged in to skip the form
if($logged_in = v_array('is_logged_in', $_SESSION)){
    header('Location: admin.php');
} else {
    // Check if user submitted the login form
    if(v_array('submit', $_POST)){
        $username = v_array('username', $_POST);
        $password = v_array('password', $_POST);  
        $logged_in = log_in($username, $password); 
        
        //Send the logged in user to admin page
        if($logged_in) {
            header('Location: admin.php');
        }
    }
}

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
<head>
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
		<h2>Login</h2>
        <form action="pet-login.php" method="post">
            <p>
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" />
            </p>
            <p>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" />
            </p>
            <input type="submit" name="submit" id="submit" />
        </form>
    </section>
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
</html>