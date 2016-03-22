<?php
session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

  $connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));
  //$mysqli_select_db("kontakty",$connection);


  if(isset($_POST["send"]))
  {

  	$file = $_FILES['file']['tmp_name'];

    $handle = fopen($file, "r");
    $c=0;
  	while(($filesop = fgetcsv($handle, 1000, ";")) !== false)
  	{
  		$imie = $filesop[0];
  		$nazwisko = $filesop[1];
      $grupa = $filesop[2];
  		$telefon = $filesop[3];

        if(empty($imie)&&empty($nazwisko)&&empty($grupa)&&empty($telefon))
          {
          $_SESSION['zle_dane']='<span style="color:red">Nie wprowadzono wszystkich danych!</span>';
          $_SESSION['zalkont']=true;
            header('Location: ../php/adresy.php');
          }
        else
          {
            unset($_SESSION['zle_dane']);
            $c++;
  		      $sql2 = "INSERT INTO kontakty (ID_Wykladowcy, Imie, Nazwisko, Grupa, Telefon) VALUES ('{$_SESSION['id']}','$imie','$nazwisko','$grupa','$telefon')";
            $result2 = mysqli_query($connection, $sql2) or die("Error in Selecting " . mysqli_error($connection));
  	      }
    }

    if($result2)
      {
  			echo "You database has imported successfully with ".$c." records.";
  		}
    else
      {
  			echo "Sorry! There is some problem in ".$c." record.";
  		}
  }


	$_SESSION['zalkont'] = true;
  header('Location: ../php/adresy.php');

  mysqli_close($connection);
?>
