<?php

require "./database/newsdb.php";
require_once "./utils/helpers.php";

if (isset($_POST["id"])){
     $id=sanit($_POST["id"]);
     $pdo = connectDB();
    deleteNews($pdo, $id);
    header('location: /news/index.php');
}







?>