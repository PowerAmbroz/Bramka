    <?php
//session_start();

$numer = $_POST['numer']; //pobranie loginu wysłanego z indexu
$wiadomosc = $_POST['wiadomosc']; //pobranie hasła
$msgCenter = array();
$numerArray = explode(",", $numer);

for($i = 0; $i < count($numerArray); $i++) {
  array_push($msgCenter, array($numerArray[$i], $wiadomosc));

}

 fifomsgs($msgCenter,$i);

function fifomsgs($msg,$licznik) {

for (;$licznik!=0;$licznik--){
    Send_Message($msg[0][0], $msg[0][1]);
    array_shift($msg);
   sleep(5);

  }
}

function Send_Message($sendToNumer, $sendToMessage) {

  include_once "php_serial.class.php";
  $serial = new phpSerial();
  $serial->deviceSet("COM1");
  $serial->confBaudRate(115200);
  $serial->confCharacterLength(8);
  $serial->deviceOpen('w+');
  $serial->sendMessage("at+cmgf=1");
  $serial->sendMessage(chr(13));
  $serial->sendMessage("at+cmgs=\"".$sendToNumer."\"");
  $serial->sendMessage(chr(13));
  $serial->sendMessage($sendToMessage);
  $serial->sendMessage(chr(26));
  $serial->deviceClose();
}
	header("Location: ../php/bramka.php");
?>
