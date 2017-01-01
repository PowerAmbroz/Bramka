<?php
session_start();
require ("../connects/testconnect.php");
// $connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));

//fetch table rows from mysql db

// Dla Admina
if($_SESSION['permision']==='1'){
  if(isset($_SESSION['id'])) {
    $sql = "SELECT id, imie, nazwisko, wydzial, email, telefon FROM `uzytkownicy` WHERE permision <> '1' ";
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
  // var_dump($data);die;

  echo json_encode($data);

}else if($_SESSION['permision']==='2'){

}else{
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
  // var_dump($data);die;

  echo json_encode($data);
}
?>
