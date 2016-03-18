<?php

	session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane


	require_once ("../connects/connect.php");
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); //służy do ustanowienie połączenia z bazą dancy przekazując odpowiednie parametry. Otwarcie połączenia
	//@-w przypadku błędu php nie będzie nam sypał na ekranie błedami, wyciszamy je
	if($polaczenie->connect_errno!=0) //sprawdzamy czy połączenie da nam wartośc True. Connect_Errno równy 0 oznacza, iż ostatnio podjęta próba połączenia sie z bazą danych zakończyła się sukcesem
	{
		echo "Error: ".$polaczenie->connect_errno; //własna obsługa błędów połączenia wykona się jeśli wartość connect_errno będzie ZEREM
	}
	else
	{
		$login = $_POST['login']; //pobranie loginu wysłanego z indexu
		$haslo = $_POST['haslo']; //pobranie hasła
		
		$login=htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo=htmlentities($haslo, ENT_QUOTES, "UTF-8"); //encje html pozwalają wypisać fragmenty kodu i nie traktują jej jako kod html . ENT_QUOTES - zamieniaj na encje tez cudzysłowia("") i apostrofy ('')
	//echo "it works";
	
		//$sql = "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'"; zapytanie do bazy sql sprawdzajace czy użytkownik o podanym loginie i haśle istanieje. Dodatkowo całe zapytanie zapisujemy w cudzysłowiach("zapytanie"), a  zmienne php będące łańcuchamiw apostrofach ('zmienna') P.S Funkcja juz nie używana bo podatna na wstrzykiwanie SQL
	
	if($rezultat = @$polaczenie->query(
	sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",  // sprintf - jak print w C ,%-oznaczenie miejsca gdzie przebuwa zmienna, s typu string
	mysqli_real_escape_string($polaczenie,$login), // wstawi w miejsce pierwszego %s pierwszy argument podany po przecinku
	mysqli_real_escape_string($polaczenie,$haslo))))  //dalej analogicznie
	//mysqli_real_escape_string - funkcja do wykrywanie prób wpływania za zapytania operatorami dwóch myślników(-- komentarz w SQL) lub apostrofów i zabezpiecza naszą bazę przed wstrzykiwaniem SQL
	
	
	
	//STARE!!!!  weź zapytanie o treści w zmiennej sql i wykonaj te kwerende. Jeśli  zapytanie nie zostanie wykonane (jakiś błąd np. literówka) to zmienna rezultat przyjmie automatycznie wartość FALSE. BŁĘDNE ZAPYTANIE!!
	{//dowiedzenie się ile rekordów zwróciła baza 0 czy 1 w przypadku logowania
		$ilu_userow = $rezultat->num_rows; //num_rows ile wierszy
		//Dwa scenariusze:
		if($ilu_userow>0)
		{
			$_SESSION['zalogowany']=true; //jeśli komus uda się zalogowac to istnieje w zmiennej zalogowany w sesji
			
			
			$wiersz = $rezultat->fetch_assoc(); //stworzenie tablicy skojarzeniowej, czyli asocjacyjnej do której włożone zostaną zmienne  o takich samych nazwach jak nazwy kolumn w bazie 
			$_SESSION['id'] = $wiersz['id'];
			$_SESSION['user'] = $wiersz['user']; //wyciąganie z tablicy asocjacyjnej kolumny user za pomoca sesji
			
			unset($_SESSION['blad']); //usuń zmienną błąd z sesji

			$rezultat->free_result(); //wyczyszczenie z bazy serwerarezultatów zapytania czyli te rekordy wyjęte z bazy
			header('Location: bramka.php'); //połaczenie z innym plikiem php
			
			
		}
		else
		{
			$_SESSION['blad']= '<span style="color:red">Nieprawidłowy Login lub Hasło!</span>';
			header("Location: ../index.php");
			
		}
		
		
	}
	$polaczenie->close();
	} 

	
	?>