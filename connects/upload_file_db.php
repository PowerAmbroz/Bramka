<?php
session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

  $connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));
//  mysqli_select_db("test", $connection);

/*$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$grupa=$_POST['grupa'];
$tel=$_POST['nr_tel'];

//fetch table rows from mysql db
$sql = "INSERT INTO studenci (Imie, Nazwisko, Grupa, Telefon) VALUES('$imie','$nazwisko','$grupa','$tel')";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

echo "doddano 1 rekord";*/











		$_SESSION['zalkont']=true;
header('Location: ../php/adresy.php');

mysqli_close($connection);
?>
