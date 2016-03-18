<?php

	session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane
	$_SESSION['zalkont']=false;
	session_unset();
	
	header('Location: ../index.php');

	
?>

