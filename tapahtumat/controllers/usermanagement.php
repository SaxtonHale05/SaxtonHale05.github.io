<?php
require_once "database/models/users.php";
require_once 'libraries/cleaners.php';

function registerController(){
    if(isset($_POST['name'], $_POST['business'], $_POST['email'], $_POST['password'])){
        $name = cleanUpInput($_POST['name']);
        $busi = cleanUpInput($_POST['business']);
        $email = cleanUpInput($_POST['email']);
        $password = cleanUpInput($_POST['password']);

        try {
            addUser($name, $busi, $email, $password);
            header("Location: /login"); 
        } catch (PDOException $e){
            echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
        }
    } else {
        require "views/register.view.php";
    }
}

function loginController(){
    if(isset($_POST['name'], $_POST['password'])){
        $name = cleanUpInput($_POST['name']);
        $password = cleanUpInput($_POST['password']);
  
        $result = login($name, $password);
        if($result){
            $_SESSION['name'] = $result['nimi'];
            $_SESSION['userid'] = $result['userid'];
            $_SESSION['session_id'] = session_id();
            header("Location: /"); 
        } else {
            require "views/login.view.php";
        }
    } else {
        require "views/login.view.php";
    }
}


function logoutController(){
    session_unset(); 
    session_destroy();
    setcookie(session_name(),'',0,'/'); 
    session_regenerate_id(true);
    header("Location: /login"); 
    die();
}  

function editorController(){
    if(isset($_POST['name'], $_POST['business'], $_POST['email'], $_POST['password'], $_POST['id'])){
        $name = cleanUpInput($_POST['name']);
        $busi = cleanUpInput($_POST['business']);
        $email = cleanUpInput($_POST['email']);
        $password = cleanUpInput($_POST['password']);
        $id = cleanUpInput($_POST['id']);

        try {
            editUser($name, $busi, $email, $password, $id);
            header("Location: /login"); 
        } catch (PDOException $e){
            echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
        }
    } else {
        require "views/edituser.view.php";
    }
}























?>