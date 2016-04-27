    <?php
//session_start();

$numer = $_POST['numer']; //pobranie loginu wysłanego z indexu
$wiadomosc = $_POST['wiadomosc']; //pobranie hasła
$msgCenter = array();
$i2=1;

// echo $numer;
// echo $wiadomosc;

$numerArray = explode(",", $numer);
for($i = 0; $i < count($numerArray); $i++) {
  array_push($msgCenter, array($numerArray[$i], $wiadomosc));
// $i2=$i;
}

 fifomsgs($msgCenter,$i);

function fifomsgs($msg,$licznik) {
  // if (count($msg) != 0) {
for (;$licznik>=0;$licznik--){

    Send_Message($msg[0][0], $msg[0][1]);

    echo "__1___";
    echo $licznik;
    echo $msg[0][0];
    echo $msg[0][1];
    //sleep(5);
    array_shift($msg);
   sleep(5);
    // sendMessage($msg[0][0], $msg[0][1]);
        //  echo $msgCenter;
    echo "__2___";
    echo $msg[0][0];
    echo $msg[0][1];
    // sendMessage($msg[0][0], $msg[0][1]);
    //  fifomsgs($msgCenter);
    // print_r($msgCenter);
    // sendMessage($msg[0][0], $msg[0][1]);
    //echo "<br />";
  }
  // print_r($msg);

}

// [wiadomosc nr 1, wiadomosc nr 2]

//664861998,500072122

function Send_Message($sendToNumer, $sendToMessage) {
   // tutaj cala logika od wysylania wiadomosci


     include_once "php_serial.class.php";
     echo "baba lubi placki";
    $serial = new phpSerial();
    // echo "baba lubi placki1234";

    $serial->deviceSet("COM1");
    $serial->confBaudRate(115200);
    //$serial->confParity("none");
    //$serial->confCharacterLength(8);
    //$serial->confStopBits(1);
    //$serial->confFlowControl("none");
    //echo "tu jestem, po konfiguracji";
     // Then we need to open it
    $serial->confCharacterLength(8);

    // echo "baba lubi placki";

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
//   $serial->sendMessage("ATZ\n");
      //sleep(10);
   $serial->deviceClose();


}
?>
