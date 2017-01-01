<?php
session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

  //$connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));
require ("../connects/testconnect.php");
// Dla Admina
if($_SESSION['permision']==='1'){
  if(empty($_POST['imie'] && $_POST['nazwisko'] && $_POST['haslo'] && $_POST['wydzial'] && $_POST['email'] && $_POST['nr_tel']))
  {
    echo "puchy <br/>";
    var_dump($_SESSION['permision']);

    var_dump($_POST['imie']);
    var_dump($_POST['nazwisko']);
    var_dump($_POST['haslo']);
    var_dump($_POST['wydzial']);
    var_dump($_POST['email']);
    var_dump($_POST['nr_tel']);die;


    $zle_dane='<span style="color:red"><p>Wszystkie Pola Są Wymagane</p></span>';

  }
  else {
    echo "jestem w dodawaniu <br/>";
    unset($_SESSION['zle_dane']);

    var_dump($_POST['imie']);
    var_dump($_POST['nazwisko']);
    var_dump($_POST['haslo']);
    var_dump($_POST['wydzial']);
    var_dump($_POST['email']);
    var_dump($_POST['nr_tel']);
    var_dump($_POST['permision_level']);


      $imie=$_POST['imie'];
      $nazwisko=$_POST['nazwisko'];
      $haslo=md5($_POST['haslo']);
      $wydzial=$_POST['wydzial'];
      $email=$_POST['email'];
      $tel=$_POST['nr_tel'];
      $permision=$_POST['permision_level'];
echo "<br/><br/>";
      var_dump($imie);
      var_dump($nazwisko);
      var_dump($haslo);
      var_dump($wydzial);
      var_dump($email);
      var_dump($tel);
      var_dump($permision);
echo "<br/><br/>";


          $sql = 'INSERT INTO uzytkownicy (imie, nazwisko, pass, wydzial, email, telefon, permision) VALUES ("'.$imie.'", "'.$nazwisko.'", "'.$haslo.'", "'.$wydzial.'", "'.$email.'", "'.$tel.'", "'.$permision.'")';
          echo "<br/><br/>";
          var_dump($sql);
          echo "<br/><br/>";

          $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
var_dump($result);

        mysqli_close($connection);

  }

  // Dla Administracji - Dziekanaty
}else if($_SESSION['permision']==='2'){

}else{
  if(empty($_POST['imie'] && $_POST['nazwisko'] && $_POST['grupa'] && $_POST['nr_tel']))

  {
    $zle_dane='<span style="color:red"><p>Wszystkie Pola Są Wymagane</p></span>';

  }
  else {
    // Dla zwykłych uzytkownikow
    unset($_SESSION['zle_dane']);
      $imie=$_POST['imie'];
      $nazwisko=$_POST['nazwisko'];
      $grupa=$_POST['grupa'];
      $tel=$_POST['nr_tel'];


          $sql = "INSERT INTO kontakty (ID_Wykladowcy, Imie, Nazwisko, Grupa, Telefon) VALUES('{$_SESSION['id']}','$imie','$nazwisko','$grupa','$tel')";
          $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));


        mysqli_close($connection);

  }
}

?>
