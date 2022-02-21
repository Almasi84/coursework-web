<?php
    include "./csatolt.php";
    if ($_SESSION['jogosultsag'] == 1) {
        $sqlmondat = "SELECT * from termek where termekid=".$_POST['termekid'];
        $eredmeny = mysqli_query($kapcsolat, $sqlmondat);
        $rekord = mysqli_fetch_assoc($eredmeny);
        $kiir = "<table>";
        if ($_POST['termekid'] != 0){
            $kiir =  "<table><tr><td>ID:</td><td><input type=\"text\" id=\"termekid\" value=\"".$_POST['termekid']."\" readonly><td></tr>";
        }
        $kiir .= "<tr><td>Terméknév: </td><td><input type=\"text\" id=\"modnev\" value=\"".$rekord['termeknev']."\"><td></tr>";
        $kiir .= "<tr><td>Gyártó: </td><td><input type=\"text\" id=\"gyarto2\" value=\"".$rekord['gyarto']."\"><td></tr>";
        $kiir .= "<tr><td>Szélesség: </td><td><input type=\"number\" id=\"szelesseg\" value=\"".$rekord['szelesseg']."\"><td></tr>";        
        $kiir .= "<tr><td>Hosszúság: </td><td><input type=\"number\" id=\"hossz\" value=\"".$rekord['hossz']."\"><td></tr>";
        $kiir .= "<tr><td>Darabszám: </td><td><input type=\"number\" id=\"darab2\" value=\"".$rekord['darab']."\"><td></tr>";
        $kiir .= "<tr><td>Kategória: </td><td><select id=\"kategoria\"><option value=\"1\" selected>Puzzle</option><option value=\"2\">Kiegészítő</option> </select><td></tr>";
        $kiir .= "<tr><td>Ár: </td><td><input type=\"number\" id=\"termekar\" value=\"".$rekord['termekar']."\"><td></tr>";
        $kiir .= "<tr><td>Akció: </td><td><input type=\"number\" id=\"akcio\" value=\"".$rekord['akcio']."\"><td></tr>";
        $kiir .= "<tr><td>Elérhető: </td><td><select id=\"elo_termek\"><option value=\"1\" selected>Igen</option><option value=\"0\">Nem</option> </select><td></tr>";
        if ($_POST['termekid'] == 0){
            $kiir .= "<tr><td class=\"button\"><input type=\"button\" value=\"Rögzítés\" onclick=\"termekuj()\"></td><td><input type=\"button\" value=\"Mégse\" onclick=\"megse2()\"><td></tr>";
            $kiir .= "</table>";
        } else {
            $kiir .= "<tr><td class=\"button\" colspan=\"2\"><input type=\"button\" value=\"Módosítás\" onclick=\"termekmodosit()\"><td></tr>";
            $kiir .= "</table>";
        }
        
        echo $kiir;
    } else {
        echo "nincsen joga hozzá!";
    }
?>