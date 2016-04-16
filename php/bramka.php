<?php

	session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

	if(!isset($_SESSION['zalogowany'])) //zwróci TRUE jeśli nie jest ustawiona
	{
		header('Location: ../index.php');
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Bramka sms</title>
	<meta name="description" content="bramka sms"/>
	<meta name="keywords" content="bramka, sms"/>
	<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome=1"/>
	<link rel="stylesheet" href="../css/style.css">




</head>

<body>
<div id="container">
	<div id="logo">
<img src="../img/logo.jpg"/>
	</div>
<br />
<?php
echo "<p>Witaj ".$_SESSION['user'].'! [<a href="logout.php">Wyloguj się!</a>]</p>';

?>

<br />
	<div id="upperbutton">
		<button  id="adresy" onclick="funkcja_adresy()"></button>
	</div>
	<!--<input type="text" id="kontakty" name="konatakty"/>-->

	<div id="lewy">
	<div id="charNum">160</div>

<form action="sms.php" method="post">
	<input type="text" id="numer" name="numer"/>
	<textarea type="text" name="wiadomosc" id="wiadomosc" onkeyup="countChar(this)" maxlength="160"></textarea><br />
  <input type="submit" value="Wyslij" name="wyslij" id="wyslij">
</form>

<br />
</div>
<div id="prawy">
<?php
if (isset($_SESSION['poszlo'])) //sprawdza czy zmienna błąd jest ustawiona w sesji
{
		echo $_SESSION['poszlo'];
}
?>
</div>





<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script type="text/javascript" src="../scripts/liczenie_znaki.js"></script>
<script type="text/javascript" src="../scripts/otwieranie_okna.js"></script>


</body>

</html>
