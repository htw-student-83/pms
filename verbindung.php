<?php
    $hostname ="localhost";
    $username ="root";
    $password = "";
    $database ="adb";


    $con = new mysqli($hostname, $username, $password, $database);
    if(!$con){
        echo "Derzeit kann keine Verbindung zur Datenbank hergestellt werden.";
    }
?>