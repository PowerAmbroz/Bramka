<?php
session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

  $connection = mysqli_connect("localhost","root","","test") or die("Error " . mysqli_error($connection));
//require_once ("../connects/testconnect.php");
  //$mysqli_select_db("kontakty",$connection);


  if(isset($_POST["send"]))
  {
    $mimes = array('application/vnd.ms-excel','text/plain','text/csv/','text/tsv'); //tworzenie z pliku excel tablicy
    if(in_array($_FILES['file']['type'], $mimes)) //porownanie tablicy ze wzorcem, ktory pozwala sprawdzic typ pliku
     {
       unset($_SESSION["zly_format_pliku"]);
       $file = $_FILES['file']['tmp_name'];//utworzenie tablicy asocjacujnej z zawartości pliku wgrywanego

       $handle = fopen($file, "r"); //otwarcie pliku do odczytu
       //$c=0;
          while(($filesop = fgetcsv($handle, 1000, ";")) !== false) //pobieranie danych z komorek o maxymalnej długości wynoszoncej 1000 znkow na komorke
            {
              $imie = $filesop[0];//przypisanie zmiennych do poszczegolnych wartości z tablicy
              $nazwisko = $filesop[1];
              $grupa = $filesop[2];
              $telefon = $filesop[3];

                 if(empty($imie)&&empty($nazwisko)&&empty($grupa)&&empty($telefon)) //sprawdzenie czy zmienne są puste
                   {
                     $_SESSION['zle_dane']='<span style="color:red">Nie wprowadzono wszystkich danych!</span>';
                     $_SESSION['zalkont']=true;
                     header('Location: ../php/adresy.php');
                   }
                 else
                   {
                     unset($_SESSION['zle_dane']);
                     //$c++;
                    $sql2 = "INSERT INTO kontakty (ID_Wykladowcy, Imie, Nazwisko, Grupa, Telefon) VALUES ('{$_SESSION['id']}','$imie','$nazwisko','$grupa','$telefon')";
                     $result2 = mysqli_query($connection, $sql2) or die("Error in Selecting " . mysqli_error($connection));
                  }
            }

      if($result2)
         {
           unset($_SESSION["rezultat_wgrania_pliku"]);
          //$_SESSION["rezultat_wgrania_pliku"] = "<span><p>You database has imported successfully with ".$c." records.</p></span>";
        }
       else
         {
          $_SESSION["rezultat_wgrania_pliku"] = '<span style="color:red"><p>Sorry! There is some problem in '.$c.' record.</p></span>';
        }

      }
    else
        {
           $_SESSION["zly_format_pliku"] = '<span style="color:red"><p>Zły format pliku (przyjmuje tylko CSV).</p></span>';
        }

  }


    $_SESSION['zalkont'] = true;
     header('Location: ../php/adresy.php');

     mysqli_close($connection)

?>
