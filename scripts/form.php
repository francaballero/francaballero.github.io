<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Fran Caballero - Personal page</title>
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" href="../styles/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
		function goBack() {
			window.history.back()
		}
	</script>
</head>

<body>
	<header>
		<h1>fran<span style="font-weight: 900">caballero</span></h1>
		<h4>software developer</h4>
	</header>
	<section id="cuerpo">
		<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
		<!-- Inicio PHP -->
		<div style="width: 400px; margin: 150px auto 150px auto; text-align: center; border: 1px solid #dddddd; border-radius: 5px; background: #f5f5f5; padding-bottom: 20px">
			<h3>Estado de la solicitud</h3>
			<hr>
			<?php
			header('Content-Type: text/html; charset=UTF-8');
			error_reporting(E_STRICT);
			require_once('class.phpmailer.php');
			include('class.smtp.php');
			$name = utf8_decode($_POST['name']);
			$email = utf8_decode($_POST['email']);
			$horas = utf8_decode($_POST['Horas']);
			$subject = utf8_decode($_POST['subject']);
			$message = utf8_decode($_POST['message']);
			$message = 'Mensaje recibido en francaballero.net: <br><br>';
			$message  = $mensaje . 'Nombre: '.$nombre.'<br>';
			$message  = $mensaje . 'Email: '.$name.'<br><hr><br>';
			$message  = $mensaje . utf8_decode($_POST['message']);
			 $mail = new PHPMailer();
				$mail->SMTPSecure = 'tls';
				$mail->Username = "fran.caballero.net@gmail.com";
				$mail->Password = "oleole32";
				$mail->AddAddress("fjcc.92@gmail.com);
				$mail->FromName = $email;
				$mail->Subject = $subject;
				$mail->Body = $message;
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 587;
				$mail->IsSMTP();
				$mail->CharSet = 'UTF-8';
				$mail->isHTML(true);
				$mail->SMTPAuth = true;
				$mail->From = $email;
				if($mail->Send()) echo 'Sucess<br>You will receive a reply in a few days.';
				else echo 'Error: ' . $mail->ErrorInfo;
			?>
			<br><br><br>
			<button class="btn btn-success btn-large" onclick="goBack()">Go back</button>
		</div>
		<!-- Fin PHP -->
		<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	</section>
	<br><br><br>
	<!--
	<footer>
		<br>
		<br>
		<br>
		<div class="col-md-9 col-sm-9 col-xs-6"></div>
		<div class="col-md-3 col-sm-3 col-xs-6" style="border-left: 1px solid #308ddd">
			<a href="mailto:fjcc.92@gmail.com" style="padding-left: 15px">fjcc.92@gmail.com</a>
		</div>
	</footer>
	-->
</body>

</html>
