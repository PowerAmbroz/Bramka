<?php

	session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

	if(!isset($_SESSION['zalogowany'])  && ($_SESSION['zalkont']==false))//zwróci TRUE jeśli nie jest ustawiona
	{
		header('Location: index.php');
		exit();
	}

	elseif(isset($_SESSION['zalogowany']) && ($_SESSION['zalkont']==false))
	{
		header('Location: bramka.php');
		exit();

	}
?>

<?php
	require_once '../connects/dbconnect.php';
	include_once('../view/header.php');
?>

<body onbeforeunload="return myFunction()">
	<button id="dodawanie_studenta">Dodaj Studenta</button>
	<button id="dodawanie_studentow">Dodaj Studentow</button>
	<!--<button id="preview2">Dodaj Studenta z Pliku</button>-->
	<div id="div2">
		<form action="../connects/insert_to_db.php" method="post">
			Imię  <input type="text" name="imie"  id="imie"/><br />
			Nazwisko <input type="text" name="nazwisko" id="nazwisko" ><br />
			Grupa <input type="text" name="grupa" id="grupa"><br />
			Nr. Tel. <input type="tel" name="nr_tel" id="tel" maxlength="9"/><br />
			ID Wykładowcy <input type="text" name="ID" id="ID_wyk" value="<?php echo $_SESSION['id']; ?>" readonly>
			<input type="submit" name="Dodaj" value="Dodaj" style="margin-left:9px;"/>
		</form>
	</div>
<?php
		if (isset($_SESSION['zle_dane'])) //sprawdza czy zmienna błąd jest ustawiona w sesji
		{
				echo $_SESSION['zle_dane'];
		}
	?>
	<div id="div3">
		Dodaj Studenta z Pliku<br />
		<p>Format: Imię;Nazwisko;Grupa;Telefon</p>
		<br />
		<form action="../connects/upload_file_db.php" enctype="multipart/form-data" method='post'>
			<input id="file" type="file" name="file" value="Prześlij Plik" /><br />
			<input type="submit" name="send" value="Prześlij" style="margin-left:150px;" />
		</form>
	</div>
	<?php
			if (isset($_SESSION['rezultat_wgrania_pliku'])) //sprawdza czy zmienna błąd jest ustawiona w sesji
			{
					echo $_SESSION['rezultat_wgrania_pliku'];
			}

			if (isset($_SESSION['zly_format_pliku'])) //sprawdza czy zmienna błąd jest ustawiona w sesji
			{
					echo $_SESSION['zly_format_pliku'];
			}
		?>
	<br />
	<br />
	<br />

	<table id="example" class="display select" width="100%" cellspacing="0">
		 <thead>
				<tr>
						<!--<th><input type="checkbox"></th>-->
					 	<th>Imie</th>
					 	<th>Nazwisko</th>
					 	<th>Grupa</th>
					 	<th>Telefon</th>
				</tr>
		 </thead>
	</table>


	<script>
		function myFunction()
		{
    	<?php
					$_SESSION['zalkont']=false;
					unset($_SESSION['rezultat_wgrania_pliku']);
					unset($_SESSION['zly_format_pliku']);
					unset($_SESSION['zle_dane']);
			?>
		}
	</script>

<?php
  include_once('../view/footer.php');
?>
