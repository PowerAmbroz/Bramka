<?php
  require ("../connects/testconnect.php");
$data   = $_POST["DeletePhoneNumberArray"];
$data   = json_decode("$data", true);
//print_r($data);
// foreach ($data as $d) {
//   $sql = "DELETE * FROM kontakty WHERE Telefon = '$d'";
//   $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
// }

foreach ($data as $d => $value) {
  $sql = "DELETE FROM `kontakty` WHERE `Telefon`='$value'";
  $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
//echo $d;
 echo $value;
}



// for($i=0; $i<$data;$i++){
//     $sql = "DELETE * FROM kontakty WHERE Telefon = '$data'";
//     $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
// }
?>
