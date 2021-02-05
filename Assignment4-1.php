<?php
	date_default_timezone_set('America/Chicago');
	
	function localDateFormat($timestamp) {
		$date = date_create($timestamp);
		return date_format($date, "m/d/Y");
	}
	
	function internationalDateFormat($timestamp) {
		$date = date_create($timestamp);
		return date_format($date, "d/m/Y");
	}
	
	function stringFunction($inString) {
		$length = strlen($inString);
		$lower = strtolower($inString);
		$charCount = 0;
		$matches = array();
		
		if(preg_match_all("/[A-Z]/", $inString, $matches) > 0) {
			foreach($matches[0] as $match) { $charCount += strlen($match); }
		}
		
		
		echo "<br>Length: ".$length."<br> Trimmed: ".trim($inString)."<br> Lower Case: ".$lower."<br> UpperCase count: ".$charCount;
		
		
	}
	
	function phoneNumber($inPhone) {
			$areaCode = substr($inPhone, 0, 3);
			$countyCode = substr($inPhone, 3, 3);
			$privateCode = substr($inPhone, 6, 4);
			
			echo $areaCode."-".$countyCode."-".$privateCode;
	}
	
	function currencyFormat($inDollars) {
		echo "$".number_format($inDollars, 2);
	}

?>


<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>WDV341 Intro PHP</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}h1,h2,h3{font-weight:400}h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}h1 span{color:#484c9b}h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}h3{font-size:18px;line-height:35px;margin:50px 0 0}a{color:#484c9b;text-decoration:none}a:focus,a:hover{text-decoration:underline}p{margin:0 0 2rem}p span{color:#aaa}header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}header p{margin:0}section{width:95%;max-width:910px;margin:40px auto}pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}thead{background:#5965af;color:#fff}tbody tr td,thead td{padding:.5rem .75rem}tbody tr:nth-child(even){background:#efefef}tbody tr td:first-child{padding-left:1.25rem}tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}tbody tr td:last-child,thead td:last-child{width:50%}@media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}
    </style>
</head>

<body>

<p>This is problem number 1: <?php echo "Local Date Format: ".localDateFormat("2018-05-15"); ?></p>
<p>This is problem number 2: <?php echo "International Date Format: ".internationalDateFormat("05/15/2018"); ?></p>
<p>This is problem number 3: <?php echo stringFunction(" DMACC learning   "); ?></p>
<p>This is problem number 4: Phone Number: <?php echo phoneNumber("1234567890"); ?></p>
<p>This is problem number 5: <?php echo currencyFormat("123456"); ?></p>


</body>

</html>