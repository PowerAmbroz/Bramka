<?php
session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

  $connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));
//  mysqli_select_db("test", $connection);
if(isset($_POST['imie'])&&isset($_POST['nazwisko'])&&isset($_POST['grupa'])&&isset($_POST['nr_tel']))
{
$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$grupa=$_POST['grupa'];
$tel=$_POST['nr_tel'];

//fetch table rows from mysql db
$sql = "INSERT INTO kontakty (ID_Wykladowcy, Imie, Nazwisko, Grupa, Telefon) VALUES('{$_SESSION['id']}','$imie','$nazwisko','$grupa','$tel')";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

		$_SESSION['zalkont']=true;
header('Location: ../php/adresy.php');

mysqli_close($connection);
}
else {
  $_SESSION['zle_dane']='<span style="color:red">Nie wprowadzono wszystkich danych!</span>'
}
?>
