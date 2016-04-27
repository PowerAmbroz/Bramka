<?php
session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

  $connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));
//require_once ("../connects/testconnect.php");
//  mysqli_select_db("test", $connection);
/**********************************************************************************************
if((empty($_POST['imie']))and(empty($_POST['nazwisko']))and(empty($_POST['grupa']))and(empty($_POST['nr_tel'])))
Tak nie robić, zle zrobiony warunek, za duzo empty
**********************************************************************************************/
if(empty($_POST['imie'] && $_POST['nazwisko'] && $_POST['grupa'] && $_POST['nr_tel']))

{
  $_SESSION['zle_dane']='<span style="color:red"><p>Wszystkie Pola Są Wymagane</p></span>';
  $_SESSION['zalkont']=true;
    //header('Location: ../php/adresy.php');
}
else {
  unset($_SESSION['zle_dane']);
    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $grupa=$_POST['grupa'];
    $tel=$_POST['nr_tel'];

  //fetch table rows from mysql db
    $sql = "INSERT INTO kontakty (ID_Wykladowcy, Imie, Nazwisko, Grupa, Telefon) VALUES('{$_SESSION['id']}','$imie','$nazwisko','$grupa','$tel')";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

  		$_SESSION['zalkont']=true;
        //header('Location: ../php/adresy.php');

  mysqli_close($connection);
}
?>
