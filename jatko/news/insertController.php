<?php

require "./database/newsdb.php";
require_once "./utils/helpers.php";

if(isset($_POST["titteli"],$_POST["kirjuri"],$_POST["tiedot"],$_POST["pvm"],$_POST["ppvm"],$_POST["tyypit"])) {

$titeli = sanit($_POST["titteli"]);
$kirj = sanit($_POST["kirjuri"]);
$tied = sanit($_POST["tiedot"]);
$paiv = sanit($_POST["pvm"]);
$ppaiv = sanit($_POST["ppvm"]);
$tyy = sanit($_POST["tyypit"]);

if(empty($titeli)||empty($tied)) {
  echo"jokin leipoo";
} else {
  $pdo = connectDB();
  insertNews($pdo, $titeli, $tied, $kirj, $paiv, $ppaiv, $tyy, $_SESSION["userid"]);
  header('Location: /news/index.php');
}


}

?>