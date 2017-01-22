<div id="adresymodal-bg" class="adresymodal-bg">
	<div class="adresymodal-container uk-container">
		<div class="w-clearfix">
			<div data-ix="close-adresy" class="adresymodal-close">Zamknij</div>
		</div>

		<div class="adresymodal-window">

			<button id="dodawanie_studenta">Dodaj Wykładowce</button>
			<button id="dodawanie_studentow">Dodaj Wykładowców</button>

				<button type="submit" id="trash" class="trash"><img src="../img/can.png" /></button>

			<div id="div2">
				<!-- byłe dodajStudenta -->
				<form class="uk-form dodajWykladowce" id="dodajWykladowce" name="dodajWykladowce" action="../connects/insert_to_db.php" method="post">
					<input class="uk-form-row form_input" type="text" placeholder="Imię" name="imie"  id="imie"/><br />
					<input class="uk-form-row form_input" type="text" placeholder="Nazwisko" name="nazwisko" id="nazwisko" ><br />
					<input class="uk-form-row form_input" type="text" placeholder="Hasło" name="haslo" id="haslo"><br />
					<input class="uk-form-row form_input" type="text" placeholder="Wydział" name="wydzial" id="wydzial"><br />
					<input class="uk-form-row form_input" type="text" placeholder="E-Mail" name="email" id="e-mail"/><br />
					<input class="uk-form-row form_input" type="tel" placeholder="Telefon" name="nr_tel" id="tel" maxlength="9"/><br />
					<select class="form_select" name="permision_level">
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
					<input class="uk-button dodawanie" type="submit" name="Dodaj" value="Dodaj" />
				</form>
			</div>

			<div class="dodaj_z_pliku" id="div3">
				Dodaj Wykładowce z Pliku<br />
				<p>Format: Imię;Nazwisko;Grupa;Telefon</p>
				<span style="color:red"><h5><p>Wgranie danych wymaga odświezenia strony</p></h5></span>
				<br />

				<form id="dodajStudentow" action="../connects/upload_file_db.php" enctype="multipart/form-data" method='post'>
					<input id="file" type="file" name="file" value="Prześlij Plik" /><br />
					<input class="uk-button dodawanie" type="submit" name="send" value="Prześlij" />
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
