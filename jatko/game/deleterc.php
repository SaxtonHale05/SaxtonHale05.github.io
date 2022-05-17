<?php
require "../database/gamedb.php";
require "../utils/helpers.php";

if (isset($_POST["id"])){
     $id=sanit($_POST["id"]);
     $wat = connectDB();
    deleteClass($wat, $id);
    header('location: /game/index.php');
}
?>