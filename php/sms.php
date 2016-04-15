<?php
/*
session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane


$numer=$_POST("numer");
$wiadomosc=$_POST("wiadomosc");

require "php_serial.class.php";
$serial = new phpSerial;
$serial->deviceSet("/dev/ttyUSB0");
$serial->confBaudRate(115200);

// Then we need to open it
//$serial->deviceOpen();
$serial->fopen();

// To write into
$serial->sendMessage("AT+CMGF=1\n\r");
$serial->sendMessage("AT+cmgs=\"664861998\"\n\r");
$serial->sendMessage("BlaBla\n\r");
$serial->sendMessage(chr(26));

//wait for modem to send message
sleep(7);
$read=$serial->readPort();
$serial->deviceClose();
$_SESSION["poszlo"]='<span style="color:red">SMS chyba poszedl</span>';
//header('Location: bla.php')*/
?>


    <title>Tytuł</title>

    </head>

    <body>

    <B>Test HTML</B><BR>


    <?php




    //*******************************************************************************
    include "php_serial.class.php";

    //$numer=$_POST("numer");
    //$wiadomosc=$_POST("wiadomosc");


    $serial = new phpSerial();

    $serial->deviceSet("COM1");

    $serial->confBaudRate(115200);
    $serial->confParity("none");
    $serial->confCharacterLength(8);
    $serial->confStopBits(1);
    $serial->confFlowControl("none");
    //echo "tu jestem, po konfiguracji";
     // Then we need to open it
    $serial->deviceOpen('w+');
    if($serial)
    {
      echo "Otwarty ";

//$serial->sendMessage("ATE1\n");
//$read = $serial->readPort(1);
//$b = $serial->strToHex($read);
//echo $b;

	$serial->sendMessage("at+cmgf=1\n");

  $serial->sendMessage("AT+CSMP=\"17,100,0,240\"\n");

  //$serial->sendMessage(chr(13));
  //sleep(1);

//  echo "Pierwszy ".$read;

  //$read = $serial->readPort(1);
  //$b = $serial->strToHex($read);
  //echo $b;




  //$serial->sendMessage(chr(13));
	$serial->sendMessage("at+cmgs=\"664861998\"\n");


  //$serial->sendMessage(chr(13));
  //$serial->sendMessage(chr(10));

  //sleep(1);

  //$read = $serial->readPort(100);
  //echo "Drugi ".$read;

  //sleep(1);
	$serial->sendMessage("BlaBla");

	$serial->sendMessage(chr(26));
  //sleep(1);

  $read = $serial->readPort(1);
  echo "       Odpowiedź:        ";
  echo "Trzeci ".$read;

//$serial->sendMessage("ATE1\n");
  $serial->deviceClose();
//$_SESSION["poszlo"]='<span style="color:red">SMS chyba poszedl</span>';
//header('Location: bramka.php')
echo "Zamykam";

}
else
{
  echo "Nie Otwarty";
}



    ?>

    </body>
    </html>
