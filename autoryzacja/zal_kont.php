<?php

	session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

if(isset($_SESSION['zalogowany'])) //&& ($_SESSION['zalkont']==true))
{
		$_SESSION['zalkont']=true;
	header('Location: ../php/adresy.php');
	exit();
	
}

	?>
