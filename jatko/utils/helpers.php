<?php

function sanit($input) {
  $trimput = trim($input);
  $cleanput = htmlspecialchars($trimput);
  return $cleanput;
}

function cleandump($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function islogged() {
 if(isset($_SESSION["userid"], $_SESSION["sessioid"]) && $_SESSION["sessioid"] == session_id()) {
   return true;
 } else {
   return false;
 }

}

function logout() {
session_unset();
session_destroy();
setcookie(session_name(),'',0,'/'); 
session_regenerate_id(true);
header("location: /login");
die();
}