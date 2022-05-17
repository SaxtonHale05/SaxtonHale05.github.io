<?php
require_once "database/connection.php";



function getallevents(){
    $pdo =connectDB();
    $sql = "SELECT * FROM tapahtuma WHERE päiväys > CURRENT_TIMESTAMP ORDER BY päiväys ASC";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addevent($eventname, $desc, $eventtype, $postaddress, $postplace, $address, $date, $yhteysid, $amt){
    $pdo =connectDB();
    $data = [$yhteysid, $eventname, $desc, $eventtype, $address, $postaddress, $postplace, $date, $amt];
    $sql = "INSERT INTO tapahtuma (yhteyshenkilöID, nimi, kuvaus, typeid, lähiosoite, postiosoite, postitoimipaikka, päiväys, amount) VALUES(?,?,?,?,?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function get_type(){
    $pdo = connectDB();
    $sql = "select * from tyypit";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $article = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $article;
}

function deleteevent($id){
    $pdo = connectDB();
    $sql = "DELETE FROM tapahtuma WHERE tapahtumaID=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$id]);
}

function geteventbyid($tapahtumaid){
    $pdo = connectDB();
    $sql = "SELECT * FROM tapahtuma WHERE tapahtumaID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$tapahtumaid]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}


function updateevent($name, $text, $type, $address, $postaddress, $postplace, $date, $tapahtumaid){
    $pdo = connectDB();
    $data = [$name, $text, $type, $address, $postaddress, $postplace, $date, $tapahtumaid];
    $sql = "UPDATE tapahtuma SET nimi = ?, kuvaus = ?, typeid = ?, lähiosoite = ?, postiosoite = ?, postitoimipaikka = ?, päiväys = ? WHERE tapahtumaID = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}

function geteventtype(){
    $pdo = connectDB();
    $sql = "select * from tyypit";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $article = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $article;
}

function findevent($type){
    $pdo = connectDB();
    $sql = "SELECT * FROM tapahtuma WHERE typeid=?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$type]);
    $rr = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $rr;
}

function addtype($eve) {
    $pdo =connectDB();
    $data = [$eve];
    $sql = "INSERT INTO tyypit (nimi) VALUES(?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
    
}

function getevent($id) {
    $pdo = connectDB();
    $sql = "SELECT tapahtuma.nimi as tapanimi, tapahtuma.tapahtumaID, tapahtuma.kuvaus, tapahtuma.lähiosoite, tapahtuma.postiosoite, tapahtuma.postitoimipaikka, tapahtuma.päiväys, käyttäjä.nimi, käyttäjä.yritys, käyttäjä.sähköposti FROM tapahtuma INNER JOIN käyttäjä ON käyttäjä.userid = tapahtuma.yhteyshenkilöID WHERE tapahtumaID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$id]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;

}

function addcrew($ID, $name, $phone, $email, $addon, $date) {
    $pdo =connectDB();
    $data = [$ID, $name, $phone, $email, $addon, $date];
    $sql = "INSERT INTO ilmoittautuminen (tapahtumaID, nimi, puhelinnumero, sähköposti, lisätiedot, päiväys) VALUES(?,?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
    
}

function getinvited($idd){
    $pdo = connectDB();
    $sql = "SELECT COUNT(ilmoittautuminenID) as Max FROM ilmoittautuminen WHERE tapahtumaID=?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$idd]);
    $e = $stm->fetch(PDO::FETCH_ASSOC);
    echo $e["Max"]; return $e;

}

function deleteperson($id){
    $pdo = connectDB();
    $sql = "DELETE FROM ilmoittautuminen WHERE ilmoittautuminenID=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$id]);
}


?>