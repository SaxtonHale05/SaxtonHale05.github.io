<?php

require "../database/gamedb.php";
require "../utils/helpers.php";

if(isset($_POST["rotu"])) {

$rotu = sanit($_POST["rotu"]);


if(empty($rotu)) {
  echo"<h2>" . "Kenttä tyhjä!" . "</h2>";
} else {
  $wat = connectDB();
  InsertRace($wat, $rotu);
  header('Location: /game/index.php');
}


}

?>