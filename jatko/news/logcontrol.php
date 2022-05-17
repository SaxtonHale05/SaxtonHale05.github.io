<?php
require "./database/newsdb.php";
require_once "./utils/helpers.php";
require "./partials/header.php";

if (isset($_POST["Ktunnus"], $_POST["salasana"])) {
    $pdo = connectDB();
    $Ktunnus = sanit($_POST["Ktunnus"]);
    $salasana = sanit($_POST["salasana"]);
    $user = getuser($pdo, $Ktunnus);
    echo $Ktunnus . " " . $salasana;
    //cleandump($user);
    if ($user) {
   $passOK = password_verify($salasana, $user["password"]);
    if ($passOK) {
        $_SESSION["userid"]=$user["userid"];
        $_SESSION["user_fname"]=$user["firstname"];
        $_SESSION["user_lname"]=$user["lastname"];
        $_SESSION["sessioid"]=session_id();
        header("location: /news/index.php");
    } else { $_SESSION["user_error"]="Tarkista salasanasi taikka Käyttäjätunnus"; header("location: /news/login.php");} 
} else {$_SESSION["user_error"]="Tarkista salasanasi taikka Käyttäjätunnus"; header("location: /news/login.php");}
} 