<div id="adresymodal-bg" class="adresymodal-bg">
	<div class="adresymodal-container">
		<div class="w-clearfix">
			<div data-ix="close-adresy" class="adresymodal-close">Zamknij</div>
		</div>
		<div class="adresymodal-window">

			<button id="dodawanie_studenta">Dodaj Wykładowce</button>
			<button id="dodawanie_studentow">Dodaj Wykładowców</button>

				<button type="submit" id="trash" class="trash"><img src="../img/can.png" /></button>

			<div id="div2">
				<!-- byłe dodajStudenta -->
				<form id="dodajWykladowce" name="dodajWykladowce" action="../connects/insert_to_db.php" method="post">
					Imię  <input type="text" name="imie"  id="imie"/><br />
					Nazwisko <input type="text" name="nazwisko" id="nazwisko" ><br />
					Hasło <input type="text" name="haslo" id="haslo"><br />
					Wydział <input type="text" name="wydzial" id="wydzial"><br />
					E-Mail. <input type="tel" name="email" id="e-mail"/><br />
					Nr. Tel. <input type="tel" name="nr_tel" id="tel" maxlength="9"/><br />
					Permision <select name="permision_level">
						<option value="0">Level 0</option>
						<option value="1">Level 1</option>
						<option value="2">Level 2</option>
					</select>


					<?php
						if (isset($_SESSION['zle_dane'])) //sprawdza czy zmienna błąd jest ustawiona w sesji
						{
								echo $_SESSION['zle_dane'];
						}
					?>
					<input type="submit" name="Dodaj" value="Dodaj" style="margin-left:9px;"/>
				</form>
			</div>

			<div id="div3">
				Dodaj Wykładowce z Pliku<br />
				<p>Format: Imię;Nazwisko;Grupa;Telefon</p>
				<span style="color:red"><h5><p>Wgranie danych wymaga odświezenia strony</p></h5></span>
				<br />

				<form id="dodajStudentow" action="../connects/upload_file_db.php" enctype="multipart/form-data" method='post'>
					<input id="file" type="file" name="file" value="Prześlij Plik" /><br />
					<input type="submit" name="send" value="Prześlij" style="margin-left:150px;" />
					<?php
						if (isset($_SESSION['zle_dane2'])) //sprawdza czy zmienna błąd jest ustawiona w sesji
						{
								echo $_SESSION['zle_dane2'];
						}
						if (isset($_SESSION['rezultat_wgrania_pliku'])) //sprawdza czy zmienna błąd jest ustawiona w sesji
						{
								echo $_SESSION['rezultat_wgrania_pliku'];
						}

						if (isset($_SESSION['zly_format_pliku'])) //sprawdza czy zmienna błąd jest ustawiona w sesji
						{
								echo $_SESSION['zly_format_pliku'];
						}
						?>
				</form>
			</div>
			<br />
			<br />
			<br />
			<form id="frm-example" action="" method="POST">
			<table id="example" class="display select" cellspacing="0" width="100%">
				 <thead>
						<tr>
								<th><input type="checkbox"></th>
								<!--<th><input name="select_all" value="1" id="example-select-all" type="checkbox"></th>-->
								<!-- <th>ID</th> -->
								<th>Imie</th>
								<th>Nazwisko</th>
								<!-- <th>Hasło</th> -->
								<th>Wydział</th>
								<th>EMail</th>
								<th>Telefon</th>

						</tr>
				 </thead>
			</table>
			<hr>

			<input id="guzior" type="submit" value="Submit" class="w-button form-submit">

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
