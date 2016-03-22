<?php
session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

  $connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));
//  mysqli_select_db("test", $connection);
if(empty($_POST['imie'])&&empty($_POST['nazwisko'])&&empty($_POST['grupa'])&&empty($_POST['nr_tel']))
{
  $_SESSION['zle_dane']='<span style="color:red">Nie wprowadzono wszystkich danych!</span>';
  $_SESSION['zalkont']=true;
    header('Location: ../php/adresy.php');
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
        header('Location: ../php/adresy.php');

  mysqli_close($connection);
}
?>
