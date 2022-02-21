<?php
    include "./csatolt.php";
    $sqlmondat = "SELECT * FROM user WHERE nev like \"%".$_POST['nev']."%\" and username like \"%".$_POST['fnev']."%\"";
    $eredmeny=mysqli_query($kapcsolat, $sqlmondat);
    $kiir = "<div class=\"urlap\"><form id=\"form\" method=\"GET\" action=\"./felhasznalok.php\"><table><tr><th></th><th>ID</th><th>Név</th><th>Felhasználónév</th><tr>";
    while ($sor = mysqli_fetch_array($eredmeny)){
        $kiir = $kiir."<tr><td><input type=\"checkbox\" name=\"eredmeny[]\" value=\"".$sor['userid']."\"></td><td>".$sor['userid']."</td><td>".$sor['nev']."</td><td class=\"felhmod\" onclick=\"modosit(".$sor['userid'].")\">".$sor['username']."</td></tr><br>";
    }
    $kiir=$kiir."<tr><td colspan=\"4\" class=\"button\"><input type=\"submit\" value=\"Kijelöltek törlése\" name=\"torol\"></td></tr></table></form></div>";
    echo $kiir;
?>