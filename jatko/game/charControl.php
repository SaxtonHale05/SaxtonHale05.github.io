<?php

require "../database/gamedb.php";
require "../utils/helpers.php";



if(isset($_POST["luokka"],$_POST["rotu"],$_POST["nimi"],$_POST["id"],$_POST["kuva"])) {

    $luokk = sanit($_POST["luokka"]);
    $rott = sanit($_POST["rotu"]);
    $nimm = sanit($_POST["nimi"]);
    $charid = sanit($_POST["id"]);
    $kuva = sanit($_POST["kuva"]);
    
    


    if(empty($luokk)||empty($rott)||empty($nimm)||empty($charid)) {
      echo"jokin leipoo";
    } else  { 
      $wat = connectDB();
      updatechar($wat, $luokk, $rott, $nimm, $charid, $kuva);
      header('Location: /game/index.php');
    }
     
    
    
    }
    else echo "bjbj";
    






















?>