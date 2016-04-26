    <title>Tytuł</title>

    </head>

    <body>

    <B>Test HTML</B><BR>


    <?php
session_start();

$numer = $_POST['numer']; //pobranie loginu wysłanego z indexu
$wiadomosc = $_POST['wiadomosc']; //pobranie hasła

echo $numer;
echo $wiadomosc;



$msgCenter = array();

array_push($msgCenter, array("123123123", "msg nr 1"));
array_push($msgCenter, array("456456456", "msg nr 2"));
array_push($msgCenter, array("789789798", "msg nr 3"));

fifomsgs($msgCenter);

function fifomsgs(msg) {
  if msgCenter.sizeof > 0 {
    sendMessage(msg[0][0], msg[0][1]);
    array_shift($msgCenter);
    fifomsgs($msgCenter);
  }
}

// [wiadomosc nr 1, wiadomosc nr 2]




    //*******************************************************************************
    /* include "php_serial.class.php";



      $serial = new phpSerial();

      $serial->deviceSet("COM1");

      $serial->confBaudRate(115200);
      //$serial->confParity("none");
      //$serial->confCharacterLength(8);
      //$serial->confStopBits(1);
      //$serial->confFlowControl("none");
      //echo "tu jestem, po konfiguracji";
       // Then we need to open it
      $serial->confCharacterLength(8);
      $serial->deviceOpen('w+');
      if($serial)
      {
        echo "Otwarty ";

  //$serial->sendMessage("ATE1\n");
  //$read = $serial->readPort(1);
  //$b = $serial->strToHex($read);
  //echo $b;

  	$serial->sendMessage("at+cmgf=1");

    //$serial->sendMessage("AT+CSMP=\"17,100,0,240\"\n");

    $serial->sendMessage(chr(13));
    sleep(1);

  //  echo "Pierwszy ".$read;

    //$read = $serial->readPort(1);
    //$b = $serial->strToHex($read);
    //echo $b;




    //$serial->sendMessage(chr(13));
    $serial->sendMessage("at+cmgs=\"664861998\"");
    $serial->sendMessage("at+cmgs=\"".$msgCenter[0][0]."\"");


    $serial->sendMessage(chr(13));
    //$serial->sendMessage(chr(10));

    sleep(2);

    //$read = $serial->readPort(100);
    //echo "Drugi ".$read;

    //sleep(1);
  	$serial->sendMessage("BlaBla");
    $serial->sendMessage($msgCenter[0][1]);

  	$serial->sendMessage(chr(26));
  //$serial->sendMessage(\x1A);
    //sleep(1);

  //  $read = $serial->readPort(1);
  //  echo "       OdpowiedĹş:        ";
  //  echo "Trzeci ".$read;




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


*/
      ?>

      </body>
      </html>
