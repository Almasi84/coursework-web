<?php
    include "./csatolt.php";
    if ($_SESSION['jogosultsag'] == 1) {
        $sqlmondat ="UPDATE termek SET termekid='".$_POST['termekid']."', termeknev='".$_POST['termeknev']."', gyarto='".$_POST['gyarto']."', szelesseg='".$_POST['szelesseg']."', hossz='".$_POST['hossz']."', darab='".$_POST['darab']."', kategoria='".$_POST['kategoria']."', termekar='".$_POST['termekar']."', akcio='".$_POST['akcio']."', elo_termek='".$_POST['elo_termek']."' WHERE termekid=".$_POST['termekid'];
        mysqli_query($kapcsolat, $sqlmondat);
        echo "";
    } else {
        echo "nincsen joga hozzá!";
    }
?>