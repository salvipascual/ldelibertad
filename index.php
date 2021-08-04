<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>#LdeLibertad</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mrs+Sheppards&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<!-- images -->
		<div class="row">
			<?php foreach (glob("people/*.*") as $filename) { ?>
				<img class="img-fluid col p-0" src="<?= $filename ?>" alt="">
			<?php } ?>
		</div>

		<!-- title -->
		<p class="title position-fixed top-50 start-50">#LdeLibertad</p>

		<!-- button -->
		<a 
			type="button"
			class="btn btn-join btn-dark btn-lg position-fixed px-5 py-2"
			target="_blank"
			href="mailto:salvi@apretaste.org?subject=Mi imagen&body=Adjunta tu imagen a este correo. Pon tu nombre, dónde vives, y un texto corto explicando por qué quieres libertad en Cuba"
		>Agrega tu foto</a>
	</div>

	<style type="text/css">
		.title {
			font-family: 'Mrs Sheppards', cursive;
			font-size: 6em;
			color: darkred;
			text-shadow: 5px 5px 20px black;
			margin-right: -50%;
			transform: translate(-50%, -50%);
    	}

		.btn-join {
			background-color: darkred;
			border-radius: 25px;
			bottom: 20px;
			right: 20px;
			border: 0px;
		}
	</style>
</body>
</html>
