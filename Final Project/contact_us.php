<?php
    include 'pet-functions.php';
    include 'pet-validation.php';

    $year = date('Y');
    
  $form_submitted = v_array('submit', $_POST);
  $honeypot_value = v_array('do_not_touch', $_POST);
  $valid_form_submission = $form_submitted && !$honeypot_value;
  $error_fname = '';
  $error_lname = '';
  $error_email = '';
  $error_message = '';
  

  if($form_submitted){
    $fname = v_array('firstname', $_POST);
    $lname = v_array('surname', $_POST);
    $email = v_array('email', $_POST);
    $message = v_array('message', $_POST);
    
    

    if(!valid_fname($fname)) {
        $valid_form = false;
        $error_fname = 'Please enter an first
         name';
    }

    if(!valid_lname($lname)){
        $valid_form = false;
        $error_lname = 'Please give a valid last name';
    }

    if(!valid_email($email)){
        $valid_form = false;
        $error_email = 'Please give a valid email';
    }


    if(!valid_message($message)){
        $valid_form = false;
        $error_message = 'Please give a valid message';
    }


    mail($email, 'Pets 2 Go Contact Form Received', 'Thank you for your interest in Pets 2 Go we have received your message and will be responding shortly.');

    
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
 
 
	.page-header{
	background-color: #00ffff;
	padding: 0px;
	}
	
	body {
	overflow-x: hidden;
	background-color: #00ffff;
	}
 
	
  .message {
    justify-content: center !important;
    text-align : center;
  }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    
    /* Set background color, white text and some padding */
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
    
  #do-not-touch{display: none}
  </style>
<head>
<div class="page-header">
<img src= "images/petstogobanner.jpg" alt="petsbanner"width="100%" height="auto">
</div>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid col-xs-12 col-sm-8 col-lg-8">
    <div class="navbar-header">
      <p class="navbar-brand ">Pets To Go</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="-pet-index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="our_pets.php">Our Pets</a></li>
      <li><a href="current_pets.php">Current Pets</a></li>
      <li><a href="pet-login.php">Admin Login</a></li>
      <li><a href="contact_us.php">Contact Us</a></li>
    </ul>
  </div>
</nav>
<?php if($valid_form_submission) { ?>
              <div class="message">
               <h2> Thank you <?=$fname?> <?=$lname?>!!!</h2>
               <p>Your message has been received and we will respond shortly</p>
               <p>A signup confirmation has been sent to: <?=$email?></p>
              </div>
       <?php } elseif ($honeypot_value) {  ?>
        <div class="message">
        <h2>Access Denied!</h2>
        <input type="button" onclick="window.location.href='contact_us.php'"; value="Reload"/>
       </div>
        <?php } else { ?>
        
<?php if(!$valid_form_submission) { ?> 
<form id="contact-form" method="post" action="contact_us.php" role="form">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-xs-12 col-xs-offset-2 col-sm-8 col-lg-8">
                <div class="form-group">
                    <span id="error-fname" class="error"><?=$error_fname?></span>
                    <label for="form_firstname">First name *</label>
                    <input id="form_firstname" type="text" name="firstname" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
		</div>
		<div class="row">
            <div class="col-xs-12 col-xs-offset-2 col-sm-8 col-lg-8">	
                <div class="form-group">
                  <span id="error-lname" class="error"><?=$error_lname?></span>
                    <label for="form_lastname">Last name *</label>
                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-xs-offset-2 col-sm-8 col-lg-8">
                <div class="form-group">
                  <span id="error-email" class="error"><?=$error_email?></span>
                    <label for="form_email">Email *</label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-xs-12 col-xs-offset-2 col-sm-8 col-lg-8">
                <div class="form-group">
                  <span id="error-message" class="error"><?=$error_message?></span>
                    <label for="form_message">Message *</label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-xs-12 col-xs-offset-2 col-sm-8 col-lg-8">
                <input type="submit" class="btn btn-success btn-send" name="submit" value="Send message">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-xs-offset-2 col-sm-8 col-lg-8">
                <p class="text-muted">
                    <strong>*</strong> These fields are required.
            </div>
        </div>
        <input type="text" name="do_not_touch" id="do-not-touch" value=""/> 
    </div>

</form>
<?php } }?>
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
