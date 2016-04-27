<?php

	session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

	if(!isset($_SESSION['zalogowany'])) //zwróci TRUE jeśli nie jest ustawiona
	{
		header('Location: ../index.php');
		exit();
	}
?>

<?php
	require_once '../connects/dbconnect.php';
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
	  <link rel="stylesheet" type="text/css" href="../css/bartoszs-dynamite-site-9faf3a.webflow.css">
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

<body>
	<div class="adresymodal-bg">
    <div class="adresymodal-container">
      <div class="w-clearfix">
        <div data-ix="close-adresy" class="adresymodal-close">Zamknij</div>
      </div>
      <div class="adresymodal-window">
				<!-- zawartosc okna -->
				<button id="dodawanie_studenta">Dodaj Studenta</button>
				<button id="dodawanie_studentow">Dodaj Studentow</button>
				<!--<button id="preview2">Dodaj Studenta z Pliku</button>-->
				<div id="div2">
					<form id="dodajStudenta" action="../connects/insert_to_db.php" method="post">
						Imię  <input type="text" name="imie"  id="imie"/><br />
						Nazwisko <input type="text" name="nazwisko" id="nazwisko" ><br />
						Grupa <input type="text" name="grupa" id="grupa"><br />
						Nr. Tel. <input type="tel" name="nr_tel" id="tel" maxlength="9"/><br />
						<!-- ID Wykładowcy <input type="text" name="ID" id="ID_wyk" value="<?php //echo $_SESSION['id']; ?>" readonly> -->
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
				<form id="frm-example" action="" method="POST">
				<table id="example" class="display select" cellspacing="0" width="100%">
					 <thead>
							<tr>
									<th><input type="checkbox"></th>
									<!--<th><input name="select_all" value="1" id="example-select-all" type="checkbox"></th>-->
									<th>Imie</th>
									<th>Nazwisko</th>
									<th>Grupa</th>
									<th>Telefon</th>
							</tr>
					 </thead>
				</table>
				<hr>

				<!-- <p>Wciśnij <b>Submit</b> and check console for URL-encoded form data that would be submitted.</p> -->
				<input id="guzior" type="submit" value="Submit" data-wait="Proszę czekać..." wait="Proszę czekać..." class="w-button form-submit">
				<!-- <p><button>Submit</button></p> -->

				<!-- <b>Data submitted to the server:</b><br>
				<pre id="example-console"> -->
				</form>

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

			</div>
    </div>
  </div>
  <div class="w-section section">
    <div class="sidebar">
      <div id="profilePicDiv" class="sidebar-personicon"></div>
      <h2 id="profileName" class="sidebar-header"><?php echo "<p>Witaj ".$_SESSION['user'].'!</p>'?></h2><a href="logout.php" class="w-button sidebar-button">Wyloguj</a>
    </div>
    <div class="maincontainer">
      <div class="mainimg-container"><img src="../img/logo.jpg">
      </div>
      <div class="form-container">
        <div class="w-form">



					<form action="sms.php" id="email-form" name="email-form" data-name="Email Form" class="form-flex" method="post">
            <label for="numer">Numer telefonu</label>
            <div class="input-adresy-contaienr">
              <input id="numer" type="text" placeholder="Podaj numery telefonu oddzielone przecinkami" name="numer" data-name="numer" class="w-input input"><img src="../img/kontakty.png" data-ix="open-adresy" class="adresyicon">
            </div>

            <label for="wiadomosc">Wiadomość:</label><div id="charNum">160</div>
            <textarea id="wiadomosc" placeholder="Podaj treść wiadomości..." name="wiadomosc" data-name="wiadomosc" class="w-input input textarea" onkeyup="countChar(this)" maxlength="160"></textarea>
            <input type="submit" value="Wyślij wiadomość" data-wait="Proszę czekać..." wait="Proszę czekać..." class="w-button form-submit">
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






<!--
	<div id="adresymodal-bg" class="adresymodal-bg" style="display: none;">
    <div class="adresymodal-container">
      <div class="w-clearfix">
        <div class="adresymodal-close" onclick="zamknij_adresy()">Zamknij</div>
      </div>
      <div class="adresymodal-window">

			</div>
    </div>
  </div>

	<div id="container">
		<div id="logo">
	<img src="../img/logo.jpg"/>
		</div>
	<br />
	<?php	//echo "<p>Witaj ".$_SESSION['user'].'! [<a href="logout.php">Wyloguj się!</a>]</p>';	?>

	<br />
		<div id="upperbutton">
			<button  id="adresy" onclick="pokaz_adresy()"></button>
		</div>
		<!--<input type="text" id="kontakty" name="konatakty"/>

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
	//if (isset($_SESSION['poszlo'])) //sprawdza czy zmienna błąd jest ustawiona w sesji
	{
		//	echo $_SESSION['poszlo'];
	}
	?>
	</div>

	<?php

	//  include_once('../view/footer.php');
	?>
