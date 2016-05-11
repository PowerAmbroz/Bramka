<?php
session_start();
require ("../connects/testconnect.php");
// $connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));

//fetch table rows from mysql db
if(isset($_SESSION['id'])) {
  $sql = "SELECT `ID_kontakt`,`Imie`,`Nazwisko`, `Grupa`, `Telefon` FROM `kontakty` WHERE ID_Wykladowcy= '{$_SESSION['id']}'";
}
if(isset($_GET['wykladowca_id'])) {
  $sql = "SELECT `ID_kontakt`,`Imie`,`Nazwisko`, `Grupa`, `Telefon` FROM `kontakty` WHERE ID_Wykladowcy= '{$_GET['wykladowca_id']}'";
}
if(!isset($_GET['wykladowca_id']) && !isset($_SESSION['id'])) {
  $sql = "SELECT `ID_kontakt`,`Imie`,`Nazwisko`, `Grupa`, `Telefon` FROM `kontakty` WHERE ID_Wykladowcy= '-1'";
}

$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

//create an array
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
  $emparray[] = (array_values($row));
}

// echo json_encode($emparray);
$data ['data'] = $emparray;
echo json_encode($data);

?>
