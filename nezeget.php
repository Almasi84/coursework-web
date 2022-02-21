<?php
    include './csatolt.php';

    if (isset($_GET['id'])){
        $sqlmondat = "SELECT kep, keptipus from termek where termekid=".$_GET['id'];
        $eredmeny=mysqli_query($kapcsolat, $sqlmondat) or die ("Hibaüzenet: ".$sqlmondat);
        $sor= mysqli_fetch_array($eredmeny);
        header("Content-type: ".$sor['keptipus']);
        echo $sor['kep'];
        }
