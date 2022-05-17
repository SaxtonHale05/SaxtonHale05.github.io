<?php

require "../database/gamedb.php";
require "../utils/helpers.php";

if(isset($_POST["luokka"])) {

$luokka = sanit($_POST["luokka"]);


if(empty($luokka)) {
  echo"<h2>" . "Kenttä tyhjä!" . "</h2>";
} else {
  $wat = connectDB();
  InsertClass($wat, $luokka);
  header('Location: /game/index.php');
}


}

?>