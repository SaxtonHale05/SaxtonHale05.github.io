<?php
require_once "database/connection.php";

function addUser($name, $busi, $email, $password){
    $pdo = connectDB();
    $hashedpassword = hashPassword($password);
    $data = [$name, $busi, $hashedpassword, $email];
    $sql = "INSERT INTO käyttäjä (nimi, yritys, salasana, sähköposti) VALUES(?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function login($name, $password){
    $pdo = connectDB();
    $sql = "SELECT * FROM käyttäjä WHERE nimi=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$name]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);
    $hashedpassword = $user["salasana"];

    if($hashedpassword && password_verify($password, $hashedpassword))
        return $user;
    else 
        return false;
}


function editUser($name, $busi, $email, $password, $id){
    $pdo = connectDB();
    $hashedpassword = hashPassword($password);
    $data = [$name, $busi, $hashedpassword, $email, $id];
    $sql = "UPDATE käyttäjä SET nimi=?, yritys=?, salasana=?, sähköposti=? WHERE userid=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}


function getsquad($tapahtumaID){
    $pdo = connectDB();
    $sql = "SELECT * FROM ilmoittautuminen WHERE tapahtumaID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$tapahtumaID]);
    $oll = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $oll;
}

?>