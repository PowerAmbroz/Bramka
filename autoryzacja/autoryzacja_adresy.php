<?php

	session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

	if(!isset($_SESSION['zalogowany'])  && ($_SESSION['zalkont']==false))//zwróci TRUE jeśli nie jest ustawiona
	{
		header('Location: ../index.php');
		exit();
	}
	
	elseif(isset($_SESSION['zalogowany']) && ($_SESSION['zalkont']==false))
	{
		header('Location: ../bramka.php');
		exit();
		
	}
?>