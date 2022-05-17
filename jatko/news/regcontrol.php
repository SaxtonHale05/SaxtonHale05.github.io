<?php
require "./database/newsdb.php";
require_once "./utils/helpers.php";
require "./partials/newsheader.php";




if (isset($_POST["etunimi"], $_POST["sukunimi"], $_POST["Ktunnus"], $_POST["salasana"], $_POST["salasana2"])) {

$etunimi = sanit($_POST["etunimi"]);
$sukunimi = sanit($_POST["sukunimi"]);
$Ktunnus = sanit($_POST["Ktunnus"]);
$salasana = sanit($_POST["salasana"]);
$salasana2 = sanit($_POST["salasana2"]);
echo "ekatoimii";

if ($salasana != $salasana2) {
    $_SESSION["user_error"]="Salasanat ei täsmää :(";
    header("location: /news/register.php");
} else if (strlen($salasana) >= 8 && strlen($Ktunnus) >= 6){
   echo "tokatoimii";
   $Hsalasana = password_hash($salasana,PASSWORD_DEFAULT);
   echo "<br>" . $Hsalasana;

   $pdo = connectDB();
   insertuser($pdo, $etunimi, $sukunimi, $Ktunnus, $Hsalasana);


} else {
    $_SESSION["user_error"]="Nimi liian lyhyt, enin. 6mrk ja salasana enintään 8mrk. :(";
    header("location: /news/register.php");
}


}


?>