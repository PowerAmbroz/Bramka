<?php

	session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jeśli zalogowany jest ustawiony i zalogowany jest prawdziwy to skocz od razu do bramka.php
	{
		header('Location: php/bramka.php');
		exit();//pomija resztę dokumentu
	}

// include("view/header.php");
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Bramka sms</title>
	<meta name="description" content="bramka sms"/>
	<meta name="keywords" content="bramka, sms"/>
	<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome=1"/>
	<link rel="stylesheet" href="css/uikit.min.css">
	<link rel="stylesheet" href="css/style.css">



	    <script src="http://code.jquery.com/jquery-1.5.js"></script>
</head>

<body>
<div class="uk-container">
	<div class="uk-grid">
		<div class="uk-width-1-1 logo"><img src="img/logo.jpg"/></div>
		<div class="uk-width-medium-1-2 telefon"><img src="img/telefon.jpg"/></div>
		<div class="uk-width-medium-1-2 form_handler">
<form class="uk-form form_login" action="php/zaloguj.php" method="post">
 <input class="login" type="text" name="login" placeholder="Login"/>
 <input class="haslo" type="password" name="haslo" placeholder="Hasło"/>
<input class="uk-button main_button" type="submit" value="Zaloguj" />

</form>
<?php
	if (isset($_SESSION['blad'])) //sprawdza czy zmienna błąd jest ustawiona w sesji
	{
	echo $_SESSION['blad'];
	}
	?>
	</div>

	</div>
</div>
<script type="text/javascript" src="scripts/uikit.min.js"></script>


</body>

</html>
