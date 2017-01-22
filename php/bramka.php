<?php

	session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

	if(!isset($_SESSION['zalogowany'])) //zwróci TRUE jeśli nie jest ustawiona
	{
		header('Location: ../index.php');
		exit();
	}
?>

<?php
	//require_once '../connects/dbconnect.php';
	include_once('../view/header.php');
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Bramka sms</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="generator" content="Webflow">
	  <link rel="stylesheet" type="text/css" href="../css/normalize.css">
	  <link rel="stylesheet" type="text/css" href="../css/webflow.css">
	  <link rel="stylesheet" type="text/css" href="../css/wyglad_dodatkowy.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
	  <script>
	    WebFont.load({
	      google: {
	        families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Montserrat:400,700"]
	      }
	    });
	  </script>
	  <script type="text/javascript" src="../scripts/modernizr.js"></script>
	  <link rel="shortcut icon" type="image/x-icon" href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico">
	  <link rel="apple-touch-icon" href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png">
</head>

<body class="mine" onload="odliczanie();">

	<?php
if($_SESSION['permision'] === "1"){

	include ('bramka_admin.php');
}else if($_SESSION['permision'] === "2"){
	include ('bramka_administracja.php');

}else{

	include ('bramka_user.php');
}
	 ?>


<div class="uk-grid">
	<div class="uk-width-1-3 uk-width-medium-1-4 sider">
		<div class="sidebar">
		<div class="zegar" id="zegarek">
			</div>
			<div class="ikona">
				<!-- <img src="img/personIcon.png" /> -->
			</div>
			<div class="zalogowana">
				<h2><?php echo "<p>Witaj ".$_SESSION['imie'].'!</p>'?></h2>
			</div>
			<a href="logout.php"><div class="uk-button sidebar-button">Wyloguj</div></a>
			<div class="uk-button sidebar-button">Edytuj Profil</div>
	</div>
</div>
	<div class="uk-width-2-3 uk-width-medium-3-4 bramka">
		<div class="logo_main">
			<img src="../img/logo.jpg" />
		</div>
	<div class="form-container">
		<div class="w-form">

			<form action="sms.php" id="email-form" name="email-form" data-name="Email Form" class="form-flex" method="post">
				<label for="numer">Numer telefonu</label>
				<div class="input-adresy-contaienr">
					<input id="numer" type="text" placeholder="Podaj numery telefonu oddzielone przecinkami" name="numer" data-name="numer" class="w-input input">
					<img src="../img/kontakty.png" data-ix="open-adresy" class="adresyicon">
				</div>

				<label for="wiadomosc">Wiadomosc:</label><div id="charNum">130</div>
				<textarea id="wiadomosc" placeholder="Podaj tresc wiadomosci bez polskich znakow..." name="wiadomosc" data-name="wiadomosc" class="w-input input textarea" onkeyup="countChar(this)" maxlength="160"></textarea>
				<input type="submit" value="Wyslij wiadomosc" data-wait="Prosze czekac..." wait="Prosze czekac..." class="uk-button form-submit">
			</form>

			<div class="w-form-done">
				<p>Dziękuje. Twoja wiadomośc została przesłana.</p>
			</div>
			<div class="w-form-fail">
				<p>Oops! Coś poszło nie tak z wysłaniem wiadomości</p>
			</div>
		</div>
	</div>
</div>


</div>


	<?php

		include_once('../view/footer.php');
	?>
