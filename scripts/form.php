<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="../favicon.ico">
	<meta name="author" content="">
	<title>Fran Caballero - Software developer</title>
	<link rel="shortcut icon" href="">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
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
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-12">
					<h3>fran<span style="font-weight: 600">caballero</span></h3>
					<p>software developer</p>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-0"></div>
				<div class="col-md-3 col-sm-2 col-xs-0"></div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<ul>
						<li>22 years old</li>
						<li>Software Engineering Student</li>
						<li>University of Cadiz</li>
						<li>Cadiz, Spain</li>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<div class="blue-bar"></div>
	<div class="white-bar"></div>
	
	<section class="parallax section-contact">
		<div class="col-md-2 col-sm-2 col-xs-0"></div>
		<div class="col-md-8 col-sm-8 col-xs-12 contact">
				<h3>Message Status</h3>
				<hr>
				<?php
				header('Content-Type: text/html; charset=UTF-8');
				error_reporting(E_STRICT);
				require_once('class.phpmailer.php');
				include('class.smtp.php');
	ini_set('display_errors', '1');
				$name = utf8_decode($_POST['name']);
				$email = utf8_decode($_POST['email']);
				$subject = utf8_decode($_POST['subject']);
				$message  = $message . 'Name: '.$name.'<br>';
				$message  = $message . 'E-mail: '.$email.'<br><br><hr>';
				$message  = $message . '<h4>' . $subject . '</h4>';
				$message1  = utf8_decode($_POST['message']);
				$message2 = str_replace("\n",'<br>',$message1);
				$message = $message . $message2;
				$message = utf8_encode($message);

				if(isset($_POST['g-recaptcha-response'])){
				  $captcha=$_POST['g-recaptcha-response'];
				}
				if(!$captcha){
				  echo '<p>Please check the the <strong>captcha</strong> form.</p>';
				}
				else {
					$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=YOUR SECRET KEY&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
					if($response.success == false)
					  echo '<p>You are spammer! Get the @$%K out</p>';
					else {
						$mail = new PHPMailer();
						$mail->IsSendmail();
						$mail->SMTPSecure = 'tls';
						$mail->Username = 'fran.caballero.net@gmail.com';
						$mail->Password = 'oleole32';
						$mail->AddAddress('fjcc.92@gmail.com');
						$mail->FromName = $email;
						$mail->Subject = '[francaballero.net] ' . $subject;
						$mail->Body = $message;
						
						if (isset($_FILES['userfile']) &&
							$_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
							echo '<p>File has been successfully attached.</p><br>';
							$mail->AddAttachment($_FILES['userfile']['tmp_name'],
												 $_FILES['userfile']['name']);
						}
						
						$mail->Host = "smtp.gmail.com";
						$mail->Port = 587;
						$mail->IsSMTP();
						$mail->CharSet = 'UTF-8';
						$mail->isHTML(true);
						$mail->SMTPAuth = true;
						$mail->From = $email;
						
						if($mail->Send()) echo '<p>Success.</p><br><p>You will receive a reply in a few days.</p>';
						else echo 'Error: ' . $mail->ErrorInfo;
					}
				}
				?>
				<br><br>
				<button class="btn btn-success btn-large" onclick="goBack()">Go back</button>
			</div>
		</div>
	</section>
	<div class="blue-bar"></div>
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
