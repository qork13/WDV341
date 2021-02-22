<?php include 'functions.php'; ?>
<?php
$file_data = $_FILES['file_upload'];
$temp_name = $file_data['tmp_name'];
$name = $file_data['name'];
$destination = 'uploads';


$file_uploaded = move_uploaded_file($temp_name, "$destination/$name");
$uploaded = $file_uploaded ?: 0;

header("Location: section5FileUploader.php?uploaded=$uploaded");




?>