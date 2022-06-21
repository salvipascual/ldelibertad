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
				<a class="btn btn-main btn-dark btn-lg me-1" href="#!" data-bs-toggle="modal" data-bs-target="#cameraModal"><i class="fas fa-plus-square"></i> Súmate</a>
				<a class="btn btn-main btn-dark btn-lg me-1" target="_blank" href="https://www.instagram.com/ldelibertadcuba"><i class="fab fa-instagram-square"></i></a>
				<a class="btn btn-main btn-dark btn-lg me-1" target="_blank" href="https://www.facebook.com/LdeLibertadCuba"><i class="fab fa-facebook-square"></i></a>
				<a class="btn btn-main btn-dark btn-lg" target="_blank" href="https://twitter.com/ldelibertadcuba"><i class="fab fa-twitter-square"></i></a>
			</div>
		</div>

		<!-- title -->
		<p class="title position-fixed top-50 start-50">#LdeLibertad</p>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="cameraModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<!-- video component -->
					<video id="webcam" class="step1 img-fluid" autoplay playsinline></video>

					<!-- canvas to show picture taken -->
					<canvas id="canvas" class="step2 d-none img-fluid"></canvas>

					<!-- form to ask for email -->
					<form id="form" action="/upload.php" class="mt-3 step2 d-none" method="post" enctype="multipart/form-data">
						<label for="email" class="form-label">Escribe tu correo electrónico</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="panchito@gmail.com" required>
						<div id="emailHelp" class="form-text">Nunca enseñaremos ni compartiremos tu correo.</div>
						<input type="file" id="selfie" class="d-none" name="selfie">
					</form>
				</div>
				<div class="modal-footer d-inline-block text-center">
					<a href="#!" class="btn btn-dark btn-main step1" onclick="takePicture()"><i class="fas fa-camera"></i> Tomar Foto</a>
					<a href="#!" class="btn btn-dark step2 d-none" onclick="repeatPicture()"><i class="fas fa-redo"></i> Repetir</a>
					<a href="#!" class="btn btn-dark btn-main step2 d-none" onclick="submitPicture()"><i class="fas fa-paper-plane"></i> Enviar</a>
				</div>
			</div>
		</div>
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

		.btn {
			font-family: sans-serif;
			border: 2px solid white;
			border-radius: 25px;
		}

		.btn-main {
			background-color: darkred;
		}
	</style>

	<!-- extenal scripts -->
	<script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script> <!-- https://bensonruan.com/how-to-access-webcam-and-take-photo-with-javascript/ -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/17fb4c8456.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script type="text/javascript">
		// define variables
		var display = []
		var webcam = null
		var cameraModal = $('#cameraModal').get(0)
		var pictures = <?= json_encode($picturesLoad) ?>

		// add new images when scroll
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

		function openPictureModal() {
			var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
				keyboard: false
			})
			myModal.show()
			webcam.stop()
		}

		function takePicture() {
			// take the picture
			var picture = webcam.snap()

			// convert data url to Blob			
			const blob = dataURItoBlob(picture)

			// create the DataTranfer object
			var dataTranferObj = new DataTransfer()
			dataTranferObj.items.add(new File([blob], "image.png"))

			// set file in the input
			$('#selfie').get(0).files = dataTranferObj.files

			// display image
			$('.step1').addClass('d-none')
			$('.step2').removeClass('d-none')
			webcam.stop()
		}

		function repeatPicture() {
			$('.step2').addClass('d-none')
			$('.step1').removeClass('d-none')
			webcam.start()
		}

		function submitPicture() {
			var email = $('#email').val()

			if(!isEmail(email)) {
				alert("El correo electrónico está en blanco o no es válido")
				return false
			}

			$('#form').submit()
		}

		function dataURItoBlob(dataURI) {
			// convert base64 to raw binary data held in a string
			// doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
			var byteString = atob(dataURI.split(',')[1]);

			// separate out the mime component
			var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]

			// write the bytes of the string to an ArrayBuffer
			var ab = new ArrayBuffer(byteString.length);

			// create a view into the buffer
			var ia = new Uint8Array(ab);

			// set the bytes of the buffer to the correct values
			for (var i = 0; i < byteString.length; i++) {
				ia[i] = byteString.charCodeAt(i);
			}

			// write the ArrayBuffer to a blob, and you're done
			var blob = new Blob([ab], {type: mimeString});
			return blob;
		}

		function isEmail(email) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		}

		// prepare the webcam and canvas to start
		$(document).ready(function() {
			const webcamElement = $('#webcam').get(0)
			const canvasElement = $('#canvas').get(0)
			webcam = new Webcam(webcamElement, 'user', canvasElement)
		})

		// start the camera when modal opens
		cameraModal.addEventListener('show.bs.modal', function (event) {
			webcam.start()
		})

		// stop the camera when modal closes
		cameraModal.addEventListener('hide.bs.modal', function (event) {
			webcam.stop()
		})
	</script>
</body>
</html>
