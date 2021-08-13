<?php

// check the email was submitted
if(empty($_POST["email"])) {
	die("Error salvando su correo. Presione atrás e intente nuevamente");
}

// check the selfie was submitted
if(empty($_FILES["selfie"]["name"])) {
	die("Error salvando su selfie. Presione atrás e intente nuevamente");
}

// check the email is valid
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	die("Su correo es inválido. Presione atrás e intente nuevamente");
}

// localize timezone and dates
date_default_timezone_set('America/Havana');

// upload the selfie
$fileName = md5(date("YmdHis") . rand(100000, 999999)) . ".png";
$uploadPath = __DIR__ . "/uploads/" . $fileName;
move_uploaded_file($_FILES['selfie']['tmp_name'], $uploadPath);

// append email to the list
$rowContent = '"'.date("d/m/Y H:i:s").'","'.$fileName.'","'.$_POST["email"].'"' . PHP_EOL;
file_put_contents("emails.csv", $rowContent, FILE_APPEND | LOCK_EX);

// redirect to thank you page
header("Location: /welcome.php?img=$fileName");
