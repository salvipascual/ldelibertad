<!DOCTYPE html>
<html>
<head>
	<?php
		$canonical = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'];
		$title = "Súmate a #LdeLibertad";
		$description = "Súmate a miles de cubanos que publican su #LdeLibertad porque quieren vivir en una Cuba libre. Sube tu foto y sé parte del movimiento.";
	?>

	<!-- meta -->
	<title><?= $title ?></title>
	<link rel="canonical" href="<?= $canonical ?>">
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<meta name="description" content="<?= $description ?>">
	<meta name="keywords" content="<?= empty($keywords) ? '' : $keywords ?>">
	<meta name="author" content="Salvi Pascual">

    <!--Social Media Thumbnail-->
    <meta property="og:image" content="<?= $canonical . '/feature.jpg' ?>">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1049">
    <meta property="og:image:height" content="569">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $canonical ?>"/>
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:description" content="<?= $description ?>" />

	<!-- Boostrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mrs+Sheppards&display=swap" rel="stylesheet">

	<!-- Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-86XRDSV4CG"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-86XRDSV4CG');
	</script>
</head>
<body>
	<div class="container-fluid">
		<!-- images -->
		<div class="row">
			<?php 
				$pictures = glob("people/*.*");
				shuffle($pictures);
				foreach ($pictures as $filename) { 
			?>
				<img class="img-fluid col p-0" src="<?= $filename ?>" alt="">
			<?php } ?>
	
			<!-- buttons -->
			<div class="position-fixed text-center text-md-end btn-list">
				<a class="btn btn-join btn-dark btn-lg" target="_blank" href="mailto:LdeLibertad1@gmail.com?subject=Mi imagen&body=Adjunta tu imagen a este correo. Pon tu nombre, dónde vives, y un texto corto explicando por qué quieres libertad en Cuba"><i class="fas fa-plus-square"></i> Súmate</a>
				<a class="btn btn-join btn-dark btn-lg" target="_blank"	href="https://www.instagram.com/ldelibertad1_/"><i class="fab fa-instagram-square"></i></a>
				<a class="btn btn-join btn-dark btn-lg" target="_blank"	href="https://www.facebook.com/profile.php?id=100068017934767"><i class="fab fa-facebook-square"></i></a>
				<a class="btn btn-join btn-dark btn-lg" target="_blank"	href="https://twitter.com/lde_libertad1/"><i class="fab fa-twitter-square"></i></a>
			</div>
		</div>

		<!-- title -->
		<p class="title position-fixed top-50 start-50">#LdeLibertad</p>
	</div>

	<style type="text/css">
		.title {
			font-family: 'Mrs Sheppards', cursive;
			font-size: 13vw;
			color: darkred;
			text-shadow: 5px 5px 20px black;
			-webkit-text-stroke: 3px white;
			margin-right: -50%;
			transform: translate(-50%, -50%);
    	}

		.btn-list {
			width:100%;
			bottom: 20px; 
		}

		.btn-join {
			background-color: darkred;
			border-radius: 25px;
			border: 2px solid white;
			margin-right: 10px;
		}
	</style>

	<!-- font awesome -->
	<script src="https://kit.fontawesome.com/17fb4c8456.js" crossorigin="anonymous"></script>
</body>
</html>
