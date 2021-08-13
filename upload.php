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

// append email to the list
file_put_contents("emails.txt", $_POST["email"] . PHP_EOL, FILE_APPEND | LOCK_EX);

// upload the selfie
$uploadPath = __DIR__ . "/uploads/" . date("YmdHis") . "_" . rand(100, 999) . ".png";
move_uploaded_file($_FILES['selfie']['tmp_name'], $uploadPath);

// redirect to thank you page
// TODO
