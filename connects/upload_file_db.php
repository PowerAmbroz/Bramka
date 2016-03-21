<?php
session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

  $connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));



  if(isset($_POST["Prześlij"]))
  {
  	$file = $_FILES['file']['tmp_name'];
  	$handle = fopen($file, "r");
  	$c = 0;
  	while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
  	{
  		$imie = $filesop[0];
  		$nazwisko = $filesop[1];
      $grupa = $filesop[2];
  		$telefon = $filesop[3];

  		$sql = mysql_query("INSERT INTO kontakty (ID_Wykladowcy, Imie, Nazwisko, Grupa, Telefon) VALUES ('{$_SESSION['id']}','$imie','$nazwisko','$grupa','$telefon')");
  	}

  		if($sql){
  			echo "You database has imported successfully";
  		}else{
  			echo "Sorry! There is some problem.";
  		}
  }


		$_SESSION['zalkont']=true;
header('Location: ../php/adresy.php');

mysqli_close($connection);
?>
