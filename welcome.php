<!DOCTYPE html>
<html>
<head>
	<?php
		$image = $_GET["img"] ?? false;
	?>

	<!-- Meta -->
	<title>Gracias por sumarte</title>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<meta name="author" content="Salvi Pascual">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	<link rel="icon" type="image/png" sizes="16x16" href="/icons/16x16.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/icons/32x32.png">
	<link rel="icon" type="image/png" sizes="64x64" href="/icons/64x64.png">
	<link rel="icon" type="image/png" sizes="128x128" href="/icons/128x128.png">
	<link rel="icon" type="image/png" sizes="256x256" href="/icons/256x256.png">
	<link rel="icon" type="image/png" sizes="500x500" href="/icons/500x500.png">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Knewave&display=swap" rel="stylesheet">

	<!-- boostrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- font awesome -->
	<script src="https://kit.fontawesome.com/17fb4c8456.js" crossorigin="anonymous"></script>

	<!-- Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-86XRDSV4CG"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-86XRDSV4CG');
	</script>

	<style type="text/css">
		h1 {
			font-family: 'Knewave', cursive;
			color: darkred;
			text-shadow: 5px 5px 20px black;
			-webkit-text-stroke: 1px white;
		}

		.btn {
			font-family: sans-serif;
			border: 2px solid white;
			border-radius: 25px;
		}

		.btn-main {
			background-color: darkred;
		}
	</style>
</head>
<body>
	<!-- facebook sdk -->
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v11.0&appId=1790556551215273&autoLogAppEvents=1" nonce="23tn9ovn"></script>
	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

	<div class="container">
		<div class="row pt-5">
			<div class="col-12 col-md-7 col-lg-8">
				<h1 class="mb-3">¡Bienvenido al movimiento #LdeLibertad!</h1>

				<p>Ya somos miles de cubanos pidiendo libertad, y estamos super contentos de agregarte a la lista. Pondremos tu foto en la página en las próximas 72 horas.</p>

				<p>Por ahora, sería genial si puedes <b>compartir en las redes usando ambos botones a continuación</b>, para sumar a todos los 11M de cubanos.</p>

				<div class="mb-3">
					<span class="fb-share-button d-block mb-2" data-href="https://www.ldelibertad.com/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.ldelibertad.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></span>
					<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="Me sumo a la campaña #LdeLibertad porque quiero vivir en una Cuba libre. Sube tu foto y únete a todos los cubanos que pensamos así." data-url="https://www.ldelibertad.com" data-via="ldelibertadcuba" data-lang="es" data-show-count="false">Tweetear</a>
				</div>
			</div>
			<div class="col-12 col-md-5 col-lg-4">
				<img class="img-fluid rounded" src="/uploads/<?= $image ?>" alt="Tu foto"/>
			</div>
		</div>
	</div>
</body>
</html>
