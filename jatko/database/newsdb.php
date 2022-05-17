<?php

function connectDB() {
    try{
    $pdo = new PDO('mysql:host=89.163.146.32;dbname=viljaa21_news', 'Ville', '9nu1i1hs4*0h');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "kunnossa on"; 
     return $pdo;
    
    }

    catch(PDOException $e) {   
        echo "db homma meni mönkään" . $e->getMessage();}

}
function getAllNews($pdo){
    $sql = "select * from news";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $allnews = $statement->fetchAll();
    return $allnews;
}
function insertNews($pdo, $title, $contentid, $writerid, $expirydateid, $paiva, $tyy, $userid) {
    $sql = "insert into news (title, contentid, writerid, expirydateid, dateid, typeid, userid) value (?, ?, ?, ?, ?, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->execute([$title, $contentid, $writerid, $expirydateid, $paiva, $tyy, $userid]); 
    if($statement != false){
        $_SESSION["user_message"]="Uus uutinen tulil jouu";
    } else {
        $_SESSION["user_message"]="Pieleen meni dawg";
    }
}

function deleteNews($pdo,$id) {
    $sql = "DELETE FROM news WHERE newsid = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$id]);
    if($statement != false){
        $_SESSION["user_message"]="Uutinen positettu!";
    } else {
        $_SESSION["user_message"]="Pieleen meni dawg";
    }
} 


function getArticle($pdo, $id){
    $sql = "select * from news where newsid=?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$id]);
    $article = $statement->fetch();
    return $article;
}
function updateNews($pdo, $titeli, $tied, $paiv, $id){
  $sql = "UPDATE news SET title=?, contentid=?, expirydateid=? WHERE newsid=?";
  $statement = $pdo->prepare($sql);
  $statement->execute([$titeli, $tied, $paiv, $id]);


}
function getTypes($pdo){
    $sql = "select * from type";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $alltypes = $statement->fetchAll();
    return $alltypes;
}
function OrderNews($pdo) {
  $sql = "SELECT * FROM news WHERE expirydateid < CURRENT_TIMESTAMP ORDER BY dateid";
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $kaikki = $statement->fetchAll();
  return $kaikki;
}
//USER SECTION

function insertuser($pdo, $etunimi, $sukunimi, $Ktunnus ,$Hsalasana) {
    $sql = "insert into users (firstname, lastname, username, password) value (?, ?, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->execute([$etunimi, $sukunimi, $Ktunnus ,$Hsalasana]); 
    if($statement != false){
        $_SESSION["user_message"]="Käyttäjä lisätty";
    } else {
        $_SESSION["user_error"]="Pieleen meni dawg";
    }
}
function getuser($pdo, $Ktunnus){
    $sql = "select * from users where username=?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$Ktunnus]);
    $alltypes = $statement->fetch();
    return $alltypes;
}

?>