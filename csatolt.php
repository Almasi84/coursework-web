<?php
if (session_status() == PHP_SESSION_NONE){
        session_start();
        if (!isset($_SESSION['fnev'])) $_SESSION['fnev']="";
        if (!isset($_SESSION['nev'])) $_SESSION['nev']="";
        if (!isset($_SESSION['jogosultsag'])) $_SESSION['jogosultsag']=0;
    }
    $server = "localhost";
    $user = "root";
    $password = "";
    $adatbazis= "webshop";
    $kapcsolat = mysqli_connect($server, $user, $password, $adatbazis);
?>