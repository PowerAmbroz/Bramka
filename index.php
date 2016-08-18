<?php

session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jeśli zalogowany jest ustawiony i zalogowany jest prawdziwy to skocz od razu do bramka.php
{
	header('Location: php/bramka.php');
	exit();//pomija resztę dokumentu
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
	<link rel="stylesheet" href="css/style.css">

	<script src="http://code.jquery.com/jquery-1.5.js"></script>
</head>

<body>

	<form action="php/zaloguj.php" method="post">
		Login <br /> <input type="text" name="login" /><br />
		Hasło<br /> <input type="password" name="haslo" /><br /><br />
		<input type="submit" value="Zaloguj" />

	</form>
	<?php
	if (isset($_SESSION['blad'])) //sprawdza czy zmienna błąd jest ustawiona w sesji
	{
		echo $_SESSION['blad'];
	}
	?>

</body>

</html>
