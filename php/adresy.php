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
	<br />
	<button id="preview">Dodaj Studenta</button>
	<!--<button id="preview2">Dodaj Studenta z Pliku</button>-->
	<div id="div2">

		<form action="../connects/insert_to_db.php" method="post">
			Imię  <input type="text" name="imie"  id="imie"/><br />
			Nazwisko <input type="text" name="nazwisko" id="nazwisko" ><br />
			Grupa <input type="text" name="grupa" id="grupa"><br />
			Nr. Tel. <input type="tel" name="nr_tel" id="tel" maxlength="9"/><br />
			ID Wykładowcy <input type="text" name="ID" id="ID_wyk" value="<?php echo $_SESSION['id']; ?>" readonly>
			<input type="submit" value="Dodaj" style="margin-left:9px;"/>
			<br /><br />
			Dodaj Studenta z Pliku
			<br />
			<form action="../connects/upload_file_db.php" metod='post' enctype="multipart/form-data">
				<input id="file" type="file" name="file" value="Prześlij Plik" /><br />
				<input type="submit" name="submit" value="Prześlij" style="margin-left:150px;" />
		</form>
	</div>

	<!--<div id="div3">
		<form action="../connects/upload_file_db.php" metod='post'>
			<input id="FileToUpload" type="file" name="FileToUpload" value="Prześlij Plik" />
			<input type="submit" name="submit" value="Prześlij" />
		</form>
	</div>-->
	<br />
	<br />
	<br />

	<table id="example" class="display select" width="100%" cellspacing="0">
		 <thead>
				<tr>
					 <th>Imie</th>
					 <th>Nazwisko</th>
					 <th>Grupa</th>
					 <th>Telefon</th>
				</tr>
		 </thead>
	</table>


	<script>
		function myFunction() {
    	<?php $_SESSION['zalkont']=false; ?>
		}
	</script>
	<script type="text/javascript" src="../scripts/dodawanie_studenta.js"></script>

<?php
  include_once('../view/footer.php');
?>
