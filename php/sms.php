    <?php
//session_start();

$numer = $_POST['numer']; //pobranie loginu wysłanego z indexu
$wiadomosc = $_POST['wiadomosc']; //pobranie hasła
$msgCenter = array();

// echo $numer;
// echo $wiadomosc;

$numerArray = explode(",", $numer);
for($i = 0; $i < count($numerArray); $i++) {
  array_push($msgCenter, array($numerArray[$i], $wiadomosc));
}

 fifomsgs($msgCenter);

function fifomsgs($msg) {
  if (count($msg) != 0) {
    //sendMessage($msg[0][0], $msg[0][1]);
    echo "__1___";
    echo $msg[0][0];
    echo $msg[0][1];
    //sleep(5);
    array_shift($msg);

    // sendMessage($msg[0][0], $msg[0][1]);
        //  echo $msgCenter;
    echo "__2___";
    echo $msg[0][0];
    echo $msg[0][1];
    // sendMessage($msg[0][0], $msg[0][1]);
    fifomsgs($msgCenter);
    // print_r($msgCenter);
    // sendMessage($msg[0][0], $msg[0][1]);
    echo "<br />";
  }
  // print_r($msg);

}

// [wiadomosc nr 1, wiadomosc nr 2]

//664861998,500072122

function sendMessage($sendToNumer, $sendToMessage) {
   // tutaj cala logika od wysylania wiadomosci
   include "php_serial.class.php";
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
    $serial->sendMessage("at+cmgf=1");
   //$serial->sendMessage("AT+CSMP=\"17,100,0,240\"\n");
    $serial->sendMessage(chr(13));
   //sleep(1);
   //$serial->sendMessage(chr(13));
   //$serial->sendMessage("at+cmgs=\"664861998\"");
   $serial->sendMessage("at+cmgs=\"".$sendToNumer."\"");
   $serial->sendMessage(chr(13));
   //$serial->sendMessage(chr(10));
   //sleep(2);
   //$serial->sendMessage("BlaBla");
   $serial->sendMessage($sendToMessage);
   $serial->sendMessage(chr(26));

     //$read = $serial->readPort(1);
   //  echo "       OdpowiedĹş:        ";
     //echo "Trzeci ".$read;
   //$serial->sendMessage("ATE1\n");
   $serial->deviceClose();
   sleep(5);

}
?>
