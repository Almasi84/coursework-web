<?php
    include './csatolt.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Puzzle</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./style2.css">
        <script src="js.js"></script>
</head>
<body>
<div class="sor">
    <div class="oszlop">
        <div class="kartya">
        <?php
            $valasz = "<h1>A kosár tartalma üres!</h1><input type='button' value='Vissza' onclick='vissza()'>";
            if(isset($_COOKIE['rendeles'])){
                //van feladott rendelés
                $termek = unserialize($_COOKIE['rendeles']);
                if ($_SESSION['fnev'] != ""){
                    $sqlmondat ="SELECT * FROM user WHERE username=\"".$_SESSION['fnev']."\"";
                    $eredmeny = mysqli_query($kapcsolat, $sqlmondat);
                    $rekord = mysqli_fetch_assoc($eredmeny);
                    $valasz = "<h2>Kedves ".$rekord['nev'].", kérem ellenőrízze adatait!</h2>";
                    $valasz .= "<div class=\"urlap\"><form method='post' action='./rendeles_leadasa.php'>";
                    $valasz .= "<table>";
                    $valasz .= "<tr><th colspan='3'>Számlázási adatok: </th></tr>";
                    $valasz .= "<tr><td>Név: </td><td colspan='6'><input type='text' name='nev' value=\"".$rekord['nev']."\" required></td></tr>";
                    $valasz .= "<tr><td>Irányítószám: </td><td colspan=''><input type='number' name='irszam' id='1' value=\"".$rekord['irszam']."\" required></td></tr>";
                    $valasz .= "<tr><td>Város: </td><td colspan='4'><input type='text' name='telepules' id='2' value=\"".$rekord['telepules']."\" required></td></tr>";
                    $valasz .= "<tr><td>Utca: </td><td colspan='4'><input type='text' name='kterulet' id='3' value=\"".$rekord['kterulet']."\" required></td></tr>";
                    $valasz .= "<tr><td>Házszám: </td><td colspan='4'><input type='text' name='hszam' id='4' value=\"".$rekord['hszam']."\" required></td></tr>";
                    $valasz .= "<tr><td>Telefonszám: </td><td colspan='4'><input type='tel' name='telszam' value=\"".$rekord['telszam']."\" required></td></tr>";
                    $valasz .= "<tr><td>E-mail cím: </td><td colspan='4'><input type='email' name='email' value=\"".$rekord['username']."\"></td></tr>";
                    $valasz .= "<tr><td>Adószám: </td><td colspan='4'><input type='text' name='adoszam' value=\"".$rekord['adoszam']."\"></td></tr>";
                }else{
                    $valasz = "<h2>Kedves Vásárló, kérem adja meg adatait!</h2>";
                    $valasz .= "<div class=\"urlap\"><form method='post' action='./rendeles_leadasa.php'>";
                    $valasz .= "<table>";
                    $valasz .= "<tr><td>Név: </td><td colspan='4'><input type='text' name='nev' required></td></tr>";
                    $valasz .= "<tr><td>Irányítószám: </td><td colspan='4'><input type='number' name='irszam' id='1' required></td></tr>";
                    $valasz .= "<tr><td>Város: </td><td colspan='4'><input type='text' name='telepules' id='2' required></td></tr>";
                    $valasz .= "<tr><td>Utca: </td><td colspan='4'><input type='text' name='kterulet' id='3' required></td></tr>";
                    $valasz .= "<tr><td>Házszám: </td><td colspan='4'><input type='text' name='hszam' id='4' required></td></tr>";
                    $valasz .= "<tr><td>Telefonszám: </td><td colspan='4'><input type='tel' name='telszam' required></td></tr>";
                    $valasz .= "<tr><td>E-mail cím: </td><td colspan='4'><input type='email' name='email' required></td></tr>";
                    $valasz .= "<tr><td>Adószám: </td><td colspan='4'><input type='text' name='adoszam'></td></tr>";
                }
                $valasz .= "<tr><th colspan='5'>A rendelt termékek: </th></tr>";

                for($i=0; $i<count($termek); $i++){
                    $sqlmondat = "SELECT termeknev,ROUND((termekar-(termekar*akcio/100))) as fizetendo from termek where termekid=".$termek[$i][0];
                    $sor = mysqli_fetch_array(mysqli_query($kapcsolat, $sqlmondat));
                    $valasz .= "<tr><td>".$sor['termeknev']."</td><td><input type='number' name='puzzle' id='".$termek[$i][0]."' value='".$termek[$i][1]."'></td><td> darab</td><td><input type='text' name='aktuálisar' value=".$sor['fizetendo']." readonly><td>  Ft/darab </td></td></tr>";
                }
                $valasz .= "<tr><td>Szállítási cím: </td><td colspan='4'><input type='text' name='szcim' id='cim2'></td></tr>";
                $valasz .= "<tr><td><input type='checkbox' id='egyezocim' onclick='cim_kitolt()'></td><td colspan='4'>A szállítási cím megegyezik a számlázási címmel</td></tr>";
                $valasz .= "<tr><td>Szállítási mód: </td><td colspan='4'>";
                $valasz .= "<select name='szallitas'>";
                $valasz .= "<option value=''>Válasszon</option>";
                $sqlmondat2 ="SELECT * FROM szallitas";
                $eredmeny = mysqli_query($kapcsolat, $sqlmondat2);
                while($sor = mysqli_fetch_array($eredmeny)){
                    $valasz .= "<option value='$sor[0]'>$sor[1]</option>";
                }
                $valasz .= "</select></td></tr>";
                $valasz .= "<tr><td>Fizetési mód: </td><td colspan='2'>";
                $valasz .= "<select name='fizetes'>";
                $valasz .= "<option value=''>Válasszon</option>";
                $sqlmondat3 ="SELECT * FROM fizetes";
                $eredmeny = mysqli_query($kapcsolat, $sqlmondat3);
                while($sor = mysqli_fetch_array($eredmeny)){
                    $valasz .= "<option value='$sor[0]'>$sor[1]</option>";
                }
                $valasz .= "</select></td></tr>";          
                $valasz .= "</table><input type='submit' value='Rendelés feladása'><input type='button' value='Vissza' onclick='vissza()'></form></div>";
            }
            echo $valasz;
        ?>
        </div>
    </div>
</div>
</body>
</html>