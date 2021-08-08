<!DOCTYPE html>
<html>
<head>
	<?php
		$canonical = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'];
		$title = "Súmate a #LdeLibertad";
		$description = "Súmate a miles de cubanos que publican su #LdeLibertad porque quieren vivir en una Cuba libre. Sube tu foto y sé parte del movimiento.";

		// TODO cache array for one hour
		$pictures = glob("people/*.*");

		shuffle($pictures);

		$picturesInit = array_slice($pictures, 0, 20);
		$picturesLoad = array_slice($pictures, 20);
	?>

	<!-- Meta -->
	<title><?= $title ?></title>
	<link rel="canonical" href="<?= $canonical ?>">
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<meta name="description" content="<?= $description ?>">
	<meta name="keywords" content="<?= empty($keywords) ? '' : $keywords ?>">
	<meta name="author" content="Salvi Pascual">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	<link rel="icon" type="image/png" sizes="16x16" href="/icons/16x16.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/icons/32x32.png">
	<link rel="icon" type="image/png" sizes="64x64" href="/icons/64x64.png">
	<link rel="icon" type="image/png" sizes="128x128" href="/icons/128x128.png">
	<link rel="icon" type="image/png" sizes="256x256" href="/icons/256x256.png">
	<link rel="icon" type="image/png" sizes="500x500" href="/icons/500x500.png">

	<!--Social Media Thumbnail-->
	<meta property="og:image" content="<?= $canonical . '/feature.png' ?>">
	<meta property="og:image:type" content="image/png">
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
	<link href="https://fonts.googleapis.com/css2?family=Knewave&display=swap" rel="stylesheet">

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
		<div id="images" class="row row-cols-2">
			<?php foreach ($picturesInit as $filename) { ?>
				<img class="img-fluid col-sm col-lg-3 p-0" src="<?= $filename ?>" alt="">
			<?php } ?>
	
			<!-- buttons -->
			<div class="position-fixed text-center text-md-end btn-list">
				<a class="btn btn-join btn-dark btn-lg me-1" target="_blank" href="mailto:LdeLibertad1@gmail.com?subject=Mi foto de libertad&body=Adjunta un selfie con la L de libertad, y (si lo deseas) pon tu nombre, dónde vives, y un texto corto diciendo por qué quieres libertad"><i class="fas fa-plus-square"></i> Súmate</a>
				<a class="btn btn-join btn-dark btn-lg me-1" target="_blank" href="https://www.instagram.com/ldelibertad1_/"><i class="fab fa-instagram-square"></i></a>
				<a class="btn btn-join btn-dark btn-lg me-1" target="_blank" href="https://www.facebook.com/profile.php?id=100068017934767"><i class="fab fa-facebook-square"></i></a>
				<a class="btn btn-join btn-dark btn-lg" target="_blank" href="https://twitter.com/lde_libertad1/"><i class="fab fa-twitter-square"></i></a>
			</div>
		</div>

		<!-- title -->
		<p class="title position-fixed top-50 start-50">#LdeLibertad</p>
	</div>

	<style type="text/css">
		.title {
			font-family: 'Knewave', cursive;
			font-size: 13vw;
			color: darkred;
			text-shadow: 5px 5px 20px black;
			-webkit-text-stroke: 1px white;
			margin-right: -50%;
			transform: translate(-50%, -50%);
		}

		.btn-list {
			width:100%;
			bottom: 20px; 
		}

		.btn-join {
			font-family: sans-serif;
			background-color: darkred;
			border-radius: 25px;
			border: 2px solid white;
		}
	</style>

	<!-- font awesome -->
	<script src="https://kit.fontawesome.com/17fb4c8456.js" crossorigin="anonymous"></script>

	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script type="text/javascript">
		var display = [];
		var pictures = <?= json_encode($picturesLoad) ?>;

		$(window).on("scroll", function() {
			if(pictures.length > 0 && amountscrolled() > 70) {
				display = pictures.slice(0, 12)
				pictures = pictures.slice(13)
				display.forEach(function(item){
					$('#images').append('<img class="img-fluid col-sm col-lg-3 p-0" src="'+item+'" alt="">')
				})
			}
		})

		function amountscrolled(){
			var winheight = $(window).height()
			var docheight = $(document).height()
			var scrollTop = $(window).scrollTop()
			var trackLength = docheight - winheight
			var pctScrolled = Math.floor(scrollTop/trackLength * 100)
			return pctScrolled
		}
	</script>
</body>
</html>
