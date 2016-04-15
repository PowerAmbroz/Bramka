<?php
//session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

  //open connection to mysql db
  $connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));

  //fetch table rows from mysql db
  $sql = "SELECT `ID_kontakt`,`Imie`,`Nazwisko`, `Grupa`, `Telefon` FROM `kontakty` WHERE ID_Wykladowcy= '{$_SESSION['id']}'";
  $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

  //create an array
  $emparray = array();
  while($row =mysqli_fetch_assoc($result))
  {
    $emparray[] = (array_values($row));
  }
   //json_encode($emparray);

  //write to json file
  $fp = fopen('../dane/dane.json', 'w');
  fwrite($fp, json_encode($emparray));
  fclose($fp);


  $content = json_decode(file_get_contents('../dane/dane.json'), true);
  $newContent = json_encode(array('data' => $content), JSON_PRETTY_PRINT);
  file_put_contents('../dane/dane.json', $newContent);

  mysqli_close($connection);
?>
