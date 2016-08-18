<?php
session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

  //$connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));
require ("../connects/testconnect.php");

if(empty($_POST['imie'] && $_POST['nazwisko'] && $_POST['grupa'] && $_POST['nr_tel']))

{
  $zle_dane='<span style="color:red"><p>Wszystkie Pola Są Wymagane</p></span>';

}
else {
  unset($_SESSION['zle_dane']);
    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $grupa=$_POST['grupa'];
    $tel=$_POST['nr_tel'];


        $sql = "INSERT INTO kontakty (ID_Wykladowcy, Imie, Nazwisko, Grupa, Telefon) VALUES('{$_SESSION['id']}','$imie','$nazwisko','$grupa','$tel')";
        $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));


      mysqli_close($connection);
}
?>
