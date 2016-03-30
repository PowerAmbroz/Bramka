<?php
//session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

  //open connection to mysql db
  $connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));

  //fetch table rows from mysql db
  $sql = "SELECT `Imie`,`Nazwisko`, `Grupa`, `Telefon` FROM `kontakty` WHERE ID_Wykladowcy= '{$_SESSION['id']}'";
  $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

  //create an array
  $emparray = array();
  while($row =mysqli_fetch_assoc($result))
  {
    $emparray[] = $row;
  }
  //echo json_encode($emparray);

  //write to json file
  $fp = fopen('../dane/dane.json', 'w');
  fwrite($fp, json_encode($emparray));
  fclose($fp);


  $content = json_decode(file_get_contents('../dane/dane.json'), true);
  $newContent = json_encode(array('data' => $content), JSON_PRETTY_PRINT);
  file_put_contents('../dane/dane.json', $newContent);

/*
//dopisywanie danych na poczatku
$fotwarcie= fopen('../dane/dane.json','r');

//odczyt danych
$staredane = fread ($fotwarcie, filesize('../dane/dane.json'));

//zamknięcie pliku
fclose($fotwarcie);

//stworzenie nowych danych
$nowedane='{"data" : ';
$nowedane .=$staredane;

//zapis do nowego pliku
//otwarcie pliku do zapisu

$fzapis=fopen('../dane/dane.json','w');

//zapis
fputs($fzapis,$nowedane);

fclose($fzapis);

//dopisanie na koniec
$plik=fopen('../dane/dane.json','a');
$zawartosc='}';
fwrite($plik,$zawartosc);
fclose($plik);
*/
  //close the db connection
  mysqli_close($connection);
?>
