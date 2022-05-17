<?php
//BASIC START CONNECTION
function connectDB() {
    try{
    $wat = new PDO('mysql:host=samarium;dbname=21viljaa', '21viljaa', 'ville1');
    $wat->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "Yhteys kunnossa on"; 
     return $wat;
    
    }

    catch(PDOException $e) {   
        echo "db homma meni mönkään" . $e->getMessage();}
}


//CLASS SECTION
function InsertClass($wat, $luokka) {
    $sql = "insert into class (name) value (?)";
    $statement = $wat->prepare($sql);
    $statement->execute([$luokka]); 
    if($statement != false){
        echo"<h2>" . "insert ookke" . "</h2>";
    } else {
        echo "<h2>" . "Jokin meni jorpakkoon" . "</h2>";
    }
}
function getClass($wat){
    $sql = "select * from class";
    $statement = $wat->prepare($sql);
    $statement->execute();
    $nimet = $statement->fetchAll();
    return $nimet;
}
function deleteClass($wat,$id) {
    $sql = "DELETE FROM class WHERE classid = ?";
    $statement = $wat->prepare($sql);
    $statement->execute([$id]);
} 


//RACE SECTION
function InsertRace($wat, $rotu) {
    $sql = "insert into race (name) value (?)";
    $statement = $wat->prepare($sql);
    $statement->execute([$rotu]); 
    if($statement != false){
        echo"<h2>" . "insert ookke" . "</h2>";
    } else {
        echo "<h2>" . "Jokin meni jorpakkoon" . "</h2>";
    }
}
function deleteRace($wat,$id) {
    $sql = "DELETE FROM race WHERE raceid = ?";
    $statement = $wat->prepare($sql);
    $statement->execute([$id]);
} 
function getRace($wat){
    $sql = "select * from race";
    $statement = $wat->prepare($sql);
    $statement->execute();
    $rtott = $statement->fetchAll();
    return $rtott;
}

//CHARACTER SECTION
function insertchar($wat, $nimi, $str, $dex, $wis, $luokka, $rotu, $kuva) {
    $sql = "insert into mychar (name, strenght, dexterity, wisdom, classid, raceid, chimage) value (?, ?, ?, ?, ?, ?, ?)";
    $statement = $wat->prepare($sql);
    $statement->execute([$nimi, $str, $dex, $wis, $luokka, $rotu, $kuva]); 
    if($statement != false){
        echo"<h2>" . "insert ookke" . "</h2>";
    } else {
        echo "<h2>" . "Jokin meni jorpakkoon" . "</h2>";
    }
}
function getchar($wat){
    $sql = "SELECT mychar.characterid, mychar.name as ch_name, class.name as cl_name , race.name as rc_name, mychar.dexterity, mychar.strenght, mychar.wisdom, mychar.chimage
    FROM ((mychar
    INNER JOIN class ON mychar.classid = class.classid)
    INNER JOIN race ON race.raceid = mychar.raceid);";
    $statement = $wat->prepare($sql);
    $statement->execute();
    $tot = $statement->fetchAll();
    return $tot;
}


function updatechar($wat, $luokk, $rott, $nimm, $charid, $kuva){
  $sql = "UPDATE mychar SET name=?, classid=?, raceid=?, chimage=? WHERE characterid=?";
  $statement = $wat->prepare($sql);
  $statement->execute([$nimm, $luokk, $rott, $kuva, $charid]);
}

function getonecha($wat, $charid){
    $sql = "SELECT mychar.characterid, mychar.name as ch_name, class.name as cl_name , race.name as rc_name, mychar.dexterity, mychar.strenght, mychar.wisdom 
    FROM ((mychar
    INNER JOIN class ON mychar.classid = class.classid)
    INNER JOIN race ON race.raceid = mychar.raceid) WHERE mychar.characterid= ?;";
    $statement = $wat->prepare($sql);
    $statement->execute([$charid]);
    $tot = $statement->fetch();
    return $tot;
}
?>