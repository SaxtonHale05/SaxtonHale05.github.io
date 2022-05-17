<?php

function connectDB(){
        static $connection;
        if(!isset($connection)) {
            $connection = connect();
        }      
        return $connection;
}

function connect() {
        $host = getenv('DB_HOST', true) ?: "89.163.146.32";
        $port = getenv('DB_PORT', true) ?: 3306; 
        $dbname = getenv('DB_NAME', true) ?: "viljaa21_events"; 
        $user = getenv('DB_USERNAME', true) ?: "viljaa21_Ville"; 
        $password = getenv('DB_PASSWORD', true) ?: "rj&Ivpy[Ee#t"; 

        $connectionString = "mysql:host=$host;dbname=$dbname;port=$port;charset=utf8";

        try {       
                $pdo = new PDO($connectionString, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
        } catch (PDOException $e){
                echo "Virhe tietokantayhteydessä: " . $e->getMessage();
                die();
        }
}