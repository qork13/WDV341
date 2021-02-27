<?php
require_once('dbConnect.php');

$db_time_format = 'H:i:s';
$db_date_format = 'Y-m-d';

try {
	
$query = 'SELECT name, description, presenter, time, date ';
$query .= 'FROM wdv341_events ';
$query .= 'ORDER BY name';
$queryObj = $conn->prepare($query);
$queryObj->execute();

} catch(PDOException $e) {

echo "Failed to run query!";

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>WDV341 Intro PHP - Select Events</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *,:after,:before {
			-moz-box-sizing:border-box;
			-webkit-box-sizing:border-box;
			box-sizing:border-box
		}
		body {
			font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;
			color:#444;
			text-align:left
		}
		
		h1,h2,h3 {
			font-weight:400
		}
		
		h1 {
			font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;
			text-align:center;
			color:#444;
			margin:0
		}
		h1 span {
			color:#484c9b
		}
		
		h2 {
			font-size:25px;
			line-height:30px;
			color:#484c9b;
			margin:50px 0 10px
		}
		
		h3 {
			font-size:18px;
			line-height:35px;
			margin:50px 0 0
		}
		
		a {
			color:#484c9b;
			text-decoration:none
		}
		
		a:focus,a:hover {
			text-decoration:underline
		}
		
		p {
			margin:0 0 2rem
		}
		
		p span {
			color:#aaa
		}
		
		header {
			width:98%;
			margin:40px auto 0;
			border-bottom:1px solid #ddd;
			padding-bottom:40px;
			text-align:center
		}
		
		header p {
			margin:0
		}
		
		table {
			border:1px solid #eee;
			background:#f9f9f9;
			border-collapse:collapse;
			border-spacing:0;
			margin-bottom:3rem
		}
		
		thead {
			background:#5965af;
			color:#fff
		}
		
		tbody tr td,thead td {
			padding:.5rem .75rem
		}
		
		tbody tr:nth-child(even) {
			background:#efefef
		}
		
		tbody tr td:first-child {
			padding-left:1.25rem
		}
		
		
		
		@media only screen and (min-width:768px) {
			body{font-size:20px;line-height:30px}
			h2{font-size:30px;line-height:45px}
			h3{font-size:22px;line-height:45px;margin-top:50px}
			p{margin-bottom:2rem}
			h1{font-size:60px}
			pre{padding:20px;font-size:15px}
		}
    </style> 
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
		}
		
		.center {
		margin-left: auto;
		margin-right: auto;
		}

		td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
		}	

		tr:nth-child(even) {
		background-color: #dddddd;
		}
	</style>	
</head>
<body>
	<header>
		<h1>WDV341 Intro <span>PHP</span></h1>
		<p>Select Events in table</p>
	</header>
	<h2 style="text-align: center;"> 
            <?=$queryObj->rowCount();?> Events are available today.
    </h2>
	<table class="center">
		<tr>
			<th>Event</th>
			<th>Presenter</th>
			<th>Time</th>
			<th>Date</th>
			<th>Description</th>
		</tr>
	<?php while($result = $queryObj->fetch()) { ?>
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
	</table>
	<?php $conn = null; ?>
</body>
</html>