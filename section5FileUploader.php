<?php include 'functions.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Section 5 Form Uploader</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
	<?php if($uploaded = v_array('uploaded', $_GET)) {
		if($uploaded != 1) {
	?>
		<p style="color: red;">Upload Failed!!!!</p>
		<?php } else {
	?>
		<p style="color: blue;">Upload Successful!!</p>
	<?php
		}
	}
	?>
		
<form action="file_upload.php" method="post" enctype="multipart/form-data">
		<p>Upload File</p>
		<p><input type="file" name="file_upload" id="file-upload"></p>
		<p><input type="submit" value="Upload"></p>
</form>
</body>
</html>