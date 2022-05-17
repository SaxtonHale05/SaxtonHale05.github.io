<?php

require "../database/gamedb.php";
require "../utils/helpers.php";

if(isset($_POST["luokka"], $_POST["rotu"], $_POST["nimi"],$_POST["kuva"])) {

$luokka = sanit($_POST["luokka"]);
$rotu = sanit($_POST["rotu"]);
$nimi = sanit($_POST["nimi"]);
$kuva = sanit($_POST["kuva"]);


if(empty($luokka) || empty($rotu) || empty($nimi)) {
  echo"<h2>" . "Kenttä tyhjä!" . "</h2>";
} else {
  $wat = connectDB();

  $dex = rand(1,10);
  $wis = rand(1,10);
  $str = rand(1,10);
  insertchar($wat, $nimi, $str, $dex, $wis, $luokka, $rotu, $kuva);
  header('Location: /game/index.php');
}


} else echo "bhbhj";

?>