<?php
require "./database/newsdb.php";
require_once "./utils/helpers.php";



if(isset($_POST["eka"],$_POST["toka"],$_POST["kolmas"],$_POST["id"])) {

    $titeli = sanit($_POST["eka"]);
    $tied = sanit($_POST["toka"]);
    $paiv = sanit($_POST["kolmas"]);
     $id = sanit($_POST["id"]);
    
    if(empty($titeli)||empty($tied)) {
      echo"jokin leipoo";
    } else {
      $pdo = connectDB();
      updateNews($pdo, $titeli, $tied, $paiv, $id);
      header('Location: /news/index.php');
    }
    
    
    }
    

?>