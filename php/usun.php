<?php
session_start();
  require ("../connects/testconnect.php");
  if($_SESSION['permision'] === "1"){//Admin
    $data   = $_POST["DeletePhoneNumberArrayAdmin"];
    $data   = json_decode("$data", true);

    foreach ($data as $d => $value) {
      $sql = "DELETE FROM `uzytkownicy` WHERE `Telefon`='$value'";
      $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    //echo $d;
     echo $value;
    }

  }else if($_SESSION['permision'] === "2"){

  }else{//User
    $data   = $_POST["DeletePhoneNumberArray"];
    $data   = json_decode("$data", true);

    foreach ($data as $d => $value) {
      $sql = "DELETE FROM `kontakty` WHERE `Telefon`='$value'";
      $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    //echo $d;
     echo $value;
    }

  }





?>
