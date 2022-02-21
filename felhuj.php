<?php
    include "./csatolt.php";
    if ($_SESSION['jogosultsag'] == 1) {
        $sqlmondat = "INSERT INTO user (userid, nev, username, password, irszam, telepules, kterulet, hszam, telszam, adoszam, jog) VALUES (0,\"".$_POST['nev']."\", \"".$_POST['username']."\", \"".sha1($_POST['password'])."\", \"".$_POST['irszam']."\",  \"".$_POST['telepules']."\",\"".$_POST['kterulet']."\", \"".$_POST['hszam']."\", \"".$_POST['telszam']."\", \"".$_POST['adoszam']."\", \"".$_POST['jog']."\")";
        mysqli_query($kapcsolat, $sqlmondat);
        echo "";
    } else {
        echo "nincsen joga hozzá!";
    }
?>