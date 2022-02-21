<?php
    include "./csatolt.php";
    if ($_SESSION['jogosultsag'] == 1) {
        $sqlmondat = "INSERT INTO termek (termeknev, gyarto, szelesseg, hossz, darab, kategoria, termekar, akcio, elo_termek) VALUES (\"".$_POST['termeknev']."\",\"".$_POST['gyarto']."\",\"".$_POST['szelesseg']."\",\"".$_POST['hossz']."\",\"".$_POST['darab']."\",\"".$_POST['kategoria']."\",\"".$_POST['termekar']."\",\"".$_POST['akcio']."\",\"".$_POST['elo_termek']."\")";
        mysqli_query($kapcsolat, $sqlmondat);
        echo ($sqlmondat);
    } else {
        echo "nincsen joga hozzá!";
    }
?>