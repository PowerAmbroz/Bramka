<?php
require ("../connects/testconnect.php");
$data   = $_POST["DeletePhoneNumberArray"];
$data   = json_decode("$data", true);

foreach ($data as $d => $value) {
  $sql = "DELETE FROM `kontakty` WHERE `Telefon`='$value'";
  $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
  //echo $d;
  echo $value;
}

?>
