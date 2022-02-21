<?php
    include "./csatolt.php";
    if ($_SESSION['jogosultsag'] == 1) {
        $sqlmondat = "";
        if ($_POST['password'] == ""){
            $sqlmondat = "UPDATE user SET nev='".$_POST['nev']."', username='".$_POST['username']."', jog='".$_POST['jog']."', irszam='".$_POST['irszam']."', telepules='".$_POST['telepules']."', kterulet='".$_POST['kterulet']."', hszam='".$_POST['hszam']."', telszam='".$_POST['telszam']."', adoszam='".$_POST['adoszam']."' WHERE userid=".$_POST['userid'];
        } else {
            $sqlmondat = "UPDATE user SET nev='".$_POST['nev']."', username='".$_POST['username']."', password='".sha1($_POST['password'])."', jog='".$_POST['jog']."', irszam='".$_POST['irszam']."', telepules='".$_POST['telepules']."', kterulet='".$_POST['kterulet']."', hszam='".$_POST['hszam']."', telszam='".$_POST['telszam']."', adoszam='".$_POST['adoszam']."' WHERE userid=".$_POST['userid'];
        }
        mysqli_query($kapcsolat, $sqlmondat);
        echo "";
    } else {
        echo "nincsen joga hozzá!";
    }
?>