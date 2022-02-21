<?php
    include "./csatolt.php";
    if ($_SESSION['jogosultsag'] == 1) {
        $sqlmondat = "SELECT * FROM user WHERE userid=".$_POST['userid'];
        $eredmeny = mysqli_query($kapcsolat, $sqlmondat);
        $rekord = mysqli_fetch_assoc($eredmeny);
        $kiir = "<table>";
        if ($_POST['userid'] != 0){
            $kiir =  "<table><tr><td>ID:</td><td><input type=\"text\" id=\"userid\" value=\"".$_POST['userid']."\" readonly><td></tr>";
        }
        $kiir .= "<tr><td>Név: </td><td><input type=\"text\" id=\"modnev\" value=\"".$rekord['nev']."\"></td></tr>";
        $kiir .= "<tr><td>Felhasználói név: </td><td><input type=\"text\" id=\"username\" value=\"".$rekord['username']."\"></td></tr>";
        $kiir .= "<tr><td>Új jelszó: </td><td><input type=\"text\" id=\"password\" size=\"40\"></td></tr>";        
        $kiir .= "<tr><td>Irányítószám: </td><td><input type=\"number\" id=\"irszam\" placeholder=\"1234\" value=\"".$rekord['irszam']."\"></td></tr>";
        $kiir .= "<tr><td>Település: </td><td><input type=\"text\" id=\"telepules\" value=\"".$rekord['telepules']."\"></td></tr>";
        $kiir .= "<tr><td>Közterület: </td><td><input type=\"text\" id=\"kterulet\" value=\"".$rekord['kterulet']."\"></td></tr>";
        $kiir .= "<tr><td>Házszám: </td><td><input type=\"text\" id=\"hszam\" value=\"".$rekord['hszam']."\"></td></tr>";
        $kiir .= "<tr><td>Telefonszám: </td><td><input type=\"text\" id=\"telszam\" placeholder=\"20-123-4567\" value=\"".$rekord['telszam']."\"></td></tr>";
        $kiir .= "<tr><td>Adószám: </td><td><input type=\"text\" id=\"adoszam\" placeholder=\"123456-1-23\"value=\"".$rekord['adoszam']."\"></td></tr>";
        $kiir .= "<tr><td>Jogosultság: </td><td><select id=\"jog\"><option value=\"2\" selected>Vásárló</option><option value=\"1\">Adminisztrátor</option> </select></td></tr>";
        if ($_POST['userid'] == 0){
            $kiir .= "<tr><td class=\"button\"><input type=\"button\" value=\"Rögzítés\" onclick=\"felhuj()\"></td><td><input type=\"button\" value=\"Mégse\" onclick=\"megse()\"></td></tr>";
            $kiir .= "</table>";
        } else {
            $kiir .= "<tr><td class=\"button\" colspan=\"2\"><input type=\"button\" value=\"Módosítás\" onclick=\"felhmodosit()\"><td></tr>";
            $kiir .= "</table>";
        }
        
        echo $kiir;
    } else {
        echo "nincsen joga hozzá!";
    }
?>