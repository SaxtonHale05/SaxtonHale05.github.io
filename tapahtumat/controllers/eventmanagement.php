<?php
require_once "database/models/event.php";
require_once 'libraries/cleaners.php';

function vieweventcontroller(){
    $allevents = getallevents();
    $alltypes = geteventtype();
    require "views/events.view.php";  
}


function eventaddcontroller(){
    if(isset($_POST['eventname'], $_POST['desc'], $_POST['eventtype'], $_POST['postaddress'], $_POST['address'], $_POST['date'], $_POST['postplace'], $_POST['amt'])){
        $eventname = cleanUpInput($_POST['eventname']);
        $desc = cleanUpInput($_POST['desc']);
        $eventtype = cleanUpInput($_POST['eventtype']);
        $postaddress = cleanUpInput($_POST['postaddress']); 
        $postplace = cleanUpInput($_POST['postplace']);
        $address = cleanUpInput($_POST['address']);  
        $date = cleanUpInput($_POST['date']);
        $amt = cleanUpInput($_POST['amt']);
        $yhteysid = $_SESSION["userid"];
        addevent($eventname, $desc, $eventtype, $postaddress, $postplace, $address, $date, $yhteysid, $amt); 
        header("Location: /");    
    } else {
        require "views/newevent.view.php";
    }
}



function deleteeventcontroller() {
if (isset($_POST["id"])){
    $id=cleanUpInput($_POST["id"]);
    $pdo = connectDB();
   deleteevent($id);
   header('location: /');
} }



function editeventcontroller(){
    try {
        if(isset($_GET["id"])){
            $tapahtumaid = cleanUpInput($_GET["id"]);
            $events = geteventbyid($tapahtumaid);
            $oll = getsquad($tapahtumaid);  
        } else {
            echo "Virhe: tapahtumaID puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe tapahtumaa haettaessa: " . $e->getMessage();
    }
    
    if($events){
        $name = $events['nimi'];
        $text = $events['kuvaus'];
        $type = $events['typeid'];
        $address = $events['lähiosoite'];
        $postaddress = $events['postiosoite'];
        $postplace = $events['postitoimipaikka'];
        $date = $events['päiväys'];
        $tapahtumaid = $events['tapahtumaID'];
        require "views/editevent.view.php";
    } else {
        header("Location: /");
        exit;
    }
}

function updateeventcontroller(){
    if(isset($_POST['eventname'], $_POST['desc'], $_POST['eventtype'], $_POST['eventaddress'], $_POST["postaddress"], $_POST["postplace"], $_POST["date"], $_POST["tapahtumaID"])){
        $name = cleanUpInput($_POST['eventname']);
        $text = cleanUpInput($_POST['desc']);
        $type = cleanUpInput($_POST['eventtype']);
        $address = cleanUpInput($_POST['eventaddress']);
        $postaddress = cleanUpInput($_POST['postaddress']);
        $postplace = cleanUpInput($_POST['postplace']);
        $date = cleanUpInput($_POST['date']);
        $tapahtumaid = cleanUpInput($_POST["tapahtumaID"]);

        try{
            updateevent($name, $text, $type, $address, $postaddress, $postplace, $date, $tapahtumaid);
            header("Location: /");    
        } catch (PDOException $e){
                echo "Virhe tapahtumaa päivitettäessä: " . $e->getMessage();
        }
    } else {
        header("Location: /");
        exit;
    }
}

function eventtypeController() {
    geteventtype();
}

function eventsearchController(){ 
    if(isset($_POST['tyyppi'])) {
    $type = cleanUpInput($_POST['tyyppi']);
    $allevents = findevent($type);
    $alltypes = geteventtype();
    require "views/searchevent.view.php";
    //header("Location: /");
    }
    else {
        header("Location: /");
        exit;
    }
}

function typeaddController(){
    if(isset($_POST['eventt'])) {
        $eve = cleanUpInput($_POST['eventt']);
        addtype($eve);
        header("Location: /");
    }else {
        header("Location: /");
        exit;
    }

}


function eventjoinController2(){
    if(isset($_POST['eventID'])) {
      $id = cleanUpInput($_POST["eventID"]);
      $event = getevent($id); 
      require "views/joinevent.view.php";
    }else {
        echo "huti2"; 
        exit;
    }
}
function eventjoinController(){
    if(isset($_GET['eventID'])) {
      $id = cleanUpInput($_GET["eventID"]);
      $event = getevent($id); 
      require "views/joinevent.view.php";
    }else {
       echo "huti1";
        exit;
    }
}

function eventsheetController(){
    if(isset($_POST['name'],$_POST['phone'],$_POST['email'],$_POST['addon'],$_POST['ID'],$_POST['date'])) {
        $name = cleanUpInput($_POST["name"]);
        $phone = cleanUpInput($_POST["phone"]);
        $email = cleanUpInput($_POST["email"]);
        $addon = cleanUpInput($_POST["addon"]);
        $ID = cleanUpInput($_POST["ID"]);
        $date = cleanUpInput($_POST["date"]);
        addcrew($ID, $name, $phone, $email, $addon, $date); 
        header("Location: /");  
    }
}


function crewdeleteController() {
    if (isset($_POST["ilmoittautuminenID"])){
        $id=cleanUpInput($_POST["ilmoittautuminenID"]);
        $pdo = connectDB();
       deleteperson($id);
       header('location: /');
    } }


?>