<?php
include './csatolt.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        $sqlmondat = "SELECT termekid, termeknev, keptipus from termek order by termekid desc";
        $eredmeny = mysqli_query($kapcsolat, $sqlmondat);
        if (mysqli_num_rows($eredmeny) > 0) {
            while ($sor = mysqli_fetch_array($eredmeny)) {
                echo "id: " . $sor['termekid'] . "<br>";
                echo "nev: " . $sor['termeknev'] . "<br>";
                echo "tipus: " . $sor['keptipus'] . "<br>";
                echo "<img src=\"./nezeget.php?id=" . $sor['termekid'] . "\"/><br>";
            }
        }
        mysqli_close($kapcsolat);
        ?>
    </body>
</html>